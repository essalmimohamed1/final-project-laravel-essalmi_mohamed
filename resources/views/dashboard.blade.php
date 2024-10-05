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
    <div class="flex flex-col items-center justify-center py-16 bg-black text-white">
        <!-- Title Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold text-yellow-400">Upcoming Event</h1>
            <p class="text-lg text-gray-400 mt-4">Don't miss out on our exciting event!</p>
        </div>
        <div class="max-w-4xl w-full bg-black border-yellow-400 border-2 rounded-lg shadow-2xl overflow-hidden">
            <!-- Event Image -->
            <div class="relative">
                <img class="w-full h-72 object-cover object-center" src="{{ $event->image ? asset('storage/'.$event->image) : asset('img/default-event.jpg') }}" alt="{{ $event->name }}">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                    <h2 class="text-3xl font-bold text-yellow-400">{{ $event->name }}</h2>
                </div>
            </div>
    
            <!-- Event Content -->
            <div class="p-6 space-y-6">
                <p class="text-lg text-gray-400">{{ $event->descriptions }}</p>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-lg text-yellow-400">Time:</p>
                        <p class="text-xl font-bold text-white">{{ $event->timeStart }} - {{ $event->timeEnd }}</p>
                    </div>
                    <div>
                        <p class="text-lg text-yellow-400">Location:</p>
                        <p class="text-xl font-bold text-white">{{ $event->locations }}</p>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold text-yellow-400">Price: {{ $event->price }} DH</h3>
                    <form action="{{ route('event.pay', $event->id) }}" method="POST">
                        @csrf
                        <button class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded-lg transition duration-300">
                            Buy Event
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    
    
    <div class="text-6xl bg-black text-yellow-300 font-medium text-center pt-20">
        <h1>Event categories</h1>
    </div>
    <div class="bg-black py-16">
        <div class="lg:flex lg:flex-row flex flex-col gap-10 px-8 lg:px-20">
            <!-- Category Column 1 -->
            <div class="flex flex-col w-full lg:w-1/3 gap-10 rounded">
                <!-- Event Card 1 -->
                <div class="overflow-hidden relative group rounded-lg">
                    <img class="w-full h-[300px] object-cover group-hover:scale-110 transition-transform duration-500 rounded-lg" src='{{ asset("img/Parties.jpg") }}' alt='Social Events' />
                    <div class="absolute inset-0 flex items-end justify-center bg-gradient-to-t from-black/70 via-transparent to-transparent">
                        <button class="bg-white hover:bg-yellow-500 text-black hover:text-white py-3 px-10 mb-6 text-lg font-medium rounded shadow-lg transition-all duration-300">Social Events</button>
                    </div>
                </div>
                <!-- Event Card 2 -->
                <div class="overflow-hidden relative group rounded-lg">
                    <img class="w-full h-[300px] object-cover group-hover:scale-110 transition-transform duration-500 rounded-lg" src='{{ asset("img/MoviE.jpg") }}' alt='Entertainment Events' />
                    <div class="absolute inset-0 flex items-end justify-center bg-gradient-to-t from-black/70 via-transparent to-transparent">
                        <button class="bg-white hover:bg-yellow-500 text-black hover:text-white py-3 px-10 mb-6 text-lg font-medium rounded shadow-lg transition-all duration-300">Entertainment Events</button>
                    </div>
                </div>
            </div>
    
            <!-- Category Column 2 -->
            <div class="flex flex-col w-full lg:w-1/3 gap-10 rounded">
                <!-- Event Card 3 -->
                <div class="overflow-hidden relative group rounded-lg">
                    <img class="w-full h-[300px] object-cover group-hover:scale-110 transition-transform duration-500 rounded-lg" src='{{ asset("img/Conference-Center.jpg") }}' alt='Professional Events' />
                    <div class="absolute inset-0 flex items-end justify-center bg-gradient-to-t from-black/70 via-transparent to-transparent">
                        <button class="bg-white hover:bg-yellow-500 text-black hover:text-white py-3 px-10 mb-6 text-lg font-medium rounded shadow-lg transition-all duration-300">Professional Events</button>
                    </div>
                </div>
                <!-- Event Card 4 -->
                <div class="overflow-hidden relative group rounded-lg">
                    <img class="w-full h-[300px] object-cover group-hover:scale-110 transition-transform duration-500 rounded-lg" src='{{ asset("img/Mawazine.jpg") }}' alt='Cultural Events' />
                    <div class="absolute inset-0 flex items-end justify-center bg-gradient-to-t from-black/70 via-transparent to-transparent">
                        <button class="bg-white hover:bg-yellow-500 text-black hover:text-white py-3 px-10 mb-6 text-lg font-medium rounded shadow-lg transition-all duration-300">Cultural Events</button>
                    </div>
                </div>
            </div>
    
            <!-- Category Column 3 -->
            <div class="flex flex-col w-full lg:w-1/3 gap-10 rounded">
                <!-- Event Card 5 -->
                <div class="overflow-hidden relative group rounded-lg">
                    <img class="w-full h-[300px] object-cover group-hover:scale-110 transition-transform duration-500 rounded-lg" src='{{ asset("img/match.jpg") }}' alt='Sports Events' />
                    <div class="absolute inset-0 flex items-end justify-center bg-gradient-to-t from-black/70 via-transparent to-transparent">
                        <button class="bg-white hover:bg-yellow-500 text-black hover:text-white py-3 px-10 mb-6 text-lg font-medium rounded shadow-lg transition-all duration-300">Sports Events</button>
                    </div>
                </div>
                <!-- Event Card 6 -->
                <div class="overflow-hidden relative group rounded-lg">
                    <img class="w-full h-[300px] object-cover group-hover:scale-110 transition-transform duration-500 rounded-lg" src='{{ asset("img/FashionShows.jpg") }}' alt='Beauty Events' />
                    <div class="absolute inset-0 flex items-end justify-center bg-gradient-to-t from-black/70 via-transparent to-transparent">
                        <button class="bg-white hover:bg-yellow-500 text-black hover:text-white py-3 px-10 mb-6 text-lg font-medium rounded shadow-lg transition-all duration-300">Beauty Events</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-black p-6 md:p-10 lg:p-20">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-yellow-400 text-center mb-10">Upcoming Events</h1>
            <p class="text-lg text-gray-400 mt-4">Be Part of the Action</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 py-7">
            @foreach ($events as $event)
            <div class="flex items-center justify-center  bg-black text-white">
                <div class="max-w-4xl w-full bg-black border-[1.5px] border-yellow-400 rounded-lg shadow-2xl overflow-hidden">
                    <!-- Event Image -->
                    <div class="relative">
                        <img class="w-full h-72 object-cover object-center" src="{{ $event->image ? asset('storage/'.$event->image) : asset('img/default-event.jpg') }}" alt="{{ $event->name }}">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                            <h2 class="text-3xl font-bold text-yellow-400">{{ $event->name }}</h2>
                        </div>
                    </div>
                
                    <!-- Event Content -->
                    <div class="p-6 space-y-6">
                        <p class="text-lg text-gray-400">{{ $event->descriptions }}</p>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-lg text-yellow-400">Time:</p>
                                <p class="text-xl font-bold text-white">{{ $event->timeStart }} - {{ $event->timeEnd }}</p>
                            </div>
                            <div>
                                <p class="text-lg text-yellow-400">Location:</p>
                                <p class="text-xl font-bold text-white">{{ $event->locations }}</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h3 class="text-2xl font-bold text-yellow-400">Price: <span class="text-white">{{ $event->price }} DH</span></h3>
                            <form action="{{ route('event.pay', $event->id) }}" method="POST">
                                @csrf
                                <button class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded-lg transition duration-300">
                                    Buy Event
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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
