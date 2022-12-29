<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Books::truncate();

        $books = [
            [
                "id" => 1,
                "name" => "Python zero to hero",
                "author_name" => "Tamim shahriar shubin",
                "price" => 300,
                "image" => "uploads/images/python.jpg",
                "status" => 1
            ],
            [
                "id" => 2,
                "name" => "C zero to hero",
                "author_name" => "Zhonkar mahbub",
                "price" => 400,
                "image" => "uploads/images/c.jpg",
                "status" => 1
            ],
            [
                "id" => 3,
                "name" => "Cybersecurity and pen testing",
                "author_name" => "Alexandar price",
                "image" => "uploads/images/cs.jpg",
                "price" => 500,
                "status" => 1
            ],
            [
                "id" => 4,
                "name" => "Cybersecurity and pen testing",
                "author_name" => "Alexandar price",
                "image" => "uploads/images/cs.jpg",
                "price" => 520,
                "status" => 1
            ],
            [
                "id" => 5,
                "name" => "Outsourcing",
                "author_name" => "Nabila ahmed",
                "image" => "uploads/images/python.jpg",
                "price" => 530,
                "status" => 1
            ],
            [
                "id" => 6,
                "name" => "Data structure and algorithom",
                "author_name" => "Bill gates",
                "image" => "uploads/images/c.jpg",
                "price" => 550,
                "status" => 1
            ],
            [
                "id" => 7,
                "name" => "Laravel zero to hero",
                "author_name" => "Tyler otwell",
                "image" => "uploads/images/laravel.jpg",
                "price" => 600,
                "status" => 1
            ],
            [
                "id" => 8,
                "name" => "Javascript, a complete nightmare",
                "author_name" => "Muhammad Sajidul islam",
                "image" => "uploads/images/js.jpg",
                "price" => 400,
                "status" => 1
            ],
            [
                "id" => 9,
                "name" => "Vue js mastery",
                "author_name" => "Vue school",
                "image" => "uploads/images/vue.jpg",
                "price" => 500,
                "status" => 1
            ],
            [
                "id" => 10,
                "name" => "Vuex for everyone",
                "author_name" => "Vue school",
                "image" => "uploads/images/vue.jpg",
                "price" => 450,
                "status" => 1
            ],
            [
                "id" => 11,
                "name" => "OOP with php",
                "author_name" => "laracast",
                "image" => "uploads/images/laravel.jpg",
                "price" => 420,
                "status" => 1
            ],

        ];

        foreach($books as $book){
            Books::create($book);
        }
    }
}
