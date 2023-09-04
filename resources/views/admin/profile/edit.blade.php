<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <x-container-round>
            @include('admin.profile.partials.user-information')
        </x-container-round>

    </div>
    <div class="py-5">
        <x-container-round>
            @include('admin.profile.partials.update-password-form')
        </x-container-round>

    </div>

</x-admin-layout>
