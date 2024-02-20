@extends('admin.adminLayouts')
@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="flex justify-center items-center max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="text-gray-900  flex flex-col  justify-between gap-5 bg-transparent w-1/3">
                    <a class="hover:shadow-green-600 hover:bg-green-300 bg-green-400 text-2xl w-full rounded-md text-center p-2 shadow-md shadow-green-400"
                        href={{ route('admin.adminIndex') }}>
                        <h1>Books Listing</h1>
                    </a>

                    <a class="hover:shadow-green-600 hover:bg-green-300 bg-green-400 text-2xl w-full rounded-md text-center p-2 shadow-md shadow-green-400"
                        href="{{ route('admin.adminCreate') }}">
                        <h1>Add A Book</h1>
                    </a>

                    <a class="hover:shadow-green-600  hover:bg-green-300 bg-green-400 text-2xl w-full rounded-md text-center p-2 shadow-md shadow-green-400 "
                        href="{{ route('admin.adminUsers') }}">
                        <h1>Users</h1>
                    </a>
                </div>

            </div>
        </div>
    </x-app-layout>
@endsection
