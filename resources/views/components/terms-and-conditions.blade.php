{{-- import terms.md --}}
@php
$parsedown = new Parsedown();
$content = file_get_contents(resource_path('docs/terms.md'));
$html = $parsedown->text($content);
@endphp

{{-- terms and conditions --}}

<section class="h-screen grid place-items-center p-4">

    <div class=" bg-white w-full h-full max-w-3xl min-h-max mx-auto p-4 rounded-lg overflow-auto">

        <div class="mt-4 bg-gray-100 p-4 rounded-lg overflow-auto">
            <x-markdown-document>
                {!! $html !!}
            </x-markdown-document>
        </div>

        <div class=" flex flex-col md:flex-row items-center justify-between ">

            {{-- i agree chek box --}}
            <div class="mt-4 flex items-center">
                <input type="checkbox" name="terms" id="terms" class="mr-2 ">
                <label for="terms">I agree to the <a href="/terms-and-conditions" class="text-blue-500 hover:underline">
                    terms and
                        conditions</a></label>
            </div>

            {{-- buttons --}}
            <form action="{{ route('terms-and-conditions.agree') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-4 flex items-center justify-end">
                    <button type="submit" disabled
                        class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                        Agree
                    </button>
                </div>
            </form>
        </div>

        <script>
            const terms = document.getElementById('terms');
            const button = document.querySelector('button[type="submit"]');

            terms.addEventListener('change', function(e) {
                if (e.target.checked) {
                    button.disabled = false;
                } else {
                    button.disabled = true;
                }
            });
        </script>





    </div>
</section>
