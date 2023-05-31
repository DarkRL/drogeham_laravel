@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div id="calendar"></div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'nl',
                    selectable: true,
                    events: [
                    <?php 
                        foreach ($posts as $post){
                            echo "
                            {
                                title: '". $post->title ."',
                                start: '". $post->start ."'
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