<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div
        class="flex flex-col justify-center items-center h-screen gap-5 "style="background-image: url('{{ asset('/img/library.jpg') }}'); background-size: cover;">
        <div
            class="flex flex-col p-1 rounded-2xl  bg-black/30 shadow-2xl gap-5 shadow-black backdrop-blur-sm items-center border-none  h-1/3 w-1/2">
            <div class="font-medium p-5 text-5xl text-[#fb923c]  border-b-2 border-[#fb923c]">
                <h1>Library Management System</h1>
            </div>


            @if (Route::has('login'))


                <div class="h-auto w-auto flex justify-center items-center flex-row gap-5 ">
                    @auth
                        <a href="{{ url('/home') }}"
                            class=" hover:text-white border border-[#fb923c] text-[#fb923c] block w-full text-2xl  hover:bg-[#ea580c] font-bold py-4 px-4 rounded-lg text-center">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="hover:text-white  border border-[#fb923c] text-[#fb923c] block w-full text-2xl  hover:bg-[#ea580c] font-bold py-4 px-16 rounded-lg text-center">
                            Login
                        </a>


                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="hover:text-white  border border-[#fb923c] text-[#fb923c] block w-full text-2xl  hover:bg-[#ea580c] font-bold py-4 px-16 rounded-lg text-center">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</body>


</body>

</html>
