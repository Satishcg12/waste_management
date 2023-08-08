

        {{-- video card --}}
        <div class=" group relative  block">
            <a href="{{ route('teacher.submission.edit',[ 'submission'=> $submission->id ]) }}">
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
                                <span class="font-normal {{$submission->status == 'pending' ? 'text-yellow-500' : ''}} {{$submission->status == 'approved' ? 'text-green-500' : ''}} {{$submission->status == 'rejected' ? 'text-red-500' : ''}} ">
                                    {{-- status --}}
                                    {{ $submission->status }}
                                </span>
                            </span>
                            {{-- approve/reject --}}
                            @if ($submission->status == 'pending')
                            {{-- approve --}}
                                <form action="{{ route('teacher.submission.updateStatus', $submission) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="">
                                        <svg class="fill-green-500 h-6 w-6 " xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/></svg>
                                    </button>
                                </form>
                                {{-- reject --}}
                                <form action="{{ route('teacher.submission.updateStatus', $submission) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="">
                                        {{-- cross svg  --}}
                                        <svg class="fill-red-500 h-6 w-6 " xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/></svg>
                                    </button>

                                </form>
                            @elseif($submission->status == 'approved')
                                {{-- reject --}}
                                <form action="{{ route('teacher.submission.updateStatus', $submission) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="">
                                        {{-- cross svg  --}}
                                        <svg class="fill-red-500 h-6 w-6 " xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023
                                        Fonticons, Inc. --><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0
                                        464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4
                                        9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0
                                        33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9
                                        0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9
                                        0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/></svg>
                                    </button>
                                </form>
                            @else
                                {{-- approve --}}
                                <form action="{{ route('teacher.submission.updateStatus', $submission) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="">
                                        {{-- check svg --}}
                                        <svg class="fill-green-500 h-6 w-6 " xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com
                                        License - https://fontawesome.com/license (Commercial License) -->
                                        <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1
                                        0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0
                                        0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9
                                        0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4
                                        24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369
                                        209z"/></svg>

                                    </button>
                                </form>
                            @endif
                        </div>
                        {{-- time --}}
                        <span class="text-xs text-gray-600">{{ $submission->updated_at->diffForHumans() }}</span>
                        {{-- Reject Button --}}
<button type="button" class="reject-button" data-toggle="modal" data-target="#rejectModal{{ $submission->id }}">
    Reject
</button>

{{-- Reject Modal --}}
<div class="modal fade" id="rejectModal{{ $submission->id }}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel{{ $submission->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel{{ $submission->id }}">Reject Submission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teacher.submission.updateStatus', $submission) }}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="status" value="rejected">
                    <div class="form-group">
                        <label for="reason">Reason for Rejection</label>
                        <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Reject</button>
                </form>
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>
            </a>
        </div>
