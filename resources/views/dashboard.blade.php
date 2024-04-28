<x-app-layout>
    <div class="flex items-center justify-center p-5 lg:p-10 bg-black">
        <div class="flex flex-col lg:flex-row p-5 lg:p-7 bg-black max-w-6xl">
            <div class="flex flex-col lg:w-[40%] lg:mr-6 xl:mr-12 gap-6 items-center lg:text-left text-white">
                <h1 class="text-4xl lg:text-6xl xl:text-7xl w-full text-center lg:text-left text-amber-300 font-semibold">Manage events with us</h1>
                <p class="text-lg lg:text-2xl xl:text-3xl w-full text-center lg:text-left font-semibold">Discover the possibilities of events</p>
                <button class="bg-amber-300 w-full h-[5vh] lg:h-[7vh] xl:h-[8vh] text-lg lg:text-2xl xl:text-3xl font-bold rounded-[8px]">Explore</button>
            </div>
            <div class="w-full lg:w-[60%] mt-6 lg:mt-0">
                <img class="w-full" src="{{ asset('img/event-party-3005668_640.jpg') }}" alt="Event Image">
            </div>
        </div>
    </div>
    
    <div class="text-6xl bg-black text-yellow-300 font-medium text-center pt-20">
        <h1>Event categories</h1>
    </div>
    <div class=" bg-black">
        <div class='lg:flex lg:flex-row flex flex-col gap-8 p-20'>
            <div class='flex flex-col w-full lg:w-[100%] gap-8 rounded'>
                <div class='overflow-hidden relative'>
                    <img class='hover:scale-110 duration-500' src='{{ asset("img/Parties.jpg") }}' alt='' />
                    <div class='flex justify-center'>
                        <button class='absolute bottom-9 bg-slate-100 hover:bg-orange-600 px-14 py-3 opacity-95 text-xl font-light shadow-lg text-black duration-500'>Social Events</button>
                    </div>
                </div>
                <div class='overflow-hidden relative rounded'>
                    <img class='hover:scale-110 duration-500' src='{{ asset("img/MoviE.jpg") }}' alt='' />
                    <div class='flex justify-center'>
                        <button class='absolute bottom-10 bg-slate-100 hover:bg-orange-600 px-14 py-3 opacity-95 text-xl font-light shadow-lg text-black duration-500'>Entertainment Events</button>
                    </div>
                </div>
            </div>
            <div class='flex flex-col w-full lg:w-[100%] gap-8 rounded'>
                <div class='overflow-hidden relative'>
                    <img class='hover:scale-110 duration-500' src='{{ asset("img/Conference-Center.jpg") }}' alt='' />
                    <div class='flex justify-center'>
                        <button class='absolute bottom-10 bg-slate-100 px-14 py-3 opacity-95 text-xl font-light shadow-lg text-black hover:bg-orange-500 duration-500'>Professional Event</button>
                    </div>
                </div>
                <div class='overflow-hidden relative rounded'>
                    <img class='hover:scale-110 duration-500' src='{{ asset("img/Mawazine.jpg") }}' alt='' />
                    <div class='flex justify-center'>
                        <button class='absolute bottom-9 bg-slate-50 px-14 py-3 opacity-95 text-xl font-light shadow-lg text-black hover:bg-orange-500 duration-500'>Cultural Events:</button>
                    </div>
                </div>
            </div>
    
            <div class='flex flex-col w-full lg:w-[100%] gap-8 rounded'>
                <div class='overflow-hidden relative'>
                    <img class='hover:scale-110 duration-500' src='{{ asset("img/match.jpg") }}' alt='' />
                    <div class='flex justify-center'>
                        <button class='absolute bottom-9 bg-slate-100 px-20 py-4 opacity-95 text-xl font-light shadow-lg text-black hover:bg-orange-500 duration-500'>Sports Events</button>
                    </div>
                </div>
                <div class='overflow-hidden relative rounded'>
                    <img class='hover:scale-110 duration-500' src='{{ asset("img/FashionShows.jpg") }}' alt='' />
                    <div class='flex justify-center'>
                        <button class='absolute bottom-10 bg-slate-100 px-14 py-3 opacity-95 text-xl font-light shadow-lg text-black hover:bg-orange-500 duration-500'>Beauty Events</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-4xl font-medium text-center py-8 md:py-10 bg-black text-yellow-300">
        <h1>Our Events</h1>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6 md:p-10 lg:p-20 bg-black">
        @foreach ($events as $event)
        <div class="max-w-xs mx-auto rounded-lg overflow-hidden shadow-lg bg-gray-900 text-white">
            <img class="w-full h-48 object-cover object-center" src="{{ asset("img/audience-1853662_640.jpg") }}" alt="Event Image">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $event->name }}</div>
                <p class="text-gray-400 text-base">{{ $event->descriptions }}</p>
                <p class="text-gray-700 text-base">{{ $event->time }}</p>
            </div>
            <div class="px-6 py-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#{{ $event->locations }}</span>
                <!-- Additional tags for event attributes or categories -->
            </div>
            <div class="px-6 pb-4">
                <h1 class="text-xl font-bold text-red-400">Price: {{ $event->price }} DH</h1>
            </div>
            <div class="px-6 pb-4">
                <button class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded">
                    Add to Cart
                </button>
            </div>
        </div>
        @endforeach
    </div>
    
    {{-- footer --}}
    <div class="bg-black text-white flex flex-col gap-5 p-3  border-t-2 border-y-amber-300">
        <div class="flex lg:flex flex-col lg:flex-row justify-around p-20 gap-9 lg:gap-9">
            <div class="lg:flex lg:flex-col lg:gap-2 flex-col gap-2">
                <h5>GET IN TOUCH</h5>
                <p class="w-[30vw]">Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879</p>
                <div class="flex gap-4 text-3xl text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <rect x="4" y="4" width="16" height="16" rx="4"></rect>
                        <circle cx="12" cy="12" r="3"></circle>
                        <line x1="16.5" y1="7.5" x2="16.5" y2="7.501"></line>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex flex-col gap-5">
                <h5>CATEGORIES</h5>
                <div class="flex flex-col gap-2">
                    <h1>Social</h1>
                    <h1>Professional</h1>
                    <h1>Sports</h1>
                    <h1>Cultural</h1>
                </div>
            </div>
            <div class="flex flex-col gap-5">
                <h5>LINKS</h5>
                <div class="flex flex-col gap-2">
                    <h1>Facebook</h1>
                    <h1>Instgram</h1>
                    <h1>Gmail</h1>
                </div>
            </div>
            <div class="flex flex-col gap-5">
                <h5>HELP</h5>
                <div class="flex flex-col gap-2">
                    <h1>Telegram</h1>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <h5>NEWSLETTER</h5>
                <div class="flex flex-col gap-4">
                    <input type="email" placeholder="Email Address" class="border-b-2 bg-gray-200 border-gray-300 p-2 w-[50vw] lg:w-[22vw]" />
                    <button class="bg-zinc-900 text-white lg:h-[7vh] h-[8vh] w-[50vw] font-light text-2xl lg:w-[17vw] rounded-3xl hover:bg-orange-600 hover:transition-all">SUBSCRIBE</button>
                </div>
            </div>
        </div>
        <div class="p-3">
            <p class="text-gray-500 text-center">Copyright © 2022 Shopify Theme Developed by MassTechnologist All rights reserved.</p>
        </div>
    </div>
    
</x-app-layout>
