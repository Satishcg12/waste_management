<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content="Zero Waste Project - Samriddhi School" />
    <meta property="og:description"
        content="Samriddhi School offers dedicated K-12 education, catering to each student's unique needs. We celebrate diversity, fostering a passion for learning and creativity." />
    <meta property="og:image" content="/assets/websiteThumbnail.png" />
    <meta property="og:url" content="{{ config('app.url') }}" />
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
            <div class="grid gap-4 ">
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
            <x-large-testimonial-card name="Naresh Prasad Shrestha" role="CEO/Principal"
                src="/assets/testimonials/principal.jpg">
                As the principal of Samriddhi School, I am proud to say that our Zero Waste Project is an
                environmentally friendly initiative that helps our community become free from waste. Our students have
                learned that this is one of the most effective methods of waste management, and they have even started
                segregating their waste into biodegradable and non-biodegradable at home. This project is a great
                example of how small steps can make a big difference in protecting our environment. Together, we can
                transform the world one step at a time. From waste to wonder!
            </x-large-testimonial-card>
        </section>
        <section class=" text-center">

            <div class="grid gap-x-6 grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 lg:gap-6">
                <x-small-testimonial-card id="testimonia1" name="Mayara Thapa" role="Class 3 Silver"
                    src="/assets/testimonials/mayara.jpeg">
                    The zero-waste project is all about recycling, reusing, and reducing waste materials into something
                    useful. I learned to separate the non-biodegradable and biodegradable waste. As a zero-waste leader,
                    I check if my friends are not wasting their food and make sure that they leave with a clean plate. I
                    never waste my food or dirty my surroundings. I also shared with my family members the importance of
                    keeping our environment clean. At home, I help my mom make manure out of our kitchen waste.
                </x-small-testimonial-card>
                <x-small-testimonial-card id="testimonial2" name="Yushan Shrestha" role="Class 4 - Gemini"
                    src="/assets/testimonials/yushan.jpeg">
                    The zero-waste project is one of the most important projects we are implementing at the school. It
                    is an activity to protect our environment. I learned that we can create useful things out of waste,
                    even kitchen waste. As a leader, I don’t allow anyone to waste their food. At home, I also encourage
                    my siblings not to waste whatever they have on their plate. We also separate the biodegradable and
                    non-biodegradable wastes at home. Out of the biodegradable waste, we produced manure and used it on
                    our farm.
                </x-small-testimonial-card>

                <x-small-testimonial-card id="testimonial3" name="Prayas Dhakal" role="Class 5 - Sagittarius"
                    src="/assets/testimonials/prayas.jpeg">
                    For me, a zero-waste project is an environmentally friendly project that would help our community be
                    free from waste. I learned that this is one of the most effective methods of waste management. And I
                    am happy that we are learning this at school because even at home we started segregating our waste
                    into biodegradable and non-biodegradable.
                </x-small-testimonial-card>

                <x-small-testimonial-card id="testimonial4" name="Aman Sitaula" role="Class 8"
                    src="/assets/testimonials/aman.jpeg">
                    &quot;Greetings! I&#39;m Aman Sitaula, an 8th-grade student at Manaslu, and I
                    proudly serve as a Zero Waste Leader. Today, I&#39;m excited to provide you
                    with insights into the remarkable Zero Waste Project.
                    The Zero Waste Project is a pioneering initiative undertaken by
                    Samriddhi School, renowned for its excellence in daily waste
                    management. This project draws its inspiration from the noble cause of
                    environmental conservation. We take the leftover food from our
                    school&#39;s canteen, and under the guidance of our dedicated Zero Waste
                    Leaders, we ensure that this waste is thoughtfully disposed of in
                    designated pits.
                    We are passionate about spreading the concept of zero waste at home,
                    highlighting the significance of organic waste, which is a boon for the
                    health of plants and flowers, among other things. Thanks to these
                    initiatives, our school has made impressive strides in effectively
                    handling the everyday kitchen waste. The compost generated from this
                    project finds a valuable purpose in nurturing plants and vegetables,
                    fostering the protection of our environment and, in turn, contributing
                    to the preservation of our precious Earth.
                    Join us on this journey to a greener, more sustainable future. Together,
                    we can make a lasting impact!&quot;
                </x-small-testimonial-card>
                <x-small-testimonial-card id="testimonial5" name="Satkar Sapkota" role="Class 10"
                    src="/assets/testimonials/satkar.jpeg">
                    &quot;Hello, I&#39;m Satkar Sapkota, a current 10th-grade student at Samriddhi
                    School, and I&#39;m excited to share my experiences with the Zero Waste
                    Project. First, let me introduce what the Zero Waste Project entails.
                    Zero waste involves efficiently managing the waste produced in our
                    daily lives, including kitchen scraps like vegetable peels, unwanted parts
                    of vegetables or fruits, and dried leaves from trees. Kitchen waste and
                    dried leaves are categorized as &#39;greens&#39; and &#39;browns,&#39; which are rich in
                    nitrogen, essential for promoting healthy plant growth.
                    However, the Zero Waste Project is not just about managing waste that
                    can be converted into valuable compost. It also requires proper
                    guidance and support from dedicated leaders in the zero-waste
                    movement. Our school&#39;s principal, Mr. Naresh Prasad Shrestha,
                    introduced this initiative to all students. We were encouraged to
                    segregate waste into degradable and non-degradable categories in our
                    homes, and whenever possible, to compost the waste ourselves.
                    The Zero Waste Project isn&#39;t solely focused on creating compost and
                    distributing it to consumers; it&#39;s also designed to protect the
                    environment. By reducing waste at its source, we contribute to a
                    significant decrease in pollution.
                    Through this project, students have discovered the hidden value in
                    everyday waste and its crucial role in environmental conservation.
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
            <x-developer-card name="Kelvin Maharjan" role="Technical Writer" src="/assets/team/kelvin.jpg"
                href="https://www.facebook.com/profile.php?id=100004868089200&mibextid=LQQJ4d" />
            <x-developer-card name="Nishan Mahat" role="Quality Assurance Analyst" src="/assets/team/nishan.jpeg"
                href="https://github.com/Nishanmahat8" />
            <x-developer-card name="Saiyam Shrestha" role="Presentation Coordinator" src="/assets/team/saiyam.jpg"
                href="#" />
            <x-developer-card name="Riyaz Bajracharya" role="Visual Content Specialist"
                src="/assets/team/riyaz.jpg" href="https://www.instagram.com/bajrariyaaz/" />


        </div>
    </div>


    @include('layouts.footer')

</body>


</html>
