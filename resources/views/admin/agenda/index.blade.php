@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div id="calendar"></div>
        @csrf
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'nl',
                    selectable: true,
                    select: function(info) { //wanneer je een aantal dagen selecteer of op een dag klikt wordt deze code uitgevoerd
                        // alert('Clicked on: ' + info.startStr + ' to ' + info.endStr);
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