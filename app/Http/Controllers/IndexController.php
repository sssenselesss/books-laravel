<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;


class IndexController extends Controller
{
    public function main()
    {
        $books = Book::query()->get();
        return view('main', compact('books'));
    }
    public function reg()
    {
        return view('reg');
    }
    public function auth()
    {
        return view('auth');
    }
    public function createBooks()
    {
        $categories = Category::all();
        return view('add', compact('categories'));
    }
    public function update(Book $book)
    {
        $categories = Category::all();
        return view('update', [
            'categories' => $categories,
            'book' => $book
        ]);
    }
}
