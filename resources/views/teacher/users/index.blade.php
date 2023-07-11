
<x-teacher-layout>

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
                        <div class="flex gap-2">
                            <a href="{{ route('teacher.user.edit', $user->id) }}"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('teacher.user.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
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
</x-teacher-layout>
