@extends('layouts.index')

@section('content')
@if (session('error'))
<div class="bg-red-500 text-white p-3 rounded">
{{ session('error') }}
</div>
@endif
<script src="https://cdn.tailwindcss.com"></script>

<!-- Include CSRF Token for Laravel -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    /* Custom styles for the calendar */
    #calendar {
        background-color: #1a202c; /* Dark background */
        border-radius: 10px;
        padding: 10px; /* Reduced padding for smaller screens */
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
    }

    /* FullCalendar header customization */
    .fc-toolbar {
        color: #fbbf24; /* Tailwind Yellow */
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }

    .fc-button {
        background-color: #2d3748; /* Darker gray background */
        color: #fbbf24; /* Yellow text */
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        font-weight: 500;
        transition: background-color 0.2s ease;
    }

    .fc-button:hover {
        background-color: #fbbf24; /* Hover yellow */
        color: #1a202c; /* Text becomes dark */
    }

    /* Responsive adjustments for mobile */
    @media (max-width: 640px) {
        .fc-toolbar {
            flex-direction: column; /* Stack buttons and title vertically on mobile */
        }
        
        .fc-toolbar h2 {
            font-size: 1.25rem; /* Smaller title font for mobile */
        }

        .fc-day-header {
            font-size: 0.75rem; /* Reduce day header font size for mobile */
        }

        .fc-event {
            font-size: 0.75rem; /* Smaller font for event titles */
            padding: 3px; /* Smaller padding for events */
        }

        /* Add some padding around the calendar on mobile */
        #calendar {
            padding: 10px;
        }
    }
</style>
    <!-- Navigation Button -->
    <div class="w-full lg:w-1/3 rounded-lg shadow-lg mx-auto">
        <a href="{{ route('event.random') }}" class="block w-full text-center bg-yellow-500 text-black p-4 rounded-lg font-semibold hover:bg-yellow-400 transition duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 mb-6 flex items-center justify-center space-x-3 shadow-md hover:shadow-lg">
            <i class="fas fa-tachometer-alt text-lg"></i> <!-- Font Awesome icon -->
            <span class="text-lg">Go to Dashboard</span>
        </a>
    </div>

    <div class="flex flex-col lg:flex-row w-full bg-black">

        <!-- Form Section -->
        <div class="w-full lg:w-1/3 p-6 bg-gray-900 rounded-lg shadow-lg mx-auto">
            <form id="eventForm" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <!-- Title -->
                <h1 class="text-yellow-400 text-3xl font-bold text-center mb-4">Create Event</h1>
    
                <!-- Event Name -->
                <div class="space-y-2">
                    <label for="name" class="block text-yellow-300 font-semibold">Event Name</label>
                    <input type="text" id="name" name="name" required placeholder="Enter event name"
                           class="w-full border border-yellow-400 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-500 transition">
                </div>
    
                <!-- Descriptions -->
                <div class="space-y-2">
                    <label for="descriptions" class="block text-yellow-300 font-semibold">Description</label>
                    <textarea id="descriptions" name="descriptions" rows="4" required placeholder="Enter event description"
                              class="w-full border border-yellow-400 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-500 transition"></textarea>
                </div>
    
                <!-- Image Upload -->
                <div class="space-y-2">
                    <label for="image" class="block text-yellow-300 font-semibold">Event Image</label>
                    <input type="file" id="image" name="image" accept="image/*" required
                           class="w-full border border-yellow-400 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-500 transition">
                </div>
    
                <!-- Date Start and Date End -->
                <div class="flex flex-col lg:flex-row gap-4">
                    <div class="w-full">
                        <label for="dateStart" class="block text-yellow-300 font-semibold">Date Start</label>
                        <input type="date" id="dateStart" name="dateStart" required
                               value="{{ now()->toDateString() }}" 
                               min="{{ now()->toDateString() }}"  
                               class="w-full border border-yellow-400 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-500 transition">
                    </div>
    
                    <div class="w-full">
                        <label for="dateEnd" class="block text-yellow-300 font-semibold">Date End</label>
                        <input type="date" id="dateEnd" name="dateEnd" required
                               value="{{ now()->toDateString() }}" 
                               min="{{ now()->toDateString() }}"  
                               class="w-full border border-yellow-400 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-500 transition">
                    </div>
                </div>
    
                <!-- Time Start and Time End -->
                <div class="flex flex-col lg:flex-row gap-4">
                    <div class="w-full">
                        <label for="timeStart" class="block text-yellow-300 font-semibold">Time Start</label>
                        <input type="time" id="timeStart" name="timeStart" required
                               class="w-full border border-yellow-400 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-500 transition">
                    </div>
    
                    <div class="w-full">
                        <label for="timeEnd" class="block text-yellow-300 font-semibold">Time End</label>
                        <input type="time" id="timeEnd" name="timeEnd" required
                               class="w-full border border-yellow-400 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-500 transition">
                    </div>
                </div>
    
                <!-- Location -->
                <div class="space-y-2">
                    <label for="locations" class="block text-yellow-300 font-semibold">Location</label>
                    <input type="text" id="locations" name="locations" required placeholder="Enter event location"
                           class="w-full border border-yellow-400 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-500 transition">
                </div>
    
                <!-- Price -->
                <div class="space-y-2">
                    <label for="price" class="block text-yellow-300 font-semibold">Price (DH)</label>
                    <input type="number" id="price" name="price" required placeholder="Enter price"
                           class="w-full border border-yellow-400 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-500 transition">
                </div>
    
                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit"
                            class="w-full bg-yellow-500 text-black p-3 rounded font-semibold hover:bg-yellow-400 transition duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        Create Event
                    </button>
                </div>
            </form>
        </div>
    
        <!-- Calendar Section -->
        <div id="calendarSection" class="w-full lg:w-2/3 p-6">
            <div id="calendar" class="bg-gray-800 rounded-lg shadow-lg"></div>
        </div>
    
        <!-- FullCalendar and jQuery JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    
        <script>
            $(document).ready(function() {
                // Initialize FullCalendar
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    editable: true,
                    events: function(start, end, timezone, callback) {
                        $.ajax({
                            url: "{{ route('event.fetch') }}", // Fetching events
                            type: 'GET',
                            success: function(data) {
                                callback(data); // Populate FullCalendar with events
                            },
                            error: function(xhr) {
                                // Log the error but don't show the alert
                                console.log('Error fetching events:', xhr.responseText);
                            }
                        });
                    }
                });
        
                // Handle form submission with AJAX
                $('#eventForm').on('submit', function(event) {
                    event.preventDefault(); // Prevent default form submission
        
                    var formData = new FormData(this); // Collect form data
        
                    $.ajax({
                        url: "{{ route('events.store') }}", // Storing events
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            // Auto-refresh the page after the event is successfully created
                            location.reload(); // Refresh the page
                        },
                        error: function(xhr) {
                            // Log the error but force a refresh regardless
                            console.log('Error response:', xhr.responseText);
                            location.reload(); // Force a page refresh even if there is an error
                        }
                    });
                });
            });
        </script>
        
    </div>
    
    
    
    
    
    
    
    
    
    
    



    <div class="flex flex-wrap justify-center p-4 gap-6">
        @foreach ($events as $event)
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-4">
            <div class="max-w-xs bg-gray-900 text-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-transform duration-300">
                <!-- Event Image -->
                <img class="w-full h-48 object-cover" src="{{ $event->image ? asset('storage/'.$event->image) : asset('img/Conference-Center.jpg') }}" alt="Event Image">            

                <!-- Event Details -->
                <div class="p-6">
                    <h3 class="font-bold text-2xl text-yellow-400 mb-2 truncate">{{ $event->name }}</h3>
                    <p class="text-gray-400 mb-4 line-clamp-3">{{ $event->descriptions }}</p>
                    
                    <!-- Time and Location -->
                    <div class="text-gray-300 mb-2">
                        <span class="block"><strong>Time:</strong> {{ $event->time }}</span>
                        <span class="block"><strong>Location:</strong> #{{ $event->locations }}</span>
                    </div>
                    
                    <!-- Price -->
                    <div class="font-bold text-xl text-red-400 mb-4">Prix: {{ $event->price }} dh</div>
                    
                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center">
                        @if ($event->user_id === auth()->id())
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500 transition duration-300">
                                Delete
                            </button>
                    </form>
                            <button class="bg-yellow-400 text-gray-900 px-4 py-2 rounded-md hover:bg-yellow-300 transition duration-300" onclick="openEditModal('{{ $event->id }}')">
                                Edit
                            </button>                    
                    @endif
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div id="editModal-{{ $event->id }}" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
                <div class="relative max-w-3xl w-full mx-auto bg-gray-900 p-8 rounded-lg shadow-2xl transform transition-transform">
                    
                    <!-- Close Button -->
                    <button onclick="closeEditModal('{{ $event->id }}')" class="absolute top-3 right-3 text-yellow-400 hover:text-yellow-500 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    
                    <!-- Modal Title -->
                    <h2 class="text-3xl font-extrabold text-yellow-400 text-center mb-6">Update Event</h2>
                    
                    <!-- Update Form -->
                    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')
            
                        <!-- Event Name and Descriptions (same row) -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label for="name" class="block text-yellow-300 font-semibold">Event Name</label>
                                <input type="text" name="name" value="{{ $event->name }}" required
                                    class="w-full border border-yellow-300 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-400 transition-shadow shadow-md">
                            </div>
                            <div class="space-y-1">
                                <label for="descriptions" class="block text-yellow-300 font-semibold">Descriptions</label>
                                <textarea name="descriptions" required
                                    class="w-full border border-yellow-300 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-400 transition-shadow shadow-md">{{ $event->descriptions }}</textarea>
                            </div>
                        </div>
            
                        <!-- Dates and Times (same row) -->
                        <div class="grid grid-cols-4 gap-4">
                            <div class="space-y-1 col-span-2">
                                <label for="dateStart" class="block text-yellow-300 font-semibold">Start Date</label>
                                <input type="date" id="dateStart-{{ $event->id }}" name="dateStart" value="{{ $event->dateStart }}" required
                                    class="w-full border border-yellow-300 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-400 transition-shadow shadow-md">
                            </div>
                            <div class="space-y-1 col-span-2">
                                <label for="timeStart" class="block text-yellow-300 font-semibold">Start Time</label>
                                <input type="time" id="timeStart-{{ $event->id }}" name="timeStart" value="{{ $event->timeStart }}" required
                                    class="w-full border border-yellow-300 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-400 transition-shadow shadow-md">
                            </div>
                        </div>
            
                        <!-- End Dates and Times (same row) -->
                        <div class="grid grid-cols-4 gap-4">
                            <div class="space-y-1 col-span-2">
                                <label for="dateEnd" class="block text-yellow-300 font-semibold">End Date</label>
                                <input type="date" id="dateEnd-{{ $event->id }}" name="dateEnd" value="{{ $event->dateEnd }}" required
                                    class="w-full border border-yellow-300 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-400 transition-shadow shadow-md">
                            </div>
                            <div class="space-y-1 col-span-2">
                                <label for="timeEnd" class="block text-yellow-300 font-semibold">End Time</label>
                                <input type="time" id="timeEnd-{{ $event->id }}" name="timeEnd" value="{{ $event->timeEnd }}" required
                                    class="w-full border border-yellow-300 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-400 transition-shadow shadow-md">
                            </div>
                        </div>
            
                        <!-- Locations, Price, and Image (same row) -->
                        <div class="grid grid-cols-3 gap-4">
                            <div class="space-y-1">
                                <label for="locations" class="block text-yellow-300 font-semibold">Locations</label>
                                <input type="text" name="locations" value="{{ $event->locations }}" required
                                    class="w-full border border-yellow-300 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-400 transition-shadow shadow-md">
                            </div>
                            <div class="space-y-1">
                                <label for="price" class="block text-yellow-300 font-semibold">Price</label>
                                <input type="number" name="price" value="{{ $event->price }}" required
                                    class="w-full border border-yellow-300 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-400 transition-shadow shadow-md">
                            </div>
                            <div class="space-y-1">
                                <label for="image" class="block text-yellow-300 font-semibold">Event Image</label>
                                <input type="file" name="image" accept="image/*" class="w-full border border-yellow-300 p-3 rounded bg-gray-800 text-white focus:outline-none focus:ring focus:ring-yellow-400 transition-shadow shadow-md">
                            </div>
                        </div>
            
                        <!-- Update Button -->
                        <button type="submit" class="w-full bg-yellow-500 text-gray-900 font-bold py-3 rounded-lg hover:bg-yellow-600 transition duration-200 transform hover:scale-105">
                            Update Event
                        </button>
                    </form>
                </div>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const now = new Date();
                    const currentDate = now.toISOString().split('T')[0]; // Format: YYYY-MM-DD
                    const currentTime = now.toTimeString().slice(0, 5);  // Format: HH:MM
            
                    // Set minimum date and time for start and end fields in the edit modal
                    const startDateField = document.getElementById('dateStart-{{ $event->id }}');
                    const startTimeField = document.getElementById('timeStart-{{ $event->id }}');
                    const endDateField = document.getElementById('dateEnd-{{ $event->id }}');
                    const endTimeField = document.getElementById('timeEnd-{{ $event->id }}');
            
                    // Prevent the selection of dates before today
                    startDateField.setAttribute('min', currentDate);
                    endDateField.setAttribute('min', currentDate);
            
                    // If the current date is selected, prevent selecting past times
                    function setMinTime() {
                        if (startDateField.value === currentDate) {
                            startTimeField.setAttribute('min', currentTime);
                        } else {
                            startTimeField.removeAttribute('min');
                        }
                    }
            
                    startDateField.addEventListener('change', setMinTime);
                    setMinTime();  // Ensure logic is applied on page load
            
                    // End date logic: Prevent selection of a date before the start date
                    startDateField.addEventListener('change', function () {
                        endDateField.setAttribute('min', startDateField.value);
                        if (endDateField.value < startDateField.value) {
                            endDateField.value = startDateField.value;
                        }
                    });
            
                    // Prevent selecting an end time before the start time on the same date
                    endDateField.addEventListener('change', function () {
                        if (endDateField.value === startDateField.value) {
                            endTimeField.setAttribute('min', startTimeField.value);
                        } else {
                            endTimeField.removeAttribute('min');
                        }
                    });
                });
            </script>
            
            
            
            
            
            
            
        </div>
        @endforeach
    </div>




    <script>
        function openEditModal(eventId) {
            document.getElementById('editModal-' + eventId).classList.remove('hidden');
        }

        function closeEditModal(eventId) {
        document.getElementById('editModal-' + eventId).classList.add('hidden');
    }


        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($events),
            });
            calendar.render();
        });
    </script>


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
