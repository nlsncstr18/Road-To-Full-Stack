<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $userstatus = Auth()->user()->status;
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user' && $userstatus == 1) {

                $books = Book::latest()->get();
                $user = Auth::user();
                $borrows = Borrow::latest()->get();
                $borrowCount = Borrow::count();
                return view('dashboard', [
                    'books' => $books,
                    'borrowCount' => $borrowCount,
                    'user' => $user,
                    'borrows' => $borrows
                ]);
            } else if ($usertype == 'admin') {
                $books = Book::latest()->get();
                $borrows = Borrow::latest()->get();
                return view('admin.adminHome', ['borrows' => $borrows], ['books' => $books]);
            } else {
                return view('admin.404');
            }
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $user = Auth::user();

        $alreadyBorrowed = Borrow::where('book_id', $request->input('book_id'))
            ->where('user_id', $user->id)
            ->exists();

        if ($alreadyBorrowed) {
            return redirect()->back()->with('error', 'You have already borrowed this book.');
        }


        $borrow = new Borrow();
        $borrow->book_id = $request->input('book_id');
        $borrow->user_id = $user->id;
        $borrow->borrowed_at = now();
        $borrow->save();
        $user = User::findOrFail($user->id);

        $user->numberofbooks += 1;
        $user->save();

        return redirect()->back()->with('success', 'Book borrowed successfully!');
    }


    // public function destroy($id)
    // {
    //     $borrow = Borrow::findOrFail($id);
    //     $borrow->delete();
    //     $user = Auth::user();
    //     $user = User::findOrFail($user->id);

    //     $user->numberofbooks -= 1;
    //     $user->save();

    //     return redirect()->back()->with('success');
    // }
}
