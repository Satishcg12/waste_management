<x-admin-layout>

    <div class="py-12">
        <x-container-round>
            @include('admin.admins.partials.update-profile-information-form')
        </x-container-round>
        <x-container-round>
            @include('admin.admins.partials.update-password-form')
        </x-container-round>
    </div>
</x-admin-layout>
