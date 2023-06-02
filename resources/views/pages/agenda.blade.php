@extends('pages.layouts')

@section('content')
<div class="row">
    <div class="col">
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