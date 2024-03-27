@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Book Details') }}</div>

                    <div class="card-body">
                        <p><strong>Title:</strong> {{ $book->title }}</p>
                        <p><strong>Author:</strong> {{ $book->author }}</p>
                        <p><strong>Year:</strong> {{ $book->year }}</p>
                        <p><strong>Description:</strong> {{ $book->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
