<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>


<body>
    <x-app-layout>

        <x-slot name="header">
            <div class="font-semibold text-xl text-gray-800 leading-tight text-right">
                <h2 class="">
                    <h1>Number of Borrowed Books: {{ $user->numberofbooks }}</h1>

                </h2>
            </div>


            <div class=" w-full p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
                <!--Card 1-->
                @foreach ($books as $book)
                    <div class="w-100 h-100 rounded overflow-hidden shadow-2xl p-10 bg-gray-100">
                        {{-- <img class="w-80 h-80 mx-auto" src="img/book.jpg" alt="Mountain"> --}}
                        <div class="px-6 py-4">
                            {{-- <a href="{{ route('listings.show', $book->id) }}"> --}}
                            <h1> </h1>
                            <div class="font-bold text-lg mb-2">Title: {{ $book->title }}</div>
                            <div class=" text-sm mb-2">Author: {{ $book->author }}</div>
                            <p class="text-gray-700 text-base truncate">
                                Description: {{ $book->description }}
                            </p>

                            {{-- </a> --}}
                        </div>
                        <div class="px-6 pt-4 pb-2 text-sm">
                            @foreach (explode(',', $book->genre) as $genre)
                                <span
                                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $genre }}</span>
                            @endforeach
                        </div>
                        {{-- @foreach ($borrows as $borrow)
                            <form class="flex justify-center border border-none"
                                action="{{ route('borrow.destroy', $borrow->id) }}" method="POST">
                                @csrf
                                @method('DELETE')


                                <button type="submit" class="">Return this book</button>
                            </form>
                        @endforeach --}}


                        <form class="flex justify-center border border-none" action="{{ route('book.store') }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="">Borrow this book</button>
                        </form>





                    </div>
                @endforeach
            </div>
            </h2>
        </x-slot>


    </x-app-layout>


</body>

</html>
