<x-app-layout>

    <div class="py-12">
        <x-container-round>
            @include('user.partials.update-profile-information-form')
        </x-container-round>
        <x-container-round>
            @include('user.partials.update-password-form')
        </x-container-round>
    </div>
</x-app-layout>
