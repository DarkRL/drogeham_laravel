<tr id="record-{{$postid}}">
    <td>
        <p>{!! html_entity_decode($headline) !!}</p>
    </td>
    <td>{!! html_entity_decode($datetime) !!}</td>
    <td>{!! html_entity_decode($email) !!}</td>
    <td>{!! html_entity_decode($tel) !!}</td>
    <td class="text-center">
        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#previewModel{{ $postid }}" title="Preview">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
            </svg>
        </button>
    </td>
    <td class="text-center">
        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $postid }}" title="Verwijderen">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
            </svg>
        </button>
    </td>

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
                            <form method="post" id="delete_{{ $postid }}">
                                @csrf
                                <input class="form-control" type="hidden" name="headline" value="{{ $headline  }}">
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Ja</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="previewModel{{ $postid }}">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Voorbeeld</h5>
                </div>
                <div class="m-2 container-fluid">
                    {!! html_entity_decode($fulltext) !!}
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sluiten</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#delete_{{ $postid }}').submit(function(event) {
                event.preventDefault();

                var id = "{{ $postid }}";
                var formElement = $(this);
                var formData = $(formElement).serialize();

                $.ajax({
                    url: "{{ route('admin.contact.delete', ['id' => $postid]) }}",
                    type: 'PUT',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        $('#record-' + id).remove();
                        $('#message').text(response.message).addClass("alert alert-success");
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        $('#message').text(err.message).addClass("alert alert-danger");
                    }
                });
            });
        });
    </script>
</tr>