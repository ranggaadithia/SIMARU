@extends('layouts.index')

@section('container')
<div id="calendar"></div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

 <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />

<script> 
console.log(@json($events));
 document.addEventListener('DOMContentLoaded', function () {
     var calendarEl = document.getElementById('calendar');
     var calendar = new FullCalendar.Calendar(calendarEl, {
         initialView: 'dayGridMonth',
         slotMinTime: '07:00:00',
         slotMaxTime: '20:00:00',
         events: @json($events),
         selectable: true
     });
     calendar.render();
 });
</script>
@endpush
@endsection