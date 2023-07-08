<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            @if (auth()->user()->isAdmin)
                (Admin)
            @elseif (auth()->user()->isTeacher)
                (teacher)
            @endif
        </h2>
    </x-slot>
    <x-container-round>

         {{-- 3 col on larg 2 on medium  1 in small--}}
        <div class="flex flex-wrap gap-4 justify-around">

            @foreach ($submission as $item)
            <x-item-card :item="$item" />

            @endforeach
        </div>
        <div class="pagination">

            {{ $submission->links() }}
        </div>
    </x-container-round>
</x-app-layout>
