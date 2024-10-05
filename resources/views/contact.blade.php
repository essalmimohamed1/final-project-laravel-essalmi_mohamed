<!-- resources/views/contact.blade.php -->

<x-app-layout>
    <div class="bg-black p-8 flex flex-col lg:flex-row items-center justify-center">
        <!-- Contact Image -->
        <div class="w-full lg:w-[25vw] lg:mr-12 mb-8 lg:mb-0">
            <img src="{{ asset('img/contact-img.png') }}" alt="Contact Us Image" class="w-full rounded-lg shadow-lg">
        </div>
        
        <!-- Contact Form -->
        <div class="w-full lg:w-[35vw] bg-black p-8 rounded-lg shadow-lg border border-yellow-500"> <!-- Set form background to black -->
            <h3 class="text-3xl font-bold text-yellow-400 mb-6">Contact Us</h3>
    
            @if (session('success'))
                <div class="bg-yellow-500 text-black p-4 rounded-lg mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif
    
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-white font-semibold">Name</label>
                    <input type="text" name="name" id="name" required
                        class="w-full mt-1 p-2 bg-black border border-yellow-500 rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400">
                </div>
                
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-white font-semibold">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full mt-1 p-2 bg-black border border-yellow-500 rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400">
                </div>
                
                <!-- Message -->
                <div class="mb-4">
                    <label for="message" class="block text-white font-semibold">Message</label>
                    <textarea id="message" name="message" rows="4" required
                        class="w-full mt-1 p-2 bg-black border border-yellow-500 rounded-md shadow-sm focus:ring-yellow-400 focus:border-yellow-400"></textarea>
                </div>
                
                <!-- Submit Button -->
                <div class="text-right">
                    <button type="submit"
                        class="bg-yellow-500 text-black py-2 px-4 rounded-md hover:bg-yellow-400 transition-colors">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    

    <!-- Footer Section -->
    <div class="bg-black text-white py-12">
        <div class="container mx-auto grid grid-cols-1 lg:grid-cols-5 gap-12 lg:gap-6 px-6">
            <!-- Get In Touch -->
            <div>
                <h5 class="text-xl font-semibold mb-4">GET IN TOUCH</h5>
                <p class="text-gray-400 text-sm mb-4">Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879</p>
                <div class="flex space-x-4 text-2xl text-gray-500">
                    <!-- Social Icons -->
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor"><path d="M7 10v4h3v7h4v-7h3l1-4h-4v-2a1 1 0 0 1 1-1h3v-4h-3a5 5 0 0 0-5 5v2h-3"></path></svg></a>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor"><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z"></path></svg></a>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor"><rect x="4" y="4" width="16" height="16" rx="4"></rect><circle cx="12" cy="12" r="3"></circle></svg></a>
                </div>
            </div>

            <!-- Categories -->
            <div>
                <h5 class="text-xl font-semibold mb-4">CATEGORIES</h5>
                <ul class="text-gray-400 space-y-2">
                    <li>Social</li>
                    <li>Professional</li>
                    <li>Sports</li>
                    <li>Cultural</li>
                </ul>
            </div>

            <!-- Links -->
            <div>
                <h5 class="text-xl font-semibold mb-4">LINKS</h5>
                <ul class="text-gray-400 space-y-2">
                    <li>Facebook</li>
                    <li>Instagram</li>
                    <li>Gmail</li>
                </ul>
            </div>

            <!-- Help -->
            <div>
                <h5 class="text-xl font-semibold mb-4">HELP</h5>
                <ul class="text-gray-400 space-y-2">
                    <li>Telegram</li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h5 class="text-xl font-semibold mb-4">NEWSLETTER</h5>
                <div class="flex flex-col space-y-4">
                    <input type="email" placeholder="Email Address" class="bg-gray-200 p-2 rounded-md border-b-2 border-gray-300">
                    <button class="bg-zinc-900 text-white py-2 rounded-3xl hover:bg-emerald-600 transition-colors">
                        SUBSCRIBE
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center mt-8">
            <p class="text-gray-500">Copyright © 2022 Shopify Theme Developed by MassTechnologist All rights reserved.</p>
        </div>
    </div>
</x-app-layout>
