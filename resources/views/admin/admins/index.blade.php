<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Admins') }}
                </h2>
                <p>
                    {{-- if search --}}
                    @if (request()->query('search'))
                        <span class="text-gray-500 text-sm">Search results for "{{ request()->query('search') }}"</span>
                    @endif
                </p>
            </div>
            <a href="{{ route('admin.admin.create') }}"
                class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">Add Admin</a>

        </div>
    </x-slot>

    @if (!$admins->count())
        <div class="w-full text-center text-gray-500 col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-3 h-[80vh] flex justify-center items-center">
            <h1 class="text-3xl font-bold">
                {{-- if search --}}
                @if (request()->query('search'))
                    No Results Found
                @else
                    No Admins Yet
                @endif
            </h1>
        </div>
    @else
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
                    </x-table-column>
                    <x-table-column>
                        {{-- display "-" if admin update at is null --}}
                        @if ($admin->created_at)
                            {{ $admin->created_at }}
                        @else
                            -
                        @endif
                    </x-table-column>
                    <x-table-column>
                        <div class="flex gap-2 items-center">
                            <a href="{{ route('admin.admin.edit', $admin->id) }}"
                                class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">
                                Edit</a>
                            <x-delete-btn :href="route('admin.admin.destroy', $admin->id)" />
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
    @endif
</x-admin-layout>
