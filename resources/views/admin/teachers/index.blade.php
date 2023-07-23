
<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Teachers') }}
            </h2>
            <a href="{{ route('admin.teacher.create') }}"
                class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">Add Teacher</a>

        </div>

    </x-slot>

    <!-- component -->
    <x-table>
        <x-slot name="head">
            @if (session('status') === 'teacher-not-deleted')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-red-600">
                    {{ __('cannot delete teacher') }}</p>
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
                Last Update
            </x-table-column>
            <x-table-column>
                Action
            </x-table-column>
        </x-slot>
        <x-slot name="body">

            @foreach ($teachers as $teacher)
                <tr>

                    <x-table-column>
                        <div class="text-sm">
                            <div class="font-medium text-gray-700">{{ $teacher->name }}</div>
                            <div class="text-gray-500">{{ $teacher->email }}</div>
                        </div>
                    </x-table-column>
                        <x-table-column>
                            {{ $teacher->grade->name }}
                        </x-table-column>
                        <x-table-column>
                            Teacher
                        </x-table-column>
                    <x-table-column>
                        {{-- display "-" if teacher update at is null --}}
                        @if ($teacher->updated_at)
                            {{ $teacher->updated_at->diffForHumans() }}
                        @else
                            -
                        @endif
                    </x-table-column>
                    <x-table-column>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.teacher.edit', $teacher->id) }}"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.teacher.destroy', $teacher->id) }}" method="POST">
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

                <div class="pagination">{{ $teachers->links() }}</div>
                </x-table-column>
            </tr>
        </x-slot>
    </x-table>
</x-admin-layout>
