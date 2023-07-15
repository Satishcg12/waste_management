<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Grade') }}
        </h2>
    </x-slot>
    <div class="py-12">

        <x-container-round>
            @include('admin.grades.partials.update-grade-form')
        </x-container-round>
    </div>
</x-admin-layout>
