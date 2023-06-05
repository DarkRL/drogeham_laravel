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
                        $("#clickedevent").text(info.event.title);

                        $('#eventModal').modal('show');
                    }
                });
                calendar.render();
            });
        </script>
    </div>
</div>
<div class="modal fade" id="eventModal"> <!--  modal voor display event -->
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><span id="clickedevent"></span></h5>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-6">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection