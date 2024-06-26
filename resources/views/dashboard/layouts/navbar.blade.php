<nav class="shadow-md">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="{{ route('dashboard.index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ $title }}</span>
        </a>
        <div class="flex items-center space-x-6 rtl:space-x-reverse">
            
            <button id="user-menu" data-dropdown-toggle="user-dropdown-menu" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            {{ $username }}
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            
            <!-- Dropdown menu -->
            <div id="user-dropdown-menu" class="z-10 hidden divide-y divide-gray-500 rounded-lg shadow w-44 bg-gray-700">
                <ul class="py-2 text-sm text-gray-200" aria-labelledby="user-menu">
                    <li>
                        <a href="{{ route('user.profile') }}" class="block px-4 py-2 w-full text-left hover:bg-gray-600">Profile</a>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <div class="py-2 text-sm text-gray-200">
                        <button type="submit" class="block px-4 py-2 w-full text-left hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>