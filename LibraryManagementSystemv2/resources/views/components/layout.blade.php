<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>Library Management System</title>
</head>

<body class="bg-cover bg-center bg-[url('/img/bg.jpg')] ">
    @include('flash-message')
    @auth
        @include('components.adminNav')

        @include('components.userNav')
    @else
        <nav class="text-white backdrop-blur-lg fixed w-full z-20 top-0 start-0 font-bold text-xl ">


            <div class="max-w-screen-xl flex flex-wrap items-center justify-center mx-auto p-4 gap-10">
                <div>
                    <a href="/login" class="hover:text-green-500"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </div>
                <div>
                    <a href="/register" class="hover:text-green-500"><i class="fa-solid fa-user-plus"></i> Register</a>
                </div>


            </div>
        </nav>


    @endauth

    <main>
        {{ $slot }}
    </main>


</body>

</html>
