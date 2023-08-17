<x-admin-layout>
    <x-slot name="header">

        <div class="flex justify-between items-center">

            <span>

                <h2 class="flex flex-col gap-4 font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Admin Dashboard') }}

                </h2>
                <p>
                    {{-- if search --}}
                    @if (request()->query('search'))
                        <span class="text-gray-500 text-sm">Search results for "{{ request()->query('search') }}"</span>
                    @endif
                </p>
            </span>
            <span>
                {{-- filter --}}
                <form action="{{ route('admin.dashboard') }}" method="GET">
                    {{-- status --}}
                    <select name="status" id="status" class="rounded-lg border border-gray-300 px-4 py-2" onchange="this.form.submit()">
                        <option value="" {{ request()->query('status') == '' ? 'selected' : '' }}>-- Select Status
                            --</option>
                        <option value="pending" {{ request()->query('status') == 'pending' ? 'selected' : '' }}>Pending
                        </option>
                        <option value="approved" {{ request()->query('status') == 'approved' ? 'selected' : '' }}>
                            Approved</option>
                        <option value="rejected" {{ request()->query('status') == 'rejected' ? 'selected' : '' }}>
                            Rejected</option>
                    </select>
                    {{-- grades --}}
                    <select name='grade' id='grade' class="rounded-lg border border-gray-300 px-4 py-2" onchange="this.form.submit()">
                        <option value="">-- Select Grade --</option>
                        @foreach ($grades as  $grade)
                            <option value="{{ $grade->name }}" {{ request()->query('grade') == $grade->id ? 'selected' : '' }}>
                                {{ $grade->name }}</option>

                        @endforeach
                    </select>
                </form>
            </span>
        </div>
    </x-slot>
    <section
        class=" mt-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-3 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3  ">
        @forelse ($submissions as $submission)
            <x-admin-video-card :submission="$submission" />
        @empty
            <div
                class="w-full text-center text-gray-500 col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-3 h-[80vh] flex justify-center items-center">
                <h1 class="text-3xl font-bold">
                    {{-- if search --}}
                    @if (request()->query('search'))
                        No Results Found
                    @else
                        No Submissions Yet
                    @endif
                </h1>
            </div>
        @endforelse

        <div class="pagination col-span-1 sm:col-span-2 md:col-span-2 lg:col-span-3  ">
            {{ $submissions->links() }}
        </div>
    </section>

    <script>
        function rejectConfirmation(event, id) {
            event.preventDefault();
            Swal.fire({
                title: 'Reject Product',
                html: '<textarea id="reject-reason" class="w-full h-24" placeholder="Enter a reason for rejection"></textarea>',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Reject',
                preConfirm: () => {
                    const rejectReason = Swal.getPopup().querySelector('#reject-reason').value;
                    if (!rejectReason) {
                        Swal.showValidationMessage('Please enter a reason for rejection');
                    }
                    return {
                        rejectReason: rejectReason
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const rejectReason = result.value.rejectReason;
                    // Perform the reject operation with the reason
                    rejectSubmission(id, rejectReason);
                }
            });
        }

        function rejectSubmission(id, rejectReason) {
            const form = document.getElementById(`update-form-${id}`);
            const rejectReasonInput = document.createElement('input');
            rejectReasonInput.setAttribute('type', 'hidden');
            rejectReasonInput.setAttribute('name', 'reject_reason');
            rejectReasonInput.setAttribute('value', rejectReason);
            form.appendChild(rejectReasonInput);
            form.submit();
        }
    </script>
</x-admin-layout>
