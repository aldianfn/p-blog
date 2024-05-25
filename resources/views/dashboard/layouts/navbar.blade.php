<nav class="dark:bg-gray-700">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="{{ route('dashboard.index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ $title }}</span>
        </a>
        <div class="flex items-center space-x-6 rtl:space-x-reverse">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm text-blue-600 dark:text-blue-500 hover:underline">
                   <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                </button>
             </form>
        </div>
    </div>
</nav>