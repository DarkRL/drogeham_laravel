@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div id="calendar"></div>
        <div class="modal fade" id="previewModel">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Wil je <span id="startdate"> tot en met <span id="enddate"></h5>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-6">
                                <form method="POST" action="{{ route('route') }}">
                                    @csrf
                                    <input type="hidden" name="startdate" id="start_date">
                                    <input type="hidden" name="enddate" id="end_date">
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
                    selectable: true,
                    select: function(info) { //wanneer je een aantal dagen selecteer of op een dag klikt wordt deze code uitgevoerd
                        // alert('Clicked on: ' + info.startStr + ' to ' + info.endStr);
                        $("#start_date").val(info.startStr);
                        $("#end_date").val(info.endStr);
                        $.ajax({
                            url: "{{ route('admin.agenda.create') }}",
                            type: "POST",
                            data: {
                                start: info.startStr,
                                end: info.endStr,
                                // voeg meer variabelen toe indien nodig
                            },
                            success: function(response) {
                                console.log(response);
                            },
                            error: function(xhr, status, error) {
                                // verwerk eventuele fouten hier
                                console.log(xhr);
                                console.log(status);
                                console.log(error);
                                console.log(info);
                            }
                        });
                    },
                    events: [
                        <?php
                        foreach ($posts as $post) {
                            echo "
                            {
                                title: '" . $post->title . "',
                                start: '" . $post->start . "'
                            },";
                        }
                        ?>
                    ]
                });
                calendar.render();
            });
        </script>
    </div>
</div>

@endsection