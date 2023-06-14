@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <h5>Brinkpraat
            @php
            use App\Models\admin\BrinkpraatPosts;
            @endphp
            @if (!BrinkpraatPosts::where('id', 1)->exists())
            <a href="{{ route('admin.home.create') }}">
                <button type="button" class="btn btn-success btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                </button>
            </a>
            @endif
        </h5>

        <div id="message">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @elseif ($message = Session::get('fail'))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @endif
        </div>
    </div>
</div>
<div class="row justify-content-center mt-1">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Preview:</h5>
            </div>
            <div class="card-body">
                @forelse ($posts as $post)

                <x-admin.brinkpraat_post postid="{{ $post->id }}" fulltext="{{ $post->fulltext }}" datetime="{{ $post->updated_at }}" />

                @empty

                none

                @endforelse
            </div>
        </div>
        <a href="{{ route('admin.brinkpraat.create.files') }}"><button type="button" class="btn btn-primary m-2">Voeg een nieuw bestand toe</button></a>
        <div>
            <input type="text" id="searchInput" class="form-control" placeholder="Zoek..." aria-label="Zoeken" aria-describedby="addon-wrapping">
            <ul id="searchResults"></ul>
            <div class="table-responsive mt-2">
                <table class="table table-striped table-responsive w-100">
                    <tr>
                        <th>Bestand</th>
                        <th class="small text-center" style="width:15%">Publicatiedatum</th>
                        <th class="small text-center" style="width:7%">Aanpassen</th>
                        <th class="small text-center" style="width:7%">Verwijderen</th>
                        <th class="small text-center" style="width:10%">Actief zetten</th>
                    </tr>
                    @forelse ($posts_files as $posts_file)

                    <x-admin.brinkpraatfile_post filepath="{{$posts_file->filepath}}" filename="{{ $posts_file->filename }}" datetime="{{ date('d-m-Y', strtotime($posts_file->datetime)) }}" postid="{{ $posts_file->id }}" public="{{ $posts_file->public }}" />

                    @empty

                    <tr>
                        <td colspan="5">Geen bestanden geüpload</td>
                    </tr>

                    @endforelse
                </table>
                <div class="d-flex">
                    {!! $posts_files->links() !!}
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    var searchInput = $('#searchInput');
                    var searchResults = $('#searchResults');

                    var rows = $('.searchable-table-row'); // Fetch all rows initially

                    searchInput.on('input', function() {
                        var searchTerm = searchInput.val().toLowerCase();

                        searchResults.empty(); // Clear previous search results
                        if (searchTerm.length > 3) {
                            rows.each(function() {
                                var row = $(this);
                                var text = row.text().toLowerCase();

                                if (text.includes(searchTerm)) {
                                    // Generate a unique ID for the row
                                    var rowId = 'row-' + Math.random().toString(36).substr(2, 9);

                                    // Add the ID to the row
                                    row.attr('id', rowId);

                                    // Create an anchor tag with the link to the row
                                    var anchorTag = $('<a>')
                                        .attr('href', '#' + rowId)
                                        .addClass('text-decoration-none')
                                        .html(row.text() + ' <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg>');

                                    // Append the anchor tag and the row to the search results
                                    var resultContainer = $('<li>').addClass('my-3');
                                    resultContainer.append(anchorTag);
                                    searchResults.append(resultContainer);
                                }
                            });
                        } else {
                            searchResults.empty(); // Clear previous search results
                        }
                    });
                });
            </script>
        </div>
    </div>

    @endsection