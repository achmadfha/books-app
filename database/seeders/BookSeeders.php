<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('books')->insert([
                'title' => $this->generateTitle(),
                'author' => $this->generateAuthor(),
                'year' => $this->generateYear(),
                'description' => $this->generateDescription(),
            ]);
        }
    }

    private function generateTitle()
    {
        $titles = ['The Great Gatsby', 'To Kill a Mockingbird', '1984', 'Pride and Prejudice', 'The Catcher in the Rye', 'The Hobbit', 'The Lord of the Rings', 'Harry Potter and the Philosopher\'s Stone', 'Animal Farm', 'The Hunger Games', 'The Da Vinci Code', 'The Alchemist', 'The Chronicles of Narnia', 'The Kite Runner', 'The Fault in Our Stars', 'Gone with the Wind', 'The Shining', 'Brave New World', 'Wuthering Heights', 'Moby-Dick'];

        return $titles[array_rand($titles)];
    }

    /**
     * Generate a random author name.
     *
     * @return string
     */
    private function generateAuthor()
    {
        $authors = ['F. Scott Fitzgerald', 'Harper Lee', 'George Orwell', 'Jane Austen', 'J.D. Salinger', 'J.R.R. Tolkien', 'J.K. Rowling', 'George Orwell', 'Suzanne Collins', 'Dan Brown', 'Paulo Coelho', 'C.S. Lewis', 'Khaled Hosseini', 'John Green', 'Margaret Mitchell', 'Stephen King', 'Aldous Huxley', 'Emily Brontë', 'Herman Melville'];

        return $authors[array_rand($authors)];
    }

    /**
     * Generate a random publication year between 1900 and 2023.
     *
     * @return int
     */
    private function generateYear()
    {
        return rand(1900, 2023);
    }

    /**
     * Generate a random book description.
     *
     * @return string
     */
    private function generateDescription()
    {
        return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum nulla id felis luctus, in tincidunt sem fringilla. Nullam auctor erat vitae tortor suscipit sagittis.';
    }
}
