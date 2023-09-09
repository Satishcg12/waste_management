<div class="mb-6 lg:mb-0 ">
    <div
        class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
        <div class="relative overflow-hidden bg-cover bg-no-repeat">
            <img src="{{ $src }}" alt="{{ $name }}" class="w-full rounded-t-lg" />

                <div
                    class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed">
                </div>

            <svg class="absolute left-0 bottom-0 text-white dark:text-neutral-700"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="currentColor"
                    d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </div>
        <div class="px-4">
            <h5 class="mb-1 text-lg font-bold">
                {{$name}}
            </h5>
            <h6 class="mb-2 font-medium text-primary dark:text-primary-400">
                {{$role}}
            </h6>

            <p class=" line-clamp-5 text-center text-neutral-500 dark:text-neutral-300 ">
                {!! $slot !!}
            </p>
            <button data-modal-target="{{$id}}" data-modal-toggle="{{$id}}" type="button"
                class="my-2 text-sm hover:underline ">
                Read More
            </button>
            <div id="{{$id}}" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-7xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->

                            <button type="button"
                                class="absolute inset-0 m-3 text-gray-400 bg-transparent bg-gray-100 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="{{$id}}">
                                <svg class="w-3 h-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        <!-- Modal body -->
                        <x-large-testimonial-card name="{{$name}}" role="{{$role}}" src="{{$src}}" >
                            {!! $slot !!}
                        </x-large-testimonial-card>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
