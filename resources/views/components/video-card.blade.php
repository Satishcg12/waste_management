

        {{-- video card --}}
        <div class=" group relative  block">
            <a href="{{ route('submission.show', ['submission'=> $submission->id]) }}">
                {{-- thumbnail --}}
                <div class="aspect-video bg-gray-200 rounded-lg overflow-hidden shadow">
                    @if ($submission->attachment_type == 'video')
                        <img src="{{route('submission.getAttachment', ['folder'=> $submission->folder, 'filename'=> 'thumbnail.jpg'])}}" alt="Video thumbnail"
                            class=" aspect-video w-full object-cover group-hover:hover:scale-105 transition-all ">
                    @else
                        <img src="{{route('submission.getAttachment', ['folder'=> $submission->folder, 'filename'=> $submission->filename])}}" alt="Video thumbnail"
                            class=" aspect-video w-full object-cover group-hover:hover:scale-105 transition-all ">
                    @endif
                </div>
                {{-- details --}}
                <div class="p-2 h-24  block">
                    {{-- title --}}
                    <h2 class="font-bold text-lg   line-clamp-2 ">
                        {{ $submission->title }}
                    </h2>
                    {{-- description --}}
                    <p class="text-gray-500 text-sm  line-clamp-1">
                        {{ $submission->description }}
                    </p>
                    {{-- views --}}
                </div>
            </a>
        </div>
