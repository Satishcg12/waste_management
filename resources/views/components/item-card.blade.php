<div class="h-80 max-w-sm w-11/12 sm:w-5/12 md:w-3/12  rounded-lg overflow-hidden border shadow-md">
<div class="h-5/6">

    @if ($item->attachment_type == 'video')
    <video class="h-full w-full object-cover" controls>
        <source src="storage/{{ $item->attachment }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        @else
        <img src="storage/{{ $item->attachment }}" alt="image" class="h-full w-full object-cover" />
        @endif
    </div>
    <div class="p-4 flex justify-between w-full flex-nowrap">
        <p class="text-gray-900 font-bold text-xl mb-2 whitespace-nowrap text-ellipsis overflow-hidden  w-7/12">{{ $item->title }}</p>
        <span>{{$item->created_at->diffForHumans()}}</span>
    </div>



</div>
