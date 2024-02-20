{{-- check if the usertype is admin it will display the nav --}}
@auth


    @if (auth()->user()->userType == 1)
        {
        <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">


            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                {{-- display user who is currently login --}}


                <span class="font-bold capitalize text-white text-2xl">
                    <i class="fa-regular fa-user text-white"></i> {{ auth()->user()->name }}

                </span>



                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit" class=" hover:bg-red-800 text-red-500 font-bold rounded p-1"><i
                                class="fa-solid fa-right-from-bracket text-red-500 "> </i>
                            Logout</button>

                    </form>



                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul
                        class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="/"
                                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                aria-current="page">Home</a>
                        </li>

                        <li>
                            <a href="/book"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Add
                                Book</a>
                        </li>

                        <li>
                            <a href="/users"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Users
                                List</a>
                        </li>








                    </ul>
                </div>
            </div>


        </nav>}
    @endif
@endauth
