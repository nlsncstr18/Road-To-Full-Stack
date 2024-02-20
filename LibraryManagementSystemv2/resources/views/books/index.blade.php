<x-layout>
    @include('partials._search')
    @auth
        <h1 class="text-white text-right mr-16 font-bold italic w-auto">
            {{-- display the number of books borrowed of user --}}
            Borrowed Books: {{ auth()->user()->borrows()->count() }}

        </h1>
    @endauth

    <div class="grid grid-cols-2 gap-4 mx-10 my-10">
        @unless (count($books) == 0)
            @foreach ($books as $book)
                <div
                    class="relative  text-white flex flex-col items-center  rounded-lg hover:backdrop-blur-lg  hover:shadow-md md:flex-row md:max-w-xl shadow-2xl shadow-black backdrop-blur-sm hover:shadow-white ">
                    <img src="{{ asset('/img/canva.jpg') }}" alt="Sample Book Cover"
                        class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg">




                    <a href="/book/{{ $book->id }}" class="flex flex-col justify-between p-4">
                        <h1 class="mb-2 text-md font-bold tracking-tight text-center">
                            {{ $book->title }}</h1>
                        <h1 class="mb-2 text-sm font-bold tracking-tight text-center">
                            {{ $book->author }}</h1>
                        <p class="mb-3 font-normal text-justify "> {{ $book->description }}</p>
                        <p class="mb-3 font-normal text-right italic "> {{ $book->genre }} </p>

                    </a>

                    @auth
                        {{-- check if the book_id is already exist on borrows --}}
                        @if (auth()->user()->borrows->contains('book_id', $book->id))
                            <form method="POST" action="/book/{{ $book->id }}/return" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button class="text-white absolute top-0 left-0 bg-red-500 p-1 rounded">Return</button>
                            </form>
                        @else
                            <form method="POST" action="/book/{{ $book->id }}" enctype="multipart/form-data">
                                @csrf
                                <button class="text-white absolute top-0 left-0 bg-green-500 p-1 rounded">Borrow</button>
                            </form>
                        @endif
                        {{-- count the number of borrows from model relationship --}}
                        <div class="text-white absolute bottom-0 right-0 p-4 text-lg italic rounded flex flex-col items-center">
                            <span>{{ $book->borrows->count() }}</span>
                            <i class="fa-solid fa-hand-holding mt-[-0.8rem]"></i>
                        </div>
                    @else
                        <form method="POST" action="/book/{{ $book->id }}" enctype="multipart/form-data">
                            @csrf
                            <button class="text-white absolute top-0 left-0 bg-green-500 p-1 rounded">Borrow</button>
                        </form>
                        {{-- count the number of borrows from model relationship --}}
                        <div class="text-white absolute bottom-0 right-0 p-4 text-lg italic rounded flex flex-col items-center">
                            <span>{{ $book->borrows->count() }}</span>
                            <i class="fa-solid fa-hand-holding mt-[-0.8rem]"></i>
                        </div>

                    @endauth







                </div>
            @endforeach
        @endunless

    </div>
    <div class="mt-6 p-4">{{ $books->links() }}</div>



</x-layout>
