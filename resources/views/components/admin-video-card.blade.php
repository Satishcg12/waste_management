<div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative hover:shadow-xl rounded overhi">
    <div class="border-b h-40 overflow-hidden">
        @if ($item->attachment_type == 'video')
            <video class="w-full ">
                <source src="{{ asset('storage/' . $item->attachment) }}" type="video/mp4">
                Your browser does not support HTML video.
            </video>
        @else
            <img class="w-full h-36" src="{{ asset('storage/' . $item->attachment) }}" alt="{{ $item->title }}">
        @endif
    </div>
    <div class="desc p-4 text-gray-800">
        <a href="{{ route('submission.show', $item) }}}"
            class="title font-bold block cursor-pointer hover:underline capitalize truncate">{{ $item->title }}</a>
        <div class="flex justify-between items-center mt-2">
            <div class="flex gap-3">
                {{-- if pending --}}
                @if ($item->status == 'pending')
                    <form action="{{ route('submission.update', $item) }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" value="approved">

                        {{-- approve icon --}}
                        <x-approved-button />
                    </form>
                    <form action="{{ route('submission.update', $item) }}" method="POST">
                        @method('put')
                        @csrf
                        <input type="hidden" name="status" value="rejected">

                        {{-- reject icon --}}
                        <x-rejected-button />
                    </form>
                @elseif ($item->status == 'approved')
                    <form action="{{ route('submission.update', $item) }}" method="POST">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="status" value="rejected">

                        {{-- reject icon --}}
                        <x-rejected-button />
                    </form>
                @elseif ($item->status == 'rejected')
                    <form action="{{ route('submission.update', $item) }}" method="POST">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="status" value="approved">

                        {{-- approve icon --}}
                        <x-approved-button />
                    </form>
                @endif
            </div>
            <div>
                <span class="text-xs text-gray-600">{{ $item->user->name }}</span>
                <span class="text-xs text-gray-600">{{ $item->updated_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
</div>
