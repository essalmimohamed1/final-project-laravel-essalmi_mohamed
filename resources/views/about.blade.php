<x-app-layout>
        <div class="lg:flex lg:flex-row flex flex-col gap-9 p-6 lg:p-11 bg-black">
            <img src="{{ asset('img/Mawazine.jpg') }}" class="h-[70vh] lg:w-[28vw] w-full lg:w-auto" alt="" />
            <div class="flex flex-col gap-4 lg:w-[calc(100% - 28vw)]">
                <div class="flex flex-col gap-4">
                    <h1 class="text-gray-600 text-2xl lg:text-3xl">Our story</h1>
                    <p class="text-gray-400 text-lg lg:text-xl">Phasellus egestas dui non, lobortis ultricies augue semper vitae. Vestibulum pharetra ante ac purus consectetur. Curabitur fringilla dolor lorem, nec molestie urna dapibus vel. Pellentesque porta neque bibendum est viverra. Vivamus lobortis magna interdum laoreet. Gravida elit quis, condimentum ex semper sit amet. Fusce magna eget ligula. Aliquam sodales imperdiet quam. Fringilla ut vehicula vehicula. Pellentesque congue ut gravida ac. Aliquam volutpat erat. Iaculis lectus donec facilisis, sodales eu sagittis. Etiam pellentesque, dictum rutrum magna, eleifend neque elit, tincidunt arcu sem. Rutrum turpis, commodo efficitur ut, convallis ipsum velit, maximus ligula ac ligula. Vivamus ultricies tristique vulputate. Ultrices vitae orci sed.</p>
                </div>
                <div class="border-l-2 border-gray-300 pl-4 pt-2">
                    <p class="text-gray-400 text-lg lg:text-xl">Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.</p>
                    <p class="text-yellow-400">- Steve Job’s</p>
                </div>
            </div>
        </div>

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