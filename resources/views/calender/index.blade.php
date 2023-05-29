@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Campus Calendar</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card flex justify-between">
        <div class="card-body">
            <br>
            <h2>Campus Calendar</h2>
            {{-- <button href="{{ route('campus_history.create') }}" type="submit" name="" class="btn btn-success">Add Image</button>  --}}
            {{-- <a href="{{ route('campus_history.create') }}" class="btn btn-success">Create History</a> --}}
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="container mt-5" style="max-width: 700px">

                <div id='full_calendar_events'></div>
            </div>
            {{-- Scripts --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script>
                $(document).ready(function () {
                    var SITEURL = "{{ url('/') }}";
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var calendar = $('#full_calendar_events').fullCalendar({
                        editable: true,
                        editable: true,
                        events: SITEURL + "/calendar-event",
                        displayEventTime: true,
                        eventRender: function (event, element, view) {
                            if (event.allDay === 'true') {
                                event.allDay = true;
                            } else {
                                event.allDay = false;
                            }
                        },
                        selectable: true,
                        selectHelper: true,
                        select: function (event_start, event_end, allDay) {
                            var event_name = prompt('Event Name:');
                            if (event_name) {
                                var event_start = $.fullCalendar.formatDate(event_start, "Y-MM-DD HH:mm:ss");
                                var event_end = $.fullCalendar.formatDate(event_end, "Y-MM-DD HH:mm:ss");
                                $.ajax({
                                    url: SITEURL + "/calendar-crud-ajax",
                                    data: {
                                        event_name: event_name,
                                        event_start: event_start,
                                        event_end: event_end,
                                        desc: desc,
                                        type: 'create'
                                    },
                                    type: "POST",
                                    success: function (data) {
                                        displayMessage("Event created.");
                                        calendar.fullCalendar('renderEvent', {
                                            id: data.id,
                                            title: event_name,
                                            start: event_start,
                                            end: event_end,
                                            description: desc,
                                            allDay: allDay
                                        }, true);
                                        calendar.fullCalendar('unselect');
                                    }
                                });
                            }
                        },
                        eventDrop: function (event, delta) {
                            var event_start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                            var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                            $.ajax({
                                url: SITEURL + '/calendar-crud-ajax',
                                data: {
                                    title: event.event_name,
                                    start: event_start,
                                    end: event_end,
                                    description: desc,
                                    id: event.id,
                                    type: 'edit'
                                },
                                type: "POST",
                                success: function (response) {
                                    displayMessage("Event updated");
                                }
                            });
                        },
                        eventClick: function (event) {
                            var eventDelete = confirm("Are you sure?");
                            if (eventDelete) {
                                $.ajax({
                                    type: "POST",
                                    url: SITEURL + '/calendar-crud-ajax',
                                    data: {
                                        id: event.id,
                                        type: 'delete'
                                    },
                                    success: function (response) {
                                        calendar.fullCalendar('removeEvents', event.id);
                                        displayMessage("Event removed");
                                    }
                                });
                            }
                        }
                    });
                });
                function displayMessage(message) {
                    toastr.success(message, 'Event');
                }
            </script>
        </div>
    </div>
@endsection
