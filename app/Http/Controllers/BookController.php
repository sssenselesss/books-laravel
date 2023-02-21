<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|min:3|max:200',
            'content' => 'required|min:3|max:200',
            'author' => 'required|min:3|max:200',
            'category_id' => 'required',
            'file' => 'mimes:png,jpeg,jpg',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }
        $image_path = null;

        if ($request->file('file')) {
            $image_path = $request->file('file')->store('public/assets');
        }
        Book::query()->create([
                'image' => $image_path,

            ] + $validator->validated());

        return redirect()->route('main');

    }

    public function show($id)
    {

        $book = Book::query()->find($id);

        if ($book === null) {
            return redirect()->route('main');
        }
        return view('single', ['book' => $book]);
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->route('main');
    }

    public function update(Request $request, Book $book)
    {

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|min:3',
            'content' => 'required|min:10',
            'author' => 'required|min:3',
            'category_id' => 'required',
            'file' => 'mimes:png,jpeg,jpg',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $validated = $validator->validated();
        if ($request->file('file')) {
            $request->validate(['file' => 'mimes:png,jpeg,jpg']);
            $path = $request->file('file')->store('public/assets');

            $validated['image'] = $path;
        }

        $book->update($validated);

        return redirect()->route('single',$book  );

    }


}
