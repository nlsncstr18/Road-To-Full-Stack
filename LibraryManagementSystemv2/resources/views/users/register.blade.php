<x-layout>
    @guest
        <div class=" m-28 p-10 max-w-lg mx-auto shadow-2xl shadow-black backdrop-blur-sm text-white">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Register
                </h2>

            </header>

            <form method="POST" action="/users">
                @csrf
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">
                        Name
                    </label>
                    <input type="text" class="outline-none bg-transparent border-b border-gray-400  p-2 w-full text-white"
                        name="name" value="{{ old('name') }}" />

                    @error('name')
                        <p class="text red 500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input type="email"
                        class="outline-none bg-transparent border-b border-gray-400  p-2 w-full text-white" name="email"
                        value="{{ old('email') }}" />

                    @error('email')
                        <p class="text red 500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">
                        Password
                    </label>
                    <input type="password"
                        class="outline-none bg-transparent border-b border-gray-400 text-white  text-black p-2 w-full"
                        name="password" value="{{ old('password') }}" />
                    @error('password')
                        <p class="text red 500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password2" class="inline-block text-lg mb-2">
                        Confirm Password
                    </label>
                    <input type="password"
                        class="outline-none bg-transparent border-b border-gray-400 text-white p-2 w-full "
                        name="password_confirmation" value="{{ old('password_confirmation') }}" />
                    @error('password_confirmation')
                        <p class="text red 500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-green-500 text-white rounded py-2 px-4 hover:bg-black font-bold">
                        Sign Up
                    </button>

                </div>

                <div class="mt-8">
                    <p class="font-bold">
                        Already have an account?
                        <a href="/login" class="text-red-500 font-bold">Login</a>
                    </p>
                </div>
            </form>
        </div>
    @endguest


</x-layout>
