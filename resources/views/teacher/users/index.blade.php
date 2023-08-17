<x-teacher-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Users') }}
                </h2>
                <p>
                    @if (request()->query('search'))
                        <span class="text-gray-500 text-sm">Search results for "{{ request()->query('search') }}"</span>
                    @endif
                </p>
            </div>
            <a href="{{ route('teacher.user.create') }}"
                class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">Add User</a>
        </div>
    </x-slot>

    @if (!$users->count())
        <div class="w-full text-center text-gray-500 h-[80vh] flex justify-center items-center">
            <h1 class="text-3xl font-bold">
                {{-- if search --}}
                @if (request()->query('search'))
                    No Results Found
                @else
                    No Users Yet
                @endif
            </h1>
        </div>
        @else
    <!-- component -->
    <x-table>
        <x-slot name="head">
            @if (session('status') === 'user-not-deleted')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-red-600">
                    {{ __('cannot delete user') }}</p>
            @endif
            <x-table-column>
                Name
            </x-table-column>
            <x-table-column>
                Grade
            </x-table-column>
            <x-table-column>
                Role
            </x-table-column>
            <x-table-column>
                Upload Count
            </x-table-column>
            <x-table-column>
                Last Update
            </x-table-column>
            <x-table-column>
                Action
            </x-table-column>
        </x-slot>
        <x-slot name="body">

            @foreach ($users as $user)
                <tr>

                    <x-table-column>
                        <div class="text-sm">
                            <div class="font-medium text-gray-700">{{ $user->name }}</div>
                            <div class="text-gray-500">{{ $user->email }}</div>
                        </div>
                    </x-table-column>
                    <x-table-column>
                        {{ $user->grade->name }}
                    </x-table-column>
                    <x-table-column>
                        student
                    </x-table-column>
                    <x-table-column>
                        {{ $user->upload_count }}
                    </x-table-column>
                    <x-table-column>
                        {{-- display "-" if user update at is null --}}
                        @if ($user->updated_at)
                            {{ $user->updated_at->diffForHumans() }}
                        @else
                            -
                        @endif
                    </x-table-column>
                    <x-table-column>
                        <div class="flex gap-2 items-center">
                            <a href="{{ route('teacher.user.edit', $user->id) }}"
                                class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            <x-delete-btn :href="route('teacher.user.destroy', $user->id)" />
                        </div>
                    </x-table-column>
                </tr>
            @endforeach
            <tr>
                <x-table-column colspan="6">

                    <div class="pagination">{{ $users->links() }}</div>
                </x-table-column>
            </tr>
        </x-slot>
    </x-table>
    @endif
</x-teacher-layout>
