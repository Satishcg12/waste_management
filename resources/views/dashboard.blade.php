<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-container-round>
            @foreach ($submission as $item)

            <a href="{{ route('submission.show',$item->id) }}">
                {{$item->title}}
                {{$item->description}}
                {{$item->status}}
                {{$item->attachment}}

                <img src="{{'storage/'.$item->attachment}}" alt="img not found">

                {{$item->created_at->diffForHumans()}}
            </a>

            @endforeach
        </x-container-round>
    </div>
</x-app-layout>
