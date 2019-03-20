<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('home', compact('authors'));
    }

    public function edit($id)
    {

        $author = Author::find($id);
        $freebooks = Book::where("author_id", null)->get();


        return view('edit', compact('author', "freebooks"));

    }

    public function update(Request $request, $id)
    {

        if ($request->book_ids != null) {
            foreach ($request->book_ids as $book_id) {
                $book = Book::find($book_id); //супер
                $book->author_id = $id;
                $book->save();
            }
        }


        $author = Author::find($id);
        if (empty($author)) {
            return back()
                ->withErrors(['msg' => "Автор c id=[{$id}] не найден"])
                ->withInput();
        }
        $data = $request->all();
        $result = $author
            ->fill($data)
            ->save();

        if ($result) {
            return redirect()
                ->route('books.index')
                ->with(['success' => 'Успешно изменен']);

        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }

    }

    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();

        return redirect(route('books.index'))->with('success', 'Успешно удален');
    }
}
