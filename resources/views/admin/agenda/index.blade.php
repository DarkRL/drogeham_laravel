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
                        <div class="row">
                            <div class="col-6">
                                <form method="POST" action="{{ route('admin.agenda.create') }}">
                                    @csrf
                                    <input type="hidden" name="start" id="start_date">
                                    <input type="hidden" name="end" id="end_date">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sluiten</button>
                                    <button type="submit" class="btn btn-success">Toevoegen</button>
                                </form>
                            </div>
                        </div>
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
                    <div class="modal-body mx-4 my-3">
                        <div id="eventText"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-6">
                                <form method="POST" id="editform" action="">
                                    @csrf
                                    <input type="hidden" name="id" id="event_id">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sluiten</button>
                                    <a href="{{ route('admin.agenda.delete', ['id' => 0]) }}">
                                        <button type="button" class="btn btn-danger">Verwijderen</button>
                                    </a>
                                    <button type="submit" class="btn btn-success">Aanpassen</button>
                                </form>
                            </div>
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
                    }
                });

                calendar.render();
            });
        </script>
    </div>
</div>

@endsection