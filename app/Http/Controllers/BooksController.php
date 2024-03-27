<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use Yajra\DataTables\Facades\DataTables;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $isLoggedIn = auth()->check();

        if ($request->ajax()) {
            $data = books::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) use ($isLoggedIn) {
                    $btn = '';

                    if ($isLoggedIn) {
                        $role_id = auth()->user()->roles_id;

                        if ($role_id == 1) { // global-admin
                            $btn .= '<a href="' . route('books.add', $row->id) . '" class="show btn btn-info btn-sm">Add</a>';
                            $btn .= '<a href="' . route('books.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                            $btn .= '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm" data-id="'.$row->id.'">Delete</a>';
                        } elseif ($role_id == 2) { // admin
                            $btn .= '<a href="' . route('books.add', $row->id) . '" class="show btn btn-info btn-sm">Add</a>';
                            $btn .= '<a href="' . route('books.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                        }

                        // All roles can view
                        $btn .= '<a href="' . route('books.show', $row->id) . '" class="show btn btn-info btn-sm">Show</a>';
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.books.index', compact('isLoggedIn'));
    }

    public function add()
    {
        return view('pages.books.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|integer',
            'description' => 'required',
        ]);

        Books::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Book added successfully');
    }

    public function edit(Books $book)
    {
        return view('pages.books.edit', compact('book'));
    }

    public function update(Request $request, Books $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
        ]);

        $book->update($validatedData);

        return redirect()->route('dashboard')->with('success', 'Book updated successfully');
    }

    public function show(Books $book)
    {
        return view('pages.books.show', compact('book'));
    }

    public function destroy(Books $book)
    {
        $book->delete();
        return redirect()->route('dashboard')->with('success', 'Book deleted successfully');
    }
}
