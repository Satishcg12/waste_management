<a href="{{ route('admin.submission.edit', $item) }}">
    <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative hover:shadow-xl rounded overhi">

            <div class="border-b h-40 overflow-hidden">
            @if ($item->attachment_type == 'video')
                <video class="w-full" src="{{route('submission.getAttachment', ['folder'=> $item->folder, 'filename'=> $item->filename])}}">
                    {{-- <source  type="video/mp4"> --}}
                    Your browser does not support HTML video.
                </video>
            @else
                <img class="w-full h-36" src="{{route('submission.getAttachment', ['folder'=> $item->folder, 'filename'=> $item->filename])}}" alt="{{ $item->title }}">
            @endif
        </div>
        <div class="desc p-4 text-gray-800">
            <h2 class="title font-bold block cursor-pointer hover:underline capitalize truncate">{{ $item->title }}</h2>
            <div class="flex justify-between items-center mt-2">
                <div class="flex gap-3">
                    {{-- action accoring to status --}}
                    @if ($item->status == 'pending')
                    {{-- approve --}}
                        <form action="{{ route('admin.submission.updateStatus', $item) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="approved">
                            <button type="submit" class="text-xs text-green-600">Approve</button>
                        </form>
                        {{-- reject --}}
                        <form action="{{ route('admin.submission.updateStatus', $item) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="text-xs text-red-600">Reject</button>
                        </form>
                    @elseif($item->status == 'approved')
                        {{-- reject --}}
                        <form action="{{ route('admin.submission.updateStatus', $item) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="text-xs text-red-600">Reject</button>
                        </form>
                    @else
                        {{-- approve --}}
                        <form action="{{ route('admin.submission.updateStatus', $item) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="approved">
                            <button type="submit" class="text-xs text-green-600">Approve</button>
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
    </a>
