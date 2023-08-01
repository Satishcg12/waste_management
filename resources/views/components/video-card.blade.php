

        {{-- video card --}}
        <div class=" group relative  block">
            <a href="{{ route('submission.show', ['submission'=> $submission->id]) }}">
                {{-- thumbnail --}}
                <x-thumbnail :submission="$submission" />
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
