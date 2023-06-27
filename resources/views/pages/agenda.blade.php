@extends('pages.layouts')

@section('content')
<div class="row mb-2">
    <div class="vh-100 w-100 my-3" id="calendar"></div>
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

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var idRoute = "{{ route('eventajax', ':id') }}";
                    var newRoute = idRoute.replace(':id', info.event.id);

                    $.ajax({
                        url: newRoute,
                        type: 'POST',
                        dataType: 'json',
                        success: function(response) {
                            // console.log(response);
                            $('#eventText').html(response.text);
                            $('#eventModal').modal('show');
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
<div class="modal fade" id="eventModal"> <!--  modal voor display event -->
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal-header-custom""><span id="clickedevent"></span></h5>
                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
            <div class="m-2 w-100 container-fluid modal-header-custom text-display-area">
                <div id="eventText"></div>
            </div>
        </div>
    </div>
</div>
@endsection