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
                    ]
                });
                calendar.render();
            });
        </script>
    </div>
</div>
@endsection