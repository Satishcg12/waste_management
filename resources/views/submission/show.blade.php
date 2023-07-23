<x-public-layout>
<x-container-round>
    <!-- component -->
    <script>
      function copyLink(){
        /* Get the text field */
        navigator.clipboard.writeText('{{route('submission.show', $submission->id)}}');
        //tooltip
        var tooltip = document.getElementById("myTooltip");

      }
    </script>
<section class="text-gray-700 body-font overflow-hidden bg-white">
    <div class="container px-5 py-24 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
        {{explode('/',$submission->attachment)[0]}}

        @if ($submission->attachment_type === 'video')
        <video class="lg:w-1/2 w-full object-fill object-center rounded border border-gray-200" controls>
            <source src="{{route('submission.getAttachment', explode('/',$submission->attachment)[0],explode('/',$submission->attachment)[1])}}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        @else
        <img alt="{{$submission->title}}" class="lg:w-1/2 w-full object-scale-down object-center rounded border border-gray-200" src="{{route('submission.getAttachment', $submission->attachment)}}">

        @endif
        {{-- <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="https://www.whitmorerarebooks.com/pictures/medium/2465.jpg"> --}}
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-1 capitalize">{{$submission->title}}</h1>
          <div class="flex mb-4 py-2">
            <span class="font-bold">Link:&nbsp;</span>
            <span class="flex  select-all">
                {{route('submission.show', $submission->id)}}
            </span>
            {{-- copy link icon --}}
            <span onclick='copyLink()' class="border ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-auto hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                </svg>
            </span>
          </div>
          {{-- <form action="">
            <input type="hidden" name="submission_id" value="{{$submission->id}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="vote" value="1">
            <button type="submit" class="inline-flex text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">Upvote</button>
          </form> --}}

          <p class="leading-relaxed">{{$submission->description}}</p>

        </div>
      </div>
    </div>
  </section>
</x-container-round>
</x-public-layout>
