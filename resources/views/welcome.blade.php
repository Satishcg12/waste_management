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
                <a href="{{ route('home') }}">
                <button
                    class="text-white text-light px-6 py-4 rounded-lg bg-orange-500 hover:bg-orange-600 shadow-lg hover:shadow-xl font-bold transition-all duration-300">
                        Our Contribution
                    </button>
                </a>
            </div>
        </div>
    </main>
    <section class="md:px-10 px-3 py-5 bg-gradient-to-t from-white to-gray-200">

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 ">
            <div class="grid gap-4">
                <x-featured-card src="/assets/featured/1.jpg" />
                <x-featured-card src="/assets/featured/2.jpg" />
                <x-featured-card src="/assets/featured/3.jpg" />
            </div>
            <div class="grid gap-4">
                <x-featured-card src="/assets/featured/4.jpg" />
                <x-featured-card src="/assets/featured/5.jpg" />
                <x-featured-card src="/assets/featured/6.jpg" />
            </div>
            <div class="grid gap-4">
                <x-featured-card src="/assets/featured/7.jpg" />
                <x-featured-card src="/assets/featured/8.jpg" />
                <x-featured-card src="/assets/featured/9.jpg" />
            </div>
            <div class="grid gap-4">
                <x-featured-card src="/assets/featured/10.jpg" />
                <x-featured-card src="/assets/featured/11.jpg" />
                <x-featured-card src="/assets/featured/12.jpg" />
            </div>
        </div>
    </section>

    <!-- Container for demo purpose -->
    <div class="container md:px-10 px-3 mx-auto">
        <!-- Section: Design Block -->
        <h2 class="my-12 text-3xl font-bold text-center">Testimonials</h2>
        <section class="mb-24 text-center md:text-left">
            <x-large-testimonial-card name="Prayas Dhakal" role="Class 5 – Sagittarius" src="/assets/testimonials/principal.jpg">
                For me, a zero-waste project is an environmentally friendly project that would help our community be free from waste. I learned that this is one of the most effective methods of waste management. And I am happy that we are learning this at school because even at home we started segregating our waste into biodegradable and non-biodegradable.
            </x-large-testimonial-card>
        </section>
        <section class=" text-center">

            <div class="grid gap-x-6 grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 lg:gap-6">
                <x-small-testimonial-card id="testimonia1" name="Mayara Thapa" role="Class 3 Silver" src="/assets/testimonials/mayara.jpeg">
                    The zero-waste project is all about recycling, reusing, and reducing waste materials into something useful. I learned to separate the non-biodegradable and biodegradable waste. As a zero-waste leader, I check if my friends are not wasting their food and make sure that they leave with a clean plate. I never waste my food or dirty my surroundings. I also shared with my family members the importance of keeping our environment clean. At home, I help my mom make manure out of our kitchen waste.
                </x-small-testimonial-card>
                <x-small-testimonial-card id="testimonial2" name="Yushan Shrestha" role="Class 4 - Gemini" src="/assets/testimonials/yushan.jpeg">
                    The zero-waste project is one of the most important projects we are implementing at the school. It is an activity to protect our environment. I learned that we can create useful things out of waste, even kitchen waste. As a leader, I don’t allow anyone to waste their food. At home, I also encourage my siblings not to waste whatever they have on their plate. We also separate the biodegradable and non-biodegradable wastes at home. Out of the biodegradable waste, we produced manure and used it on our farm.
                </x-small-testimonial-card>

                <x-small-testimonial-card id="testimonial3" name="Prayas Dhakal" role="Class 5 - Sagittarius" src="/assets/testimonials/prayas.jpeg">
                    For me, a zero-waste project is an environmentally friendly project that would help our community be free from waste. I learned that this is one of the most effective methods of waste management. And I am happy that we are learning this at school because even at home we started segregating our waste into biodegradable and non-biodegradable.
                </x-small-testimonial-card>

                <x-small-testimonial-card id="testimonial4" name="John Doe" role="Web Developer" src="/assets/testimonials/principal.jpg">
                    Ut pretium ultricies dignissim. Sed sit amet mi eget urna placerat vulputate. Ut vulputate est non
                    quam dignissim elementum. Donec a ullamcorper
                </x-small-testimonial-card>
                <x-small-testimonial-card id="testimonial5" name="John Doe" role="Web Developer" src="/assets/testimonials/principal.jpg">
                    Ut pretium ultricies dignissim. Sed sit amet mi eget urna placerat vulputate. Ut vulputate est non
                    quam dignissim elementum. Donec a ullamcorper diam.
                </x-small-testimonial-card>

            </div>
        </section>
        <!-- Section: Design Block -->
    </div>
    <!-- Container for demo purpose -->


    <span id="about-us"></span>
    <div class="pt-14">

        <h2 class="about-us font-bold md:px-10 py-10 text-center text-3xl sm:text-2xl lg:text-4xl" id="about-us">
            About
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

            <x-developer-card name="Satish Chaudhary" role="Backend Developer" src="/assets/team/satish.jpg"
                href="https://github.com/Satishcg12" />
            <x-developer-card name="Rayyan Balami" role="Frontend Developer" src="/assets/team/rynb_hir000.jpeg"
                href="https://github.com/Rayyan-Balami" />
            <x-developer-card name="Kelvin Maharjan" role="Technical Writer" src="/assets/team/default.png"
                href="#" />
            <x-developer-card name="Nishan Mahat" role="Quality Assurance Analyst" src="/assets/team/nishan.jpeg"
                href="https://github.com/Nishanmahat8" />
            <x-developer-card name="Saiyam Shrestha" role="Presentation Coordinator" src="/assets/team/saiyam.jpg"
                href="#" />
            <x-developer-card name="Riyaz Bajracharya" role="Visual Content Specialist"
                src="/assets/team/default.png" href="#" />


        </div>
    </div>


    @include('layouts.footer')

</body>


</html>
