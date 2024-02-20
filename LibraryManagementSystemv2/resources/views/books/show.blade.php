<x-layout>
    <div class="flex justify-center items-center flex-col mx-8 my-12 md:mx-48 md:my-24 p-8 shadow-lg">
        <div class="backdrop-blur-lg rounded-lg p-6 w-full md:w-3/4">

            <h2 class="text-white text-2xl mb-4">Title: {{ $book->title }}</h2>
            <h2 class="text-white text-2xl mb-4">Author: {{ $book->author }}</h2>
            <h2 class="text-white text-2xl mb-4">Genre: {{ $book->genre }}</h2>

            <p class="text-white text-lg mb-4">Description: {{ $book->description }}</p>

            <p class="text-white text-lg mb-4">Number of Borrows: {{ $numberOfBorrows }}</p>

            <a href="/" class="text-blue-400 text-lg hover:underline font-bold"><i class="fa-solid fa-backward"></i>
                Go
                Back</a>

        </div>
    </div>

</x-layout>
