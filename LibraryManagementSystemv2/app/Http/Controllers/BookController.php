<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //show all books
    public function index()
    {
        //check if the user is login
        if (Auth::id()) {
            //check if the current logged in user has usertype of user/0
            $usertype = Auth()->user()->userType;
            if ($usertype == 0) {

                //filter and count the borrows of each book from model
                $books = Book::latest()->filter(request(['search']))->simplePaginate(8);


                return view('books.index', ['books' => $books]);
            } else {
                //search filter from models
                $books = Book::latest()->filter(request(['search']))->simplePaginate(8);
                return view('admin.indexBooks', ['books' => $books]);
            }
        } else {

            //if the user is not login 
            $books = Book::latest()->filter(request(['search']))->simplePaginate(8);
            return view('books.index', ['books' => $books]);
        }
    }




    public function show($id)
    {
        //find the single book 
        $book = Book::findOrFail($id);
        //count the borrows of a book
        $numberOfBorrows = $book->borrows()->count();
        return view('books.show', ['book' => $book], ['numberOfBorrows' => $numberOfBorrows]);
    }

    public function destroy($id)
    {
        $book = book::findOrFail($id);
        $book->delete();
        return redirect()->back()->with('message', 'Delete successful');
    }

    //show add book form
    public function viewCreate()
    {

        return view('admin.addBook');
    }


    public function create(Request $request)
    {
        $bookform = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' => 'required',

        ]);

        Book::create($bookform);



        return redirect('/')->with('message', 'Book successfully created');
    }
    //show edit form of the specific id
    public function viewEdit($id)

    {

        $book = Book::findOrFail($id);
        return view('admin.editBook', ['book' => $book]);
    }

    //edit the book with the id put method on routes
    public function edit(Request $request, $id)
    {
        // Validate the form data
        $bookData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' => 'required',
        ]);

        // Fetch the book instance based on the provided $id
        $book = Book::findOrFail($id);

        // Update the book instance with the validated data
        $book->update($bookData);

        // Redirect back with a success message


        return redirect('/')->with('message', 'Book successfully updated');
    }
}
