<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function borrow($id)
    {

        // Retrieve the authenticated user's ID
        $userId = auth()->id();

        // Check if the user has already borrowed the book
        // $existingBorrow = Borrow::where('user_id', $userId)
        //     ->where('book_id', $id)
        //     ->exists();

        // If the user has already borrowed the book, abort the operation
        // if ($existingBorrow) {
        //     return redirect()->back()->with('message', 'You have already borrowed this book.');
        // }

        // If the user hasn't borrowed the book yet, proceed with borrowing
        $formFields = [
            'user_id' => $userId,
            'book_id' => $id,
        ];

        // Create a new Borrow instance and save it to the database
        Borrow::create($formFields);

        return redirect()->back()->with('message', 'Borrow successful');
    }

    // delete the borrowed book record on user
    public function unborrow($id)
    {
        //find the id where the book_id is the same
        // Get the authenticated user
        $user = Auth::user();

        // Find the borrow record by book ID and user ID
        $borrow = Borrow::where('book_id', $id)
            ->where('user_id', $user->id)
            ->first();
        $borrow->delete();

        return redirect()->back()->with('message', 'Return successful');
    }
}
