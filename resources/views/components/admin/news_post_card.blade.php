<section class="col-4">

    <div class="card">
        <div class="card-body">
            <h4>{!! html_entity_decode($headline) !!}</h4>
            <img src="{{ $photo }}" height="100px">
            <div class="row">
                <div class="col-4">
                    <a href="{{ URL('/admin/actueel/'. $postid .'/edit') }}">
                        <button type="button" class="btn btn-primary btn-sm" title="Aanpassen">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </button>
                    </a>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $postid }}" title="Verwijderen">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                        </svg>
                    </button>
                </div>
                <div class="col-4">
                    <form action="{{ route('admin.actueel.publish', ['id' => $postid]) }}" method="post" class="form-group">
                        @csrf
                        <input class="form-control" type="hidden" name="publishValue" id="toggle-input" value="0">
                        <button type="submit" class="btn btn-success btn-sm" title="Publiceren">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                            </svg>
                        </button>
                        <div class="form-check form-switch">
                            <input class="form-check-input" id="toggle" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#toggle').change(function() {
                                    if ($(this).prop('checked')) {
                                        $('#toggle-input').val(1);
                                    } else {
                                        $('#toggle-input').val(0);
                                    }
                                });
                            });
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal{{ $postid }}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Let op!</h5>
                </div>
                <div class="modal-body">
                    <div class="my-3">Weet u zeker dat u dit artikel wil verwijderen?</div>
                </div>
                <div class="modal-footer justify-content-center">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nee</button>
                        </div>
                        <div class="col-6">
                            <a href="{{ URL('/admin/actueel/'. $postid .'/delete') }}">
                                <button type="button" class="btn btn-danger">Ja</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>