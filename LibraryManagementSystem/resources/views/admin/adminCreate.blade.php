@extends('admin.adminLayouts')
@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                {{ __('Admin Dashboard') }}
            </h2>
        </x-slot>
        <div class="flex justify-center items-center px-10 py-10 ">
            <form class="flex flex-col gap-2" action="{{ route('admin.adminStore') }}" method='POST'>
                @csrf
                <label for="title">Title </label>
                <input type="text" id="title" name='title' required>

                <label for="Author">Author </label>
                <input type="text" id="author" name='author' required>


                <label for="genre">Genre</label>
                <select name="genre" id="genre">
                    <option value="horror">Fiction</option>

                    <option value="biography">Non-fiction</option>
                    <option value="history">Self-help</option>
                    <option value="history">History</option>
                </select>




                <label for="description">Description </label>
                <input type="text" id="description" name='description' required>



                <br>
                <button type="submit" class="shadow-2xl p-2 bg-gray-400">Submit</button>

            </form>
        </div>

    </x-app-layout>
@endsection
