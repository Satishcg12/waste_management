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
                <div class="font-bold text-3xl sm:text-2xl lg:text-4xl typing-text">Transforming the World One Step at a Time</div>
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

    <div class="img-container bg-gradient-to-t from-white to-gray-200">
        <div class="md:px-10 py-5 flex flex-wrap justify-center">

            <div class="w-full md:w-1/3 p-2 hover:scale-105 transition-all duration-300">
                <img src="https://plus.unsplash.com/premium_photo-1661476504180-2480927f0959?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
                    alt="" class="w-full h-72 object-cover rounded-lg">
                <p class="text-center mt-3 mb-2 px-2 ">Super Kids Saving the Planet!</p>
            </div>

            <div class="w-full md:w-1/3 p-2 hover:scale-105 transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
                    alt="" class="w-full h-72 object-cover rounded-lg">
                <p class="text-center mt-3 mb-2 px-2 ">Waste Warriors Assemble: Kids Leading the Eco-Charge!</p>
            </div>

            <div class="w-full md:w-1/3 p-2 hover:scale-105 transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1610141160723-d2d346e73766?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80"
                    alt="" class="w-full h-72 object-cover rounded-lg">
                <p class="text-center mt-3 mb-2 px-2 ">Little Hands, Big Impact: Kids Tackling Waste Management
                    Challenges</p>
            </div>

            <div class="w-full md:w-1/3 p-2 hover:scale-105 transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1620046315397-ac3195dec719?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
                    alt="" class="w-full h-72 object-cover rounded-lg">
                <p class="text-center mt-3 mb-2 px-2 ">Young Eco-Champions: Kids Sparking a Waste Revolution!</p>
            </div>
            <div class="w-full md:w-1/3 p-2 hover:scale-105 transition-all duration-300">
                <img src="https://plus.unsplash.com/premium_photo-1663089569976-f50df94bf1b9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
                    alt="" class="w-full h-72 object-cover rounded-lg">
                <p class="text-center mt-3 mb-2 px-2 ">Small hands with big impact</p>
            </div>

            <div class="w-full md:w-1/3 p-2  transition-all duration-300 ">
                <div class=" w-full h-72 overflow-hidden rounded-lg bg-gray-200 ">

                    <img src="https://picsum.photos/200/300" alt=""
                    class="hover:scale-110 w-full object-cover transition-all ">
                </div>
                <p class="text-center mt-3 mb-2 px-2 ">Watch Waste Management Magic Happen!</p>
            </div>

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

        <h2 class="font-bold md:px-10 py-10 text-center text-3xl sm:text-2xl lg:text-4xl">Contact Us
        </h2>
        <div class="contact-us px-3 md:px-10 py-5 ">
            <div class="flex justify-between flex-wrap bg-gray-100 rounded-lg">
                <div class="w-full md:w-1/3 p-3 bg-gray-100 hover:bg-gray-200 duration-300 rounded-lg">
                    <h5 class="text-1.5xl">Location</h5>
                    <div>
                        <b><span class="bullet">&#8226;</span> Secondary Wing:</b><br />
                        Near Banasthali Chowk<br />
                        Banasthali, Balaju, Kathmandu, Nepal<br />
                        <b><span class="bullet">&#8226;</span> Pre-School Wing:</b><br />
                        Opposite to Bhat Bhateni Supermarket, Balaju<br />
                        Binayak Basti, Kathmandu, Nepal
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-3 bg-gray-100 hover:bg-gray-200 duration-300 rounded-lg">
                    <h5 class="text-1.5xl">Phone &amp; E-mail</h5>
                    <div>
                        <b><span class="bullet">&#8226;</span> Secondary Wing:</b><br />
                        Tel:
                        <a href="tel:014983777">01-4983777</a>,
                        <a href="tel:014984777">4984777</a><br />
                        <b><span class="bullet">&#8226;</span> Pre-School Wing:</b><br />
                        Tel:
                        <a href="tel:014970590">01-4970590</a>,
                        <a href="tel:014970591">4970591</a><br />
                        Email:
                        <a href="mailto:info@samriddhischool.edu.np">info@samriddhischool.edu.np</a><br />
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-3 bg-gray-100 hover:bg-gray-200 duration-300 rounded-lg">
                    <h5 class="text-1.5xl">School Hours</h5>
                    <div>
                        <span class="bullet">&#8226;</span> Grade XI – XII: 6:30 AM – 10:45 AM<br />
                        <span class="bullet">&#8226;</span> School Section (I-X): 8:30 AM to 4:30 PM<br />
                        <span class="bullet">&#8226;</span> Pre-School Section: 9:00 AM to 3:00 PM<br />
                        <span class="bullet">&#8226;</span> Office Hours: 8:30 AM to 4:30 PM<br />
                        (Saturday Closed)
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="developers" class="md:px-10 py-8 flex justify-center items-center flex-wrap space-x-2">
        <a href="https://samriddhischool.edu.np" target="_blank"><img src="/samriddhi-logo.jpg" alt="samriddhi school"
                class="h-20 cursor-pointer"></a>
        <a href="https://kbcampus.edu.np" target="_blank"><img src="/kbc-logo.png" alt="Kathmandu-Business-Campus"
                class="h-20"></a><span> ( Owned & Managed by Samriddhi School
            )</span>
    </div>
    <h2 class="font-bold md:px-10 py-10 text-center text-xl">Developers BCA 3rd SEM Students</h2>
    <div class="dev-container md:px-10">
        <div class="flex flex-wrap justify-center">

            <div class="w-1/3 md:w-1/6 p-2 hover:scale-105 transition-all duration-300">
                <img src="https://plus.unsplash.com/premium_photo-1661476504180-2480927f0959?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
                    alt="" class="w-full h-60 object-cover rounded-lg">
                <p class="text-center mt-3 mb-2 px-2 ">Satish Chaudhary</p>
            </div>

            <div class="w-1/3 md:w-1/6 p-2 hover:scale-105 transition-all duration-300">
                <img src="https://picsum.photos/200/300" alt=""
                    class="w-full h-60 object-cover rounded-lg hover:scale-105 transition-all duration-300">
                <p class="text-center mt-3 mb-2 px-2 ">Rayyan Balami</p>
            </div>

            <div class="w-1/3 md:w-1/6 p-2 hover:scale-105 transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
                    alt="" class="w-full h-60 object-cover rounded-lg">
                <p class="text-center mt-3 mb-2 px-2 ">Kelvin Maharjan</p>
            </div>

            <div class="w-1/3 md:w-1/6 p-2 hover:scale-105 transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1610141160723-d2d346e73766?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80"
                    alt="" class="w-full h-60 object-cover rounded-lg">
                <p class="text-center mt-3 mb-2 px-2 ">Nishan Mahat</p>
            </div>

            <div class="w-1/3 md:w-1/6 p-2 hover:scale-105 transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1620046315397-ac3195dec719?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
                    alt="" class="w-full h-60 object-cover rounded-lg">
                <p class="text-center mt-3 mb-2 px-2 ">Saiyam Shrestha</p>
            </div>
            <div class="w-1/3 md:w-1/6 p-2 hover:scale-105 transition-all duration-300">
                <img src="https://plus.unsplash.com/premium_photo-1663089569976-f50df94bf1b9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
                    alt="" class="w-full h-60 object-cover rounded-lg">
                <p class="text-center mt-3 mb-2 px-2 ">Riyaz Maharjan</p>
            </div>


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
