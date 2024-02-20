<x-layout>

    <div class="relative overflow-x-auto shadow-md shadow-black sm:rounded-lg mt-24 ml-10 mr-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-md backdrop-blur-lg text-white uppercase text-center">
                <tr>
                    <th scope="col" class="p-4 ">
                        {{-- <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-white  border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div> --}}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        title
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
                        Action
                    </th>

                </tr>
            </thead>
            <tbody class=" ">



                @foreach (auth()->user()->borrows as $borrow)
                    <tr class="backdrop-blur-md hover:bg-gray-700 border-b  border-black text-center text-white ">
                        <td class="w-4 p-4">

                        </td>
                        <td class="px-6 py-3">{{ $borrow->book->title }}</td>
                        <td class="px-6 py-3">{{ $borrow->book->author }}</td>
                        <td class="px-6 py-3">{{ $borrow->book->genre }}</td>
                        <td class="px-6 py-3">{{ $borrow->book->description }}</td>

                        <td class="flex items-center px-6 py-4">

                            <form method="POST" action="/book/{{ $borrow->book->id }}/return"
                                enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-500 p-2 font-medium text-red-900 rounded  hover:underline ms-3">Return</button>
                            </form>


                        </td>


                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>


</x-layout>
