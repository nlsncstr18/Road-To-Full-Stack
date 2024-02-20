<x-layout>

    @include('partials._search')

    <h1 class="text-white text-left ml-10 font-bold text-2xl">List of Books</h1>
    <div class="relative overflow-x-auto shadow-md shadow-black sm:rounded-lg m-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-md backdrop-blur-lg text-white uppercase text-center">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-white  border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Author
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Genre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Availability
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No. of Borrowers
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>

                </tr>
            </thead>
            <tbody class=" ">

                @foreach ($books as $book)
                    <tr class="backdrop-blur-md hover:bg-gray-700 border-b  border-black text-center text-white ">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-2" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="px-6 py-3">{{ $book->title }}</td>
                        <td class="px-6 py-3">{{ $book->author }}</td>
                        <td class="px-6 py-3">{{ $book->genre }}</td>
                        <td class="px-6 py-3 text-justify">{{ $book->description }}</td>
                        <td class="px-6 py-3">{{ $book->availability }}</td>
                        <td class="px-6 py-3">{{ $book->borrows()->count() }}</td>
                        <td class="flex items-center px-6 py-4">
                            {{-- 
                            the form action should be match the web route --}}
                            <a href="/book/{{ $book->id }}/edit"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form method="POST" action="/book/{{ $book->id }}">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>





</x-layout>
