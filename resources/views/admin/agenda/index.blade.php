@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div id="calendar"></div>
        <div class="modal fade" id="eventModal"> <!--  modal voor toevoegen event -->
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Wil je een evenement van <span id="startdate"></span> tot en met <span id="enddate"></span> toevoegen?</h5>
                        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-footer">

                        <form method="POST" action="{{ route('admin.agenda.create') }}">
                            @csrf
                            <input type="hidden" name="start" id="start_date">
                            <input type="hidden" name="end" id="end_date">
                            <div class="btn-toolbar">
                                <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Sluiten</button>
                                <button type="submit" class="btn btn-success mx-1">Toevoegen</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="eventEditModal"> <!--  modal voor aanpassen event -->
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Evenement: <span id="clickedevent"></span></h5>
                        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="m-2 container-fluid">
                        <div id="eventText"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-toolbar">
                            <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Sluiten</button>
                            <form method="POST" id="deleteFunction" action="">
                                @csrf
                                <input type="hidden" name="del_id" id="del_id">
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Verwijderen</button>
                            </form>
                            <form method="POST" id="editform" action="">
                                @csrf
                                <input type="hidden" name="id" id="event_id">
                                <button type="submit" class="btn btn-success mx-1">Aanpassen</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'nl',
                    firstDay: 1,
                    selectable: true,
                    buttonText: {
                        today: 'vandaag'
                    },
                    select: function(info) { //wanneer je een aantal dagen selecteer of op een dag klikt wordt deze code uitgevoerd
                        // alert('Clicked on: ' + info.startStr + ' to ' + info.endStr);
                        $("#start_date").val(info.startStr);
                        $("#end_date").val(info.endStr);
                        $("#startdate").text(info.startStr);
                        $("#enddate").text(info.endStr);

                        $('#eventModal').modal('show');
                    },
                    events: [
                        <?php
                        foreach ($posts as $post) {
                            echo "
                            {
                                title: '" . $post->title . "',
                                start: '" . $post->start . "',
                                end: '" . $post->end . "',
                                id: '" . $post->id . "'
                            },";
                        }
                        ?>
                    ],
                    eventClick: function(info) {
                        // alert('Event: ' + info.event.title);
                        $('#event_id').val(info.event.id);
                        $("#clickedevent").text(info.event.title);

                        // ajax for getting the event text
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        var textIdRoute = "{{ route('admin.agenda.eventajax', ':id') }}";
                        var dataRoute = textIdRoute.replace(':id', info.event.id);

                        $.ajax({
                            url: dataRoute,
                            type: 'POST',
                            dataType: 'json',
                            success: function(response) {
                                // console.log(response);
                                $('#eventText').html(response.text);
                                $('#eventEditModal').modal('show');
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr);
                                console.log(status);
                                console.log(error);
                            }
                        });

                        // route for the edit button
                        var idRoute = "{{ route('admin.agenda.edit', ':id') }}";
                        var newRoute = idRoute.replace(':id', info.event.id);
                        $('#editform').attr('action', newRoute);

                        $('#deleteFunction').attr('action', "{{ route('admin.agenda.delete') }}");
                        $('#del_id').val(info.event.id);

                        $('#deleteFunction').submit(function(event) {
                            event.preventDefault();

                            var id = info.event.id;
                            var formElement = $(this);
                            var formData = $(formElement).serialize();

                            var event = calendar.getEventById(info.event.id);

                            $.ajax({
                                url: "{{ route('admin.agenda.delete') }}",
                                type: 'PUT',
                                data: formData,
                                dataType: 'json',
                                success: function(response) {
                                    event.remove();
                                },
                                error: function(xhr, status, error) {
                                    var err = eval("(" + xhr.responseText + ")");
                                    $('#message').text(err.message).addClass("alert alert-danger");
                                }
                            });
                        });
                    },
                    editable: true,
                    eventDrop: function(info) {
                        // console.log(info.event.startStr);
                        // console.log(info.event.endStr);

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        var idRoute = "{{ route('admin.agenda.eventdragajax', ':id') }}";
                        var newRoute = idRoute.replace(':id', info.event.id);

                        $.ajax({
                            url: newRoute,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                start: info.event.startStr,
                                end: info.event.endStr
                            },
                            success: function(response) {
                                // console.log(response);

                            },
                            error: function(xhr, status, error) {
                                console.log(xhr);
                                console.log(status);
                                console.log(error);
                            }
                        });
                    },
                    eventResize: function(info) {
                        console.log(info.event.startStr);
                        console.log(info.event.endStr);
                        console.log(info.event.id);

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        var idRoute = "{{ route('admin.agenda.eventdragajax', ':id') }}";
                        var newRoute = idRoute.replace(':id', info.event.id);

                        $.ajax({
                            url: newRoute,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                start: info.event.startStr,
                                end: info.event.endStr
                            },
                            success: function(response) {
                                console.log(response);

                            },
                            error: function(xhr, status, error) {
                                console.log(xhr);
                                console.log(status);
                                console.log(error);
                            }
                        });
                    }
                });

                calendar.render();
            });
        </script>
    </div>
</div>

@endsection