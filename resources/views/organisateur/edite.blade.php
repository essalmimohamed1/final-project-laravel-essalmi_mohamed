
                <form method="POST" action="{{ route('events.update', $event) }}">
                    @csrf
                    @method('PUT')
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input value="{{ old('name', $event->name) }}"  class="block mt-1 w-full" type="text" name="name" required
                            autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="descriptions" :value="__('Descriptions')" />
                        <x-text-input  value="{{ old('descriptions', $event->descriptions) }}" class="block mt-1 w-full" type="text" name="descriptions" required autofocus
                            autocomplete="descriptions" />
                    </div>

        
                    <div class="mt-4">
                        <x-input-label class="text-black" for="date" :value="__('Date Start')" />
                        <x-text-input name="dateStart" min="{{ date('Y-m-d') }}" value="{{ old('dateStart', $event->dateStart) }}" id="date-start" type="date" class="w-full" />
                    </div>

                    <div class="mt-4">
                        <x-input-label class="text-black" for="date" :value="__('Date End')" />
                        <x-text-input name="dateEnd" id="date-end" value="{{ old('dateEnd', $event->dateEnd) }}" type="date" class="w-full"/>
                    </div>

                    <div class="mt-4">
                        <x-input-label class="text-black" for="time" :value="__('Time Start')" />
                        <x-text-input  name="timeStart"
                        id="time-start" type="time" class="w-full" value="{{ old('timeStart', $event->timeStart) }}"/>
                    </div>
        
                    <div class="mt-4">
                        <x-input-label class="text-black" for="time" :value="__('Time End')" />
                        <x-text-input name="timeEnd" id="time-end" type="time" class="w-full" value="{{ old('timeEnd', $event->timeEnd) }}"/>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="locations" :value="__('Locations')" />
                        <x-text-input value="{{ old('locations', $event->locations) }}" class="block mt-1 w-full" type="text" name="locations" required
                            autocomplete="locations" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />

                        <x-text-input value="{{ old('price', $event->price) }}" class="block mt-1 w-full" type="number" name="price" required
                            autocomplete="price" />

                    </div>

                    <div class="flex items-center justify-end mt-4 ">

                        <button class="bg-white px-4 py-1 rounded-md">Create</button>
                    </div>
                </form>

