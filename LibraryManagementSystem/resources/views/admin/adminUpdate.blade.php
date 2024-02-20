@extends('admin.adminLayouts')
@section('content')
    <x-app-layout>
        <div class="flex justify-center p-2 gap-8 w-full h-full  ">
            <form class="flex flex-col " action="{{ route('admin.adminUpdateBook', $book->id) }}" method='POST'>
                @csrf
                @method('PATCH')
                <div class="flex flex-col justify-evenly border  w-96 h-96 bg-gray-300 rounded  shadow-2xl p-5 relative">
                    <label>Title: <input id="title"
                            class=" outline-none focus:ring-0 border-b border-t-0 border-r-0 border-l-0  bg-gray-300 "
                            type="text" name="title" value="{{ $book->title }}"></label>



                    <label>Author: <input id="author"
                            class=" outline-none  focus:ring-0  border-b border-t-0 border-r-0 border-l-0  bg-gray-300  "
                            type="text" name="author" value="{{ $book->author }}"></label>



                    <label>Genre: <input id="genre"
                            class=" outline-none  focus:ring-0  border-b border-t-0 border-r-0 border-l-0  bg-gray-300  "
                            type="text" name="genre" value="{{ $book->genre }}"></label>


                    <label for="description">Description:</label>
                    <textarea id="description" name="description"
                        class="h-44 outline-none focus:ring-0 border-b border-t-0 border-r-0 border-l-0 overflow-hidden hover:overflow-auto bg-gray-300">{{ $book->description }}</textarea>




                </div>
                <button type="submit"
                    class=" hover:bg-slate-200 shadow-gray-500 shadow-sm p-2 bg-gray-400 mt-3 ">Save</button>
                <a href="{{ route('admin.adminIndex') }}"
                    class=" text-center hover:bg-slate-200 shadow-gray-500 shadow-sm p-2 bg-gray-400 mt-2 "><-Back </a>


            </form>


        </div>


    </x-app-layout>
@endsection
