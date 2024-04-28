@extends('layouts.index')

@section('content')
<div class="flex flex-col md:flex-row w-full">
    <div class="w-full md:w-1/4 p-4">
        <form method="POST" action="{{ route('event.store') }}">
            @csrf
            <!-- Name -->
            <div class="mt-4">
                <x-input-label class="text-black" for="name" :value="__('Name')" />
                <x-text-input class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            </div>

            <!-- Descriptions -->
            <div class="mt-4">
                <x-input-label class="text-black" for="descriptions" :value="__('Descriptions')" />
                <x-text-input class="block mt-1 w-full" type="text" name="descriptions" required autofocus autocomplete="descriptions" />
            </div>

            <!-- Date Start -->
            <div class="mt-4">
                <x-input-label class="text-black" for="date" :value="__('Date Start')" />
                <x-text-input name="dateStart" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" id="date-start" type="date" class="w-full" />
            </div>

            <!-- Date End -->
            <div class="mt-4">
                <x-input-label class="text-black" for="date" :value="__('Date End')" />
                <x-text-input name="dateEnd" id="date-end" type="date" class="w-full"/>
            </div>

            <!-- Time Start -->
            <div class="mt-4">
                <x-input-label class="text-black" for="time" :value="__('Time Start')" />
                <x-text-input  name="timeStart" id="time-start" type="time" class="w-full"/>
            </div>

            <!-- Time End -->
            <div class="mt-4">
                <x-input-label class="text-black" for="time" :value="__('Time End')" />
                <x-text-input name="timeEnd" id="time-end" type="time" class="w-full"/>
            </div>

            <!-- Locations -->
            <div class="mt-4">
                <x-input-label class="text-black" for="locations" :value="__('Locations')" />
                <x-text-input class="block mt-1 w-full" type="text" name="locations" required autocomplete="locations" />
            </div>

            <!-- Price -->
            <div class="mt-4">
                <x-input-label class="text-black" for="price" :value="__('Price')" />
                <x-text-input class="block mt-1 w-full" type="number" name="price" required autocomplete="price" />
            </div>
            
            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <button class="bg-gray-900 text-white px-4 py-2 rounded-md hover:bg-gray-800">Create</button>
            </div>
        </form>
    </div>
    <div class="w-full md:w-3/4 p-4">
        <div id="calendar" class="w-full"></div>
    </div>
</div>
<div class="flex flex-col md:flex-row p-4">
    @foreach ($events as $event)
    <div class="w-full md:w-1/3 p-4">
        <div class="max-w-xs rounded overflow-hidden shadow-lg bg-gray-900 text-white">
            <img class="w-full" src="{{asset("img/Conference-Center.jpg")}}" alt="Event Image">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $event->name }}</div>
                <p class="text-gray-400 text-base">{{ $event->descriptions }}</p>
                <p class="text-gray-700 text-base">{{ $event->time }}</p>
            </div>
            <div class="px-6 pt-4">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#{{ $event->locations }}</span>
                <!-- You can add additional tags for product attributes or categories -->
            </div>
            <div class="px-6 pt-4 pb-2 text-3xl">
                <h1>Prix: <span class="text-red-400">{{ $event->price }} dh</span></h1>
            </div>
            <div class="px-6 pb-4 flex flex-col gap-10">
                <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-700 text-white px-4 py-2 rounded-md hover:bg-red-600" type="submit">Delete</button>
                </form>
                <div class="flex flex-col items-center">
                    <h1 class="text-3xl">Edit</h1>
                    @include('organisateur.edite')
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Include this JavaScript code in your Blade template or a separate JS file -->

<script>
    document.addEventListener('DOMContentLoaded', async function() {

        const response = await axios.get('/organisateur/show')
        const event = response.data.events;

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                right: window.innerWidth < 768 ? 'timeGridDay' :
                    'dayGridMonth,timeGridWeek,timeGridDay',
                center: 'title',
                left: window.innerWidth < 768 ? '' : 'listMonth, listWeek, listDay',
            },
            views: {
                listDay: {
                    buttonText: 'Day Event',
                },
                listWeek: {
                    buttonText: 'Week Event',
                },
                listMonth: {
                    buttonText: 'Month Event',
                },
                timeGridDay: {
                    buttonText: 'Day',
                },
                timeGridWeek: {
                    buttonText: 'Week',
                },
                dayGridMonth: {
                    buttonText: 'Month',
                },
            },
            initialView: window.innerWidth < 768 ? "timeGridDay" : "timeGridWeek",
            // For phone displays, initially set the view to timeGridDay, otherwise set it to timeGridWeek
            // Add more configurations as needed for responsiveness
            nowIndicator: true,
            selectable: true,
            selectMirror: true,
            selectOverlap: true,
            events: event,
            selectAllow: (info) => {
                let instant = new Date()
                return info.start >= instant
            },
            select: (info) => {
                let start = info.start
                let end = info.end

                if (end.getDate() - start.getDate() != 0 && !info.allDay) {
                    calendar.unselect()
                    return
                }

                formmatData(start)

                let dates = document.getElementById('date-start').value = formmatData(start).day

                if (info.allDay) {
                    document.getElementById("date-end").value = formmatData(start).day
                    document.getElementById('time-start').value = '08:00:00'
                    document.getElementById('time-end').value = '16:00:00'
                } else {
                    document.getElementById("date-end").value = formmatData(end).day
                    document.getElementById('time-start').value = formmatData(start).time
                    document.getElementById('time-end').value = formmatData(end).time
                }
            },
        });

        if (window.innerWidth < 768) {
            calendar.changeView("timeGridDay");
        } else {
            calendar.changeView("timeGridWeek");
        }
        calendar.render();

        function formmatData(date) {

            let year = String(date.getFullYear())
            let month = String(date.getMonth() + 1).padStart(2, 0)
            let day = String(date.getDate()).padStart(2, 0)

            let hour = String(date.getHours()).padStart(2, 0)
            let min = String(date.getMinutes()).padStart(2, 0)
            let sec = String(date.getSeconds()).padStart(2, 0)

            return {
                day: `${year}-${month}-${day}`,
                time: `${hour}:${min}:${sec}`
            }
        }
    });
</script>

@endsection
