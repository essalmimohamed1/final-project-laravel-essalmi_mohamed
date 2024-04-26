<!-- resources/views/contact.blade.php -->

<x-app-layout>
    <div class="bg-black p-28 flex flex-col sm:flex-row items-center justify-center">
        <div class="w-[30vw]">
            <img src="{{ asset('img/contact-img.png') }}" alt="Contact Us Image">
        </div>
        <div class="max-w-xl mx-auto w-[40vw] sm:px-6 lg:px-8">
            <div class="bg-emerald-400 shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class=" text-3xl font-semibold leading-6 text-white">Contact Us</h3>
                </div>
                <div class="border-t border-gray-200">
                    @if (session('success'))
                        <div class="alert alert-success bg-green-400 text-green-900 p-8" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="bg-emerald-400 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="name" class="block text-2xl font-medium text-white sm:col-span-1">Name</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="name" id="name" autocomplete="name" required
                                    class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="bg-emerald-400 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="email" class="block text-2xl font-medium text-white sm:col-span-1">Email</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="email" name="email" id="email" autocomplete="email" required
                                    class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="bg-emerald-400 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <label for="message" class="block text-2xl font-medium text-white  sm:col-span-1">Message</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <textarea id="message" name="message" rows="4" required
                                    class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-emerald-400 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-black hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-black text-white flex flex-col gap-5 p-3">
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
