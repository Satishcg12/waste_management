<x-admin-layout>

    <!-- component -->
    <x-table>
        <x-slot name="head">
            @if (session('status') === 'user-not-deleted')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-red-600">
                    {{ __('cannot delete user') }}</p>
            @endif
            <x-table-column>
                id
            </x-table-column>
            <x-table-column>
                name
            </x-table-column>
            <x-table-column>
                Last Update
            </x-table-column>
            <x-table-column>
                Created At
            </x-table-column>
            <x-table-column >
                Action
            </x-table-column>
        </x-slot>
        <x-slot name="body">

            @foreach ($grades as $grade)
                <tr>
                    <x-table-column>
                        {{ $grade->id }}
                    </x-table-column>
                    <x-table-column>
                        {{ $grade->name }}
                    </x-table-column>
                    <x-table-column>
                        {{ $grade->updated_at->diffForHumans() }}
                    </x-table-column>
                    <x-table-column>
                        {{ $grade->created_at }}
                    </x-table-column>
                    <x-table-column>

                        <div class="flex gap-2">
                            <a href="{{ route('admin.grade.edit', $grade->id) }}"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.grade.destroy', $grade->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </div>
                    </x-table-column>
                </tr>
            @endforeach
            <tr>
                <x-table-column colspan="5">

                    <div class="pagination">{{ $grades->links() }}</div>
                </x-table-column>
            </tr>
        </x-slot>
    </x-table>
</x-admin-layout>
