<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/list/main.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.2/main.min.css' rel='stylesheet' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.2/main.min.js'></script>
<!-- Include FullCalendar CSS -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />

<!-- Include jQuery (required for FullCalendar) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include FullCalendar JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>


    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-800 p-8">
    
    @yield('content')
</body>
</html>