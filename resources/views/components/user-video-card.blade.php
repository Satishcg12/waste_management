

        {{-- video card --}}
        <div class=" group relative  block">
            <a href="{{ route('dashboard.submission.show', ['submission'=> $submission->id]) }}">
                {{-- thumbnail --}}
                <x-thumbnail :submission="$submission" />
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
