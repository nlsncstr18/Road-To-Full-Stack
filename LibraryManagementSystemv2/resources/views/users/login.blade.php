<x-layout>
    @guest
        <div class="m-28 p-10 max-w-lg mx-auto shadow-2xl shadow-black backdrop-blur-sm text-white">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Login
                </h2>

            </header>

            <form method="POST" action="/users/authenticate">
                @csrf

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg ">Email</label>
                    <input type="email" class="p-2 w-full outline-none bg-transparent border-b border-gray-400"
                        name="email" value="{{ old('email') }}" />

                    @error('email')
                        <p class="text red 500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 relative">
                    <label for="password" class="inline-block text-lg">
                        Password
                    </label>
                    <input type="password" class="p-2 w-full outline-none bg-transparent border-b border-gray-400"
                        name="password" value="{{ old('password') }}" />
                    @error('password')
                        <p class="text red 500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>



                <div class="mb-6">
                    <button type="submit" class="bg-green-500 text-white rounded py-2 px-4 hover:bg-black font-bold">
                        Sign In
                    </button>

                </div>

                <div class="mt-8  font-bold">
                    <p class="font-bold">
                        Don't have an account?
                        <a href="/register" class="text-red-500 font-bold">Register</a>
                    </p>
                </div>
            </form>
        </div>
    @endguest


</x-layout>
