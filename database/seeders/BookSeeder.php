<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'category_id' => 1,
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'price' => 75000,
                'stock' => 1000
            ],
            [
                'category_id' => 2,
                'title' => 'Laravel for Beginners',
                'author' => 'Taylor Otwell',
                'price' => 95000,
                'stock' => 1000
            ],
            [
                'category_id' => 3,
                'title' => 'Rich Dad Poor Dad',
                'author' => 'Robert Kiyosaki',
                'price' => 85000,
                'stock' => 1000
            ],
        ];
        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
