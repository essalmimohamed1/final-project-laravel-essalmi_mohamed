<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-yellow-400 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black"> <!-- Set the background color to black -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Update Profile Information Section -->
            <div class="p-6 sm:p-8 bg-gray-800 border border-yellow-500 shadow rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="p-6 sm:p-8 bg-gray-800 border border-yellow-500 shadow rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Section -->
            <div class="p-6 sm:p-8 bg-gray-800 border border-yellow-500 shadow rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
