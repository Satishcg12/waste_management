
<x-admin-layout>

    <!-- component -->
    <x-table>
        <x-slot name="head">
            @if (session('status') === 'admin-not-deleted')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-red-600">
                    {{ __('cannot delete admin') }}</p>
            @endif
            <x-table-column>
                Name
            </x-table-column>
                <x-table-column>
                    Role
                </x-table-column>
            <x-table-column>
                Last Update
            </x-table-column>
            <x-table-column>
                Created At
            </x-table-column>
            <x-table-column>
                Action
            </x-table-column>
        </x-slot>
        <x-slot name="body">

            @foreach ($admins as $admin)
                <tr>

                    <x-table-column>
                        <div class="text-sm">
                            <div class="font-medium text-gray-700">{{ $admin->name }}</div>
                            <div class="text-gray-500">{{ $admin->email }}</div>
                        </div>
                    </x-table-column>
                        <x-table-column>
                            admin
                        </x-table-column>
                        <x-table-column>
                            {{-- display "-" if admin update at is null --}}
                            @if ($admin->updated_at)
                                {{ $admin->updated_at->diffForHumans() }}
                            @else
                                -
                            @endif
                        </x-table-column><x-table-column>
                            {{-- display "-" if admin update at is null --}}
                            @if ($admin->created_at)
                                {{ $admin->created_at }}
                            @else
                                -
                            @endif
                        </x-table-column>
                    <x-table-column>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.admin.edit', $admin->id) }}"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.admin.destroy', $admin->id) }}" method="POST">
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

                <div class="pagination">{{ $admins->links() }}</div>
                </x-table-column>
            </tr>
        </x-slot>
    </x-table>
</x-admin-layout>
