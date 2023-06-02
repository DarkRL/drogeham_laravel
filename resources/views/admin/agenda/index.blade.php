@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div id="calendar"></div>
        <div class="modal fade" id="eventModal">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Wil je een evenement van <span id="startdate"></span> tot en met <span id="enddate"></span> toevoegen?</h5>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-6">
                                <form method="POST" action="{{ route('admin.agenda.create') }}">
                                    @csrf
                                    <input type="hidden" name="start" id="start_date">
                                    <input type="hidden" name="end" id="end_date">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sluiten</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
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
                                end: '" . $post->end . "'
                            },";
                        }
                        ?>
                    ],
                    eventClick: function(info) {
                        alert('Event: ' + info.event.title);
                    }
                });
                
                calendar.render();
            });
        </script>
    </div>
</div>

@endsection