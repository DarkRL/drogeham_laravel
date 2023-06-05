@extends('pages.layouts')

@section('content')
<div class="row m-5">
    <div id="calendar"></div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'nl',
                    firstDay: 1,
                    buttonText: {
                        today: 'vandaag'
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
                        console.log(info.event.id);
                    }
                });
                calendar.render();
            });
        </script>
    </div>
</div>
@endsection