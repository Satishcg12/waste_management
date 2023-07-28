

        {{-- video card --}}
        <div class=" group relative  block">
            <a href="{{ route('dashboard.submission.show', $submission) }}}">
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
                    <div class="flex justify-between items-center">
                        {{-- video status --}}
                        <div class="flex gap-2">
                            @if ($submission->status == 'pending')
                                <span
                                    class="text-xs text-orange-500 px-2 py-1 rounded-full">{{ $submission->status }}</span>
                            @elseif($submission->status == 'approved')
                                <span
                                    class="text-xs text-green-600 px-2 py-1 rounded-full">{{ $submission->status }}</span>
                            @else
                                <span
                                    class="text-xs text-red-600 px-2 py-1 rounded-full">{{ $submission->status }}</span>
                            @endif
                        </div>
                        {{-- time --}}
                        <span class="text-xs text-gray-600">{{ $submission->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </a>
        </div>
