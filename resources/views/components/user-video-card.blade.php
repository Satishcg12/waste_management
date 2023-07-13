<a href="{{ route('submission.show', $item) }}}">
    <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative hover:shadow-xl rounded overhi">
        <div class="border-b h-40 overflow-hidden">
            @if ($item->attachment_type == 'video')
            <video class="w-full ">
                  <source src="{{ asset('storage/' . $item->attachment) }}" type="video/mp4">
                  Your browser does not support HTML video.
              </video>
          @else
              <img class="w-full h-36" src="{{ asset('storage/' . $item->attachment) }}" alt="{{$item->title}}">
          @endif
        </div>
      <div class="desc p-4 text-gray-800">
             <div class="title font-bold block cursor-pointer hover:underline capitalize truncate">{{ $item->title }}</div>
          <div class="flex justify-between items-center mt-2">
              <div class="flex gap-3">
                  <span class="text-sm text-gray-600">

                    status: {{ $item->status }}
                </span>
              </div>
              <div>
                  <span class="text-xs text-gray-600">{{ $item->updated_at->diffForHumans() }}</span>
              </div>
          </div>
      </div>
    </div>

</a>
