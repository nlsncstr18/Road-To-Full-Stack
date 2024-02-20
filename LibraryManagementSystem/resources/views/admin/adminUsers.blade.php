@extends('admin.adminLayouts')
@section('content')
    <x-app-layout>
        <div class="p-10 grid grid-cols-1 overflow-auto sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">

            @if ($users->isEmpty())
                <p class="text-center text-gray-500">No books available</p>
            @else
                @foreach ($users as $user)
                    <div
                        class=" hover:bg-gray-300  w-100 h-100 rounded overflow-hidden shadow-2xl p-10 bg-gray-100 relative">
                        <h1 class="text-xl">Name: {{ $user->name }}</h1>
                        <h1>Email: {{ $user->email }}</h1>
                        <h1>Usertype: {{ $user->usertype }}</h1>
                        <h1>Borrowed Books: {{ $user->numberofbooks }}</h1>
                        <!-- Edit and Delete links -->
                        <div class="absolute top-0 right-0 mt-4 mr-4">
                            <form action="{{ route('admin.destroyUsers', $user->id) }}" method="POST">
                                @csrf
                                {{-- @method('PATCH') <!-- Specify the DELETE method --> --}}
                                <button type="submit"
                                    class="text-xl {{ $user->status ? 'text-red-500' : 'text-blue-500' }} mr-2">{{ $user->status ? 'Disable' : 'Enable' }}</button>
                            </form>
                        </div>

                    </div>
                @endforeach
            @endif

        </div>


    </x-app-layout>
@endsection
