<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-black text-white p-6 rounded-lg shadow-lg w-11/12 md:w-1/3">
        <h2 class="text-2xl text-yellow-500 font-bold mb-4">Edit Event</h2>
        <form id="editEventForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="event_id" id="event_id">
            
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input class="block mt-1 w-full bg-gray-800 border border-gray-600 text-white" type="text" name="name" id="event_name" required autofocus />
            </div>

            <!-- Descriptions -->
            <div class="mt-4">
                <x-input-label for="descriptions" :value="__('Descriptions')" />
                <x-text-input class="block mt-1 w-full bg-gray-800 border border-gray-600 text-white" type="text" name="descriptions" id="event_descriptions" required />
            </div>

            <!-- Date Start -->
            <div class="mt-4">
                <x-input-label for="date" :value="__('Date Start')" />
                <x-text-input name="dateStart" id="event_dateStart" type="date" class="w-full bg-gray-800 border border-gray-600 text-white" required />
            </div>

            <!-- Date End -->
            <div class="mt-4">
                <x-input-label for="date" :value="__('Date End')" />
                <x-text-input name="dateEnd" id="event_dateEnd" type="date" class="w-full bg-gray-800 border border-gray-600 text-white" required />
            </div>

            <!-- Time Start -->
            <div class="mt-4">
                <x-input-label for="time" :value="__('Time Start')" />
                <x-text-input name="timeStart" id="event_timeStart" type="time" class="w-full bg-gray-800 border border-gray-600 text-white" required />
            </div>

            <!-- Time End -->
            <div class="mt-4">
                <x-input-label for="time" :value="__('Time End')" />
                <x-text-input name="timeEnd" id="event_timeEnd" type="time" class="w-full bg-gray-800 border border-gray-600 text-white" required />
            </div>

            <!-- Locations -->
            <div class="mt-4">
                <x-input-label for="locations" :value="__('Locations')" />
                <x-text-input class="block mt-1 w-full bg-gray-800 border border-gray-600 text-white" type="text" name="locations" id="event_locations" required />
            </div>

            <!-- Price -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input class="block mt-1 w-full bg-gray-800 border border-gray-600 text-white" type="number" name="price" id="event_price" required />
            </div>

            <div class="flex justify-end mt-4">
                <button type="button" class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition duration-300" onclick="closeEditModal()">Cancel</button>
                <button type="submit" class="bg-yellow-500 text-black px-4 py-2 rounded-md hover:bg-yellow-400 transition duration-300 ml-2">Save Changes</button>
            </div>
        </form>
    </div>
</div>
