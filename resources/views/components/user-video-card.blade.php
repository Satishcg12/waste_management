<a href="{{ route('submission.show', $item) }}}">
    <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative hover:shadow-xl rounded overflow-hidden">
        <div class="border-b h-40 overflow-hidden ">
            @if ($item->attachment_type == 'video')
            <video class="h-full bg-red-400 object-cover" >
                  <source class="h-full " src="{{route('submission.getAttachment', ['folder'=> $item->folder, 'filename'=> $item->filename])}}" type="video/mp4" >
                  Your browser does not support HTML video.
              </video>
          @else
              <img class="w-full h-36 bg-cover" src="{{route('submission.getAttachment', ['folder'=> $item->folder, 'filename'=> $item->filename])}}" alt="{{$item->title}}">
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
