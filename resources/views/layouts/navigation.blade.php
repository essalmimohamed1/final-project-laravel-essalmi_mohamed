<nav x-data="{ open: false }" class="bg-black border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0">
                    <a href="{{ route('event.random') }}" class="text-4xl text-yellow-400 font-extrabold">
                        Event<span class="text-white">.Mode</span>
                    </a>
                </div>
            </div>

            <!-- Centered Navigation Links -->
            <div class="hidden sm:flex flex-1 justify-center space-x-6">
                <x-nav-link :href="route('event.random')" :active="request()->routeIs('event.random')" class="relative text-yellow-400 hover:text-white transition duration-300">
                    {{ __('Home') }}
                    <span class="absolute inset-x-0 -bottom-1 h-1 bg-yellow-400 transform scale-x-0 transition-transform duration-300 origin-left hover:scale-x-100"></span>
                </x-nav-link>
                <x-nav-link :href="route('contact.create')" :active="request()->routeIs('contact.create')" class="relative text-yellow-400 hover:text-white transition duration-300">
                    {{ __('Contact') }}
                    <span class="absolute inset-x-0 -bottom-1 h-1 bg-yellow-400 transform scale-x-0 transition-transform duration-300 origin-left hover:scale-x-100"></span>
                </x-nav-link>
                <x-nav-link :href="route('about.index')" :active="request()->routeIs('about.index')" class="relative text-yellow-400 hover:text-white transition duration-300">
                    {{ __('About') }}
                    <span class="absolute inset-x-0 -bottom-1 h-1 bg-yellow-400 transform scale-x-0 transition-transform duration-300 origin-left hover:scale-x-100"></span>
                </x-nav-link>

                <!-- Display the Events link only for the specific user -->
                @if (Auth::check() && Auth::user()->email === 'test@example.com') <!-- Change this email as per your seeder -->
                    <x-nav-link :href="route('events.index')" :active="request()->routeIs('event.index')" class="relative text-yellow-400 hover:text-white transition duration-300">
                        {{ __('Events') }}
                        <span class="absolute inset-x-0 -bottom-1 h-1 bg-yellow-400 transform scale-x-0 transition-transform duration-300 origin-left hover:scale-x-100"></span>
                    </x-nav-link>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center gap-6 sm:ms-6">
                <a href="{{ route('profile.edit') }}" class="text-yellow-400 hover:text-white transition duration-300">
                    {{ Auth::user()->name }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 rounded-md text-black bg-yellow-500 hover:bg-yellow-400 focus:outline-none transition duration-150">
                        <span>{{ __('Log Out') }}</span>
                    </button>
                </form>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-yellow-400 hover:bg-gray-800 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-4 pb-1 border-t border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-yellow-400">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-yellow-400 hover:text-white">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('event.random')" class="text-yellow-400 hover:text-white">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('about.index')" class="text-yellow-400 hover:text-white">
                    {{ __('About') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-yellow-400 hover:text-white">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
