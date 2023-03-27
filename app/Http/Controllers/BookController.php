<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Dislike;
use App\Models\Favourite;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    public function books()
    {
        $data = [
            'is_archived' => 0
        ];

        return view('pages.books.index', ['books' => Book::where($data)->latest()->filter(request(['search']))->paginate(8)]);
    }

    public function index()
    {
        return view('admin.dashboard.book.index', ['books' => Book::all()]);
    }

    public function show($id)
    {
        $book = Book::all()->find($id);
        return view('pages.books.book_details', ['book' => $book]);
    }

    public function create()
    {
        return view('admin.dashboard.book.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'category_id' => 'required'
        ]);

        if($request->hasFile('image'))
        {
            $data['image'] = $request->file('image')->store('images' , 'public');
        }

        Book::create($data);

        return redirect(route('dashboard.books'))->with('message' , 'Book created successfully!');
    }

    public function edit($id)
    {
        return view('admin.dashboard.book.edit', ['book' => Book::all()->find($id), 'categories' => Category::all()]);
    }

    public function update(Request $request , $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'category_id' => 'required'
        ]);

        if($request->hasFile('image'))
        {
            $data['image'] = $request->file('image')->store('images' , 'public');
        }

        $book = Book::all()->find($id);
        $book->update($data);

        return redirect(route('dashboard.books'))->with('message' , 'Book updated successfully!');
    }

    public function archive(Request $request , $id)
    {
        $data = $request->validate([
            'is_archived' => 'required'
        ]);

        $book = Book::all()->find($id);
        $book->update($data);
        return redirect(route('dashboard.books'))->with('message' , 'Book archived successfully!');
    }


    public function like(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'book_id' => $request->book_id
        ];

        $like = Like::where($data);
        $dislike = Dislike::where($data);

        if ($like->exists()) {
            $like->delete();
        } else {
            if ($dislike->exists()) {
                $dislike->delete();
            }
            Like::create($data);
        }
        return redirect()->back();
    }

    public function dislike(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'book_id' => $request->book_id
        ];

        $dislike = Dislike::where($data);
        $like = Like::where($data);

        if ($dislike->exists()) {
            $dislike->delete();
        } else {
            if ($like->exists()) {
                $like->delete();
            }
            Dislike::create($data);
        }
        return redirect()->back();
    }


    public function addToFavourites(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'book_id' => $request->book_id
        ];

        $favourite = Favourite::where($data);

        if ($favourite->exists()) {
            $favourite->delete();
        } else {
            Favourite::create($data);
        }
        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'book_id' => $request->book_id
        ];

        $favourite = Favourite::where($data);

        if ($favourite->exists()) {
            $favourite->delete();
            return Redirect::back()->with('message','Removed from favourites');
        }
        return redirect()->back();
    }

}
