<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload') }}
        </h2>
    </x-slot>
    <div class="py-12">

        <x-container-round>
            @include('submission.partials.upload-file-form')
        </x-container-round>
    </div>
</x-app-layout>
