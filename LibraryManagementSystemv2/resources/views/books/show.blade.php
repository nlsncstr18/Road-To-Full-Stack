<x-layout>
    <div class="flex justify-center items-center flex-col">
        <h1 class="text-white text-2xl">Title: {{ $book->title }}</h1>
        <h1 class="text-white text-2xl">Author: {{ $book->author }}</h1>
        <h1 class="text-white text-2xl">Genre: {{ $book->genre }}</h1>

        <h1 class="text-white text-2xl text-justify">Description: {{ $book->description }}</h1>

        <h1 class="text-white text-2xl text-justify">Number of borrows: {{ $numberOfBorrows }}</h1>
    </div>

    <a href="/" class="text-white text-3xl">Go back</a>




</x-layout>
