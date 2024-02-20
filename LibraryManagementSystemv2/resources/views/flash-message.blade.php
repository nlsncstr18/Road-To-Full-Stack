@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="z-50 fixed top-0 left-1/2 transform -translate-x-1/2 text-white px-24 py-3 bg-green-500 rounded-sm font-bold">
        <p>{{ session('message') }}</p>
    </div>
@endif
