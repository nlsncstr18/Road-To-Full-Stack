@extends('admin.adminLayouts')
@section('content')
    <x-app-layout>
        <div class="p-10 grid grid-cols-1 overflow-auto sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">

            @if ($books->isEmpty())
                <p class="text-center text-gray-500">No books available</p>
            @else
                @foreach ($books as $book)
                    <div
                        class="hover:bg-gray-300 w-96 h-96 rounded hover:overflow-y-scroll overflow-hidden shadow-2xl p-5 bg-gray-100 relative">
                        <h1 class="p-2">Title: {{ $book->title }}</h1>
                        <h1 class="p-2">Author: {{ $book->author }}</h1>
                        <h1 class="p-2">Description: {{ $book->description }}</h1>
                        <h1 class="p-2">Genre: {{ $book->genre }}</h1>

                        <div class="absolute top-0 right-0 mr-0 p-1">
                            <form action="{{ route('admin.destroy', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE') <!-- Specify the DELETE method -->
                                <button type="submit" class="text-red-500 mr-2  font-bold">Delete</button>
                            </form>

                        </div>

                        <div class="absolute top-0 left-0 ml-0 p-1">

                            <a href="{{ route('admin.adminUpdate', $book->id) }}" type="submit"
                                class="text-green-500 mr-2 font-bold ">Edit</a>


                        </div>
                    </div>
                @endforeach
            @endif

        </div>


    </x-app-layout>
@endsection
