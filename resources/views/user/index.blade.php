<x-app-layout>



    <div class="p-12">

        <x-container-round>
            <h2>
                Users
            </h2>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                    <tr>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </x-container-round>
    </div>
</x-app-layout>
