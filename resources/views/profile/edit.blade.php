<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-container-round>
            @include('profile.partials.update-profile-information-form')
        </x-container-round>
        <x-container-round>
            @include('profile.partials.update-password-form')
        </x-container-round>
        <x-container-round>
            @include('profile.partials.delete-user-form')
        </x-container-round>
    </div>
</x-app-layout>
