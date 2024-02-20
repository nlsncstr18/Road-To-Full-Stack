<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();
        $borrows = Borrow::latest()->get();
        return view('admin.adminIndex', ['borrows' => $borrows], ['books' => $books]);
    }
    public function create()
    {
        return view('admin.adminCreate');
    }
    public function store()
    {
        $book = new Book();
        $book->title = request('title');
        $book->author = request('author');
        $book->genre = request('genre');
        $book->description = request('description');


        $book->save();


        return redirect('/admin/create');
    }
    public function destroy($id)
    {
        $book = Book::findOrFail($id);


        Borrow::where('book_id', $book->id)->delete();
        $book->delete();

        return redirect('/admin');
    }
    public function showUsers()
    {

        $users = User::latest()->get();




        return view('admin.adminUsers', ['users' => $users]);
    }
    public function destroyUsers($id)
    {
        $user = User::findOrFail($id);

        if ($user->usertype === 'user') {

            $user->status = !$user->status;
            $user->save();
        }

        return back();
        // $user = User::findOrFail($id);
        // if ($user->usertype === 'user') {
        //     Borrow::where('user_id', $user->id)->delete();
        //     $user->delete();

        //     return redirect()->route('admin.adminUsers')->with('success', 'User deleted successfully.');
        // } else {
        //     return redirect()->route('admin.adminUsers')->with('error', 'Admin users cannot be deleted.');
        // }

    }




    public function showBorrows()
    {





        $borrowCount = Borrow::count();


        $borrows = Borrow::with('user', 'book')->get();

        return view('admin.borrows', compact('borrows', 'borrowCount'));
    }
    public function update($id)
    {

        $book = Book::findOrFail($id);

        // $book->delete();
        // $book->title = $request->input('title');

        // $book->save();


        return view('admin.adminUpdate', ['book' => $book]);
    }
    public function patch($id)
    {


        // Find the book by ID
        $book = Book::findOrFail($id);

        // Update the book attributes
        $book->title = request('title');
        $book->author = request('author');
        $book->genre = request('genre');
        $book->description = request('description');


        $book->save();

        // Redirect the user or return a response as needed
        return redirect('/admin');
    }
}
