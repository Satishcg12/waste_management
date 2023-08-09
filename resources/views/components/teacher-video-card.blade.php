{{-- video card --}}
<div class=" group relative  block">
    <a href="{{ route('teacher.submission.edit', ['submission' => $submission->id]) }}">
        {{-- thumbnail --}}

        <x-thumbnail :submission="$submission" />
        {{-- details --}}
        <div class="p-2 h-24  block">
            {{-- title --}}
            <h2 class="font-bold text-lg   line-clamp-2 ">
                {{ $submission->title }}
            </h2>
            <div class="flex justify-between items-center">
                {{-- update video status --}}
                <div class="flex justify-center items-center space-x-4">
                    {{-- status --}}
                    <span class="text-xs text-gray-600 font-bold">Status:
                        <span
                            class="font-normal {{ $submission->status == 'pending' ? 'text-yellow-500' : '' }} {{ $submission->status == 'approved' ? 'text-green-500' : '' }} {{ $submission->status == 'rejected' ? 'text-red-500' : '' }} ">
                            {{-- status --}}
                            {{ $submission->status }}
                        </span>
                    </span>
                    {{-- approve/reject --}}
                    @if ($submission->status == 'pending')
                        {{-- approve --}}
                        <x-approve-btn :action="route('teacher.submission.approve', $submission)" />
                        {{-- reject --}}
                        <x-reject-btn :action="route('teacher.submission.reject', $submission)" :id="$submission->id" />
                    @elseif($submission->status == 'approved')
                        {{-- reject --}}
                        <x-reject-btn :action="route('teacher.submission.reject', $submission)" :id="$submission->id" />
                    @else
                        {{-- approve --}}
                        <x-approve-btn :action="route('teacher.submission.approve', $submission)" />
                    @endif
                </div>
                {{-- time --}}
                <span class="text-xs text-gray-600">{{ $submission->updated_at->diffForHumans() }}</span>

            </div>
        </div>
    </a>
</div>
