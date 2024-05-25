@extends('layouts.master')

@section('content')
@include('dashboard.layouts.sidebar')

<div class="sm:ml-64 min-h-screen">
    @include('dashboard.layouts.navbar')
    <div class="p-4">
        <h1 class="text-white"">
            Hello, {{ $username }}!
        </h1>
        @if($errors->any)
            @foreach ($errors->all() as $error)
                <div id="alert-2" class="flex items-center p-4 md:my-3 text-red-800 md:rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ $error }}
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            @endforeach
        @endif
    
        <div class="relative overflow-x-auto shadow-md rounded-lg mt-8">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-white">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 w-36 text-white">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Permission
                        </th>
                        <th scope="col" class="px-6 py-3 lg:w-72 text-white text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <form class="max-w-md" action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('POST');
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 text-white">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 text-white">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 text-white">
                                <div id="user_role_{{ $user->id }}">
                                    {{ $user->role->role }}
                                </div>
                                <select id="role_list_{{ $user->id }}" name="role_id[{{ $user->id }}]" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" @if ($user->role->role === $role->role) selected @endif>{{ $role->role }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="px-6 py-4">
                                <?php $colors = ['gray-700', 'blue-900', 'green-900']; ?>
                                {{-- @foreach ($users as $user)
                                <span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-{{ $colors[($loop->iteration - 1) % count($colors)] }} dark:text-blue-300">{{ $user->name }}</span>
                                @endforeach --}}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col justify-center md:flex-row">
                                    <a href="#" class="bg-blue-700 mr-2 px-3 py-2 rounded-lg text-white">View</a>
                                    <button id="user_edit_{{ $user->id }}" type="button" class="user-edit mr-3 my-3 md:my-0 bg-green-700 px-3 py-2 rounded-lg text-white">Edit</button>
                                    <button id="user_edit_confirmation_{{ $user->id }}" type="submit" class="hidden mr-2 my-3 md:my-0 bg-green-700 px-3 py-2 rounded-lg text-white">Confirm</button>
                                    <a href="#" class="bg-red-600 px-3 py-2 rounded-lg text-white">Delete</a>
                                </div>
                            </td>
                        </tr> 
                    </form>   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const editBtn = document.querySelectorAll('.user-edit');

    function toggleVisibility(hiddenElement, visibleElement) {
        hiddenElement.classList.add('hidden');
        visibleElement.classList.remove('hidden');
    }
    
    editBtn.forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.id.split('_')[2];
            const userRole = document.getElementById(`user_role_${userId}`);
            const roleList = document.getElementById(`role_list_${userId}`);
            const userEdit = document.getElementById(`user_edit_${userId}`);
            const userEditConfirmation = document.getElementById(`user_edit_confirmation_${userId}`);

            toggleVisibility(userRole, roleList);
            toggleVisibility(userEdit, userEditConfirmation);
            console.log(userEdit);
        })
    })
</script>

@endsection