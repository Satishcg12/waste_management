<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    /* animate in medium screen only */
    @media (min-width: 768px) {

        .typing-text {
            width: 41ch;
            height: 100%;
            animation: typing 5s steps(41) alternate infinite, blink .5s step-end infinite alternate;

            white-space: nowrap;
            overflow: hidden;
            border-right: 3px solid;
            font-family: monospace;
        }

        @keyframes typing {
            0% {
                width: 0
            }

            50%,
            100% {
                width: 41ch
            }
        }

        @keyframes blink {
            50% {
                border-color: transparent
            }
        }
    }
</style>

<body>
    <div id="top"></div>
    @include('layouts.publicNavigation')

    <main class="  mt-5 h-[80vh] flex flex-col justify-center items-center bg-gradient-to-b from-white to-gray-200">
        <div class="main text-center p-5 py-52 ">
            <h2 class="font-extrabold text-4xl sm:text-5xl lg:text-6xl">
                <span class="text-blue-800">"From Waste to Wonder"</span><br>
                <div class="font-bold text-3xl sm:text-2xl lg:text-4xl typing-text">Transforming the World One Step at a
                    Time</div>
            </h2>
            <p class="mt-6 text-lg text-slate-600 max-w-3xl mx-auto dark:text-slate-400">
                Small Steps, <span class="text-2xl">Big Difference</span>
            </p>
            <div class="buttons mt-5 ">
                <button
                    class="text-white text-light px-6 py-4 rounded-lg bg-orange-500 hover:bg-orange-600 shadow-lg hover:shadow-xl font-bold transition-all duration-300"><a
                        href="{{ route('home') }}">Get Started</a></button>
            </div>
        </div>
    </main>

    <div class="img-container bg-gradient-to-t from-white to-gray-200 ">
        <div class="md:px-10 py-5 flex flex-wrap justify-center">
            <x-featured-card src="https://picsum.photos/200/300" title="Title 1" />
            <x-featured-card src="https://picsum.photos/200/300" title="Title 2" />
            <x-featured-card src="https://picsum.photos/200/300" title="Title 3" />
            <x-featured-card src="https://picsum.photos/200/300" title="Title 1" />
            <x-featured-card src="https://picsum.photos/200/300" title="Title 2" />
            <x-featured-card src="https://picsum.photos/200/300" title="Title 3" />


        </div>
    </div>
    <span id="about-us"></span>
    <div class="pt-14">

        <h2 class="about-us font-bold md:px-10 py-10 text-center text-3xl sm:text-2xl lg:text-4xl" id="about-us">About
            Us</h2>
        <div class="px-3 md:px-10 py-5 flex flex-wrap">
            <div class="about-college w-full md:w-1/2 md:pr-5">
                <div
                    class="introduction w-full p-4 mb-4 text-justify bg-gray-100  hover:bg-gray-200 duration-300 rounded-lg">
                    <h2 class="mb-5 text-center text-3xl sm:text-2xl lg:text-4xl">Samriddhi School</h2>
                    <h2 class="pb-3 text-2xl">Introduction</h2>
                    Samriddhi School offers dedicated K-12 education, catering to each student's unique needs. We
                    celebrate diversity, fostering a passion for learning and creativity. Our mission is to empower
                    students to reach their full potential, embracing unlimited human capacity. We prioritize a
                    well-rounded education with a STEAM focus, ensuring academic excellence and personal growth.
                </div>
                <div class="vision w-full p-4 mb-4 text-justify bg-gray-100  hover:bg-gray-200 duration-300 rounded-lg">
                    <h2 class="pb-3 text-2xl">Vision</h2>
                    We envision Samriddhi School as a dynamic educational institution, setting a benchmark for students.
                    Our goal is to create an exceptional learning environment, where students thrive in an ever-evolving
                    world.
                </div>
            </div>

            <div class="about-project w-full md:w-1/2 md:pr-5">
                <div class="w-full p-4 mb-4 text-justify bg-gray-100 hover:bg-gray-200 duration-300 rounded-lg">
                    <h2 class="mb-5 text-center text-3xl sm:text-2xl lg:text-4xl">Why Zero Waste Project ?</h2>
                    <p>Our exciting 0 Waste Project Initiative empowers young minds to save the planet by tackling waste
                        challenges creatively. With fun workshops and activities, our little eco-champions recycle,
                        compost, and inspire their communities.</p>
                    <br>
                    <p>Armed with capes of kindness and backpacks filled with creativity, they embark on a mission to
                        leave a lasting legacy of environmental magic.
                        Every day is a new chapter in their adventure, where recycling becomes a superpower and
                        composting turns into a heroic quest
                    </p>
                    <br>
                    <p>journey, where the future is bright, the planet is greener, and our kids shine as the true
                        guardians of tomorrow! Together, we'll make the world a better place, one eco-heroic step at a
                        time!</p>
                </div>
                <div
                    class="quote w-full p-3 mb-4 text-center text-xl bg-gray-100  hover:bg-gray-200 duration-300 rounded-lg">
                    STRONGER ROOTS FOR BETTER FRUITS
                </div>
            </div>
        </div>
    </div>
    <span id="contact-us"></span>
    <div class="pt-12">
        <h2 class="font-bold md:px-10 py-10 text-center text-3xl sm:text-2xl lg:text-4xl">Contact Us</h2>
        <div class="contact-us px-3 md:px-10 py-5">
            <div class="flex justify-between flex-wrap bg-gray-100 rounded-lg">
                <div class="w-full md:w-1/3 p-3 bg-gray-100 hover:bg-gray-200 duration-300 rounded-lg">
                    <h5 class="text-1.5xl">Location</h5>
                    <ul class="list-disc list-inside">
                        <li><b>Secondary Wing:</b><br>
                            Near Banasthali Chowk<br>
                            Banasthali, Balaju, Kathmandu, Nepal</li>
                        <li><b>Pre-School Wing:</b><br>
                            Opposite to Bhat Bhateni Supermarket, Balaju<br>
                            Binayak Basti, Kathmandu, Nepal</li>
                    </ul>
                </div>
                <div class="w-full md:w-1/3 p-3 bg-gray-100 hover:bg-gray-200 duration-300 rounded-lg">
                    <h5 class="text-1.5xl">Phone &amp; E-mail</h5>
                    <ul class="list-disc list-inside">
                        <li><b>Secondary Wing:</b><br>
                            Tel:
                            <a href="tel:014983777">01-4983777</a>,
                            <a href="tel:014984777">4984777</a>
                        </li>
                        <li><b>Pre-School Wing:</b><br>
                            Tel:
                            <a href="tel:014970590">01-4970590</a>,
                            <a href="tel:014970591">4970591</a>
                        </li>
                        <li>Email:
                            <a href="mailto:info@samriddhischool.edu.np">info@samriddhischool.edu.np</a>
                        </li>
                    </ul>
                </div>
                <div class="w-full md:w-1/3 p-3 bg-gray-100 hover:bg-gray-200 duration-300 rounded-lg">
                    <h5 class="text-1.5xl">School Hours</h5>
                    <ul class="list-disc list-inside">
                        <li>Grade XI – XII: 6:30 AM – 10:45 AM</li>
                        <li>School Section (I-X): 8:30 AM to 4:30 PM</li>
                        <li>Pre-School Section: 9:00 AM to 3:00 PM</li>
                        <li>Office Hours: 8:30 AM to 4:30 PM<br>(Saturday Closed)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="developers" class="md:px-10 py-8 flex justify-center items-center flex-wrap space-x-2">
        <a href="https://samriddhischool.edu.np" target="_blank"><img src="/assets/samriddhi-logo.jpg"
                alt="samriddhi school" class="h-20 cursor-pointer"></a>
        <a href="https://kbcampus.edu.np" target="_blank"><img src="/assets/kbc-logo.png"
                alt="Kathmandu-Business-Campus" class="h-20"></a><span> ( Owned & Managed by Samriddhi School
            )</span>
    </div>
    <h2 class="font-bold md:px-10 py-10 text-center text-xl">Developers BCA 3rd SEM Students</h2>
    <div class=" max-w-5xl mx-auto dev-container md:px-10">
        <div class="flex flex-wrap gap-5 justify-center">

            <x-welcome-person-card name="Satish Chaudhary" role="Backend Developer" src="https://picsum.photos/200/300" />
            <x-welcome-person-card name="Rayyan Balami" role="Frontend Developer" src="/assets/team/rynb_hir000.jpeg" />
            <x-welcome-person-card name="Kelvin Maharjan" role="Technical Writer" src="https://picsum.photos/200/300" />
            <x-welcome-person-card name="Nishan Mahat" role="Quality Assurance Analyst" src="https://picsum.photos/200/300" />
            <x-welcome-person-card name="Saiyam Shrestha" role="Presentation Coordinator" src="https://picsum.photos/200/300" />
            <x-welcome-person-card name="Riyaz Bajracharya" role="Visual Content Specialist" src="https://picsum.photos/200/300" />


        </div>
    </div>


    <footer class="p-5 text-center bg-gradient-to-b from-white to-gray-200">
        <p class="my-5">© 2021 Samriddhi School, Binayak Basti, Balaju, Kathmandu | Tel: Primary Wing - 01-4970590/
            4970591,
            Secondary Wing - 01-4983777/ 4984777
        </p>
        <div class="fixed bottom-3 right-3 bg-blue-500 rounded-full text-white hover:bg-blue-600" title="go to top">
            {{-- go to top svg --}}
            <a href="#top">
                <svg xmlns="http://www.w3.org/2000/svg" class="rotate-180 h-10 w-10 transition-all duration-300"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0
                        111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0
                        010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </footer>


</body>

</html>
