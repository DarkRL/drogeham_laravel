@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
    <div class="table-responsive">
                <table class="table table-striped table-responsive w-100">
                    <tr>
                        <th>Naam</th>
                        <th class="small" style="width:15%">Aangemeld op</th>
                        <th class="small" style="width:15%">Email</th>
                        <th class="small" style="width:15%">Tel</th>
                        <th class="small" style="width:7%">Bericht</th>
                    </tr>
                    @foreach ($posts as $post)

                      <x-admin.contact_post_card postid="{{ $post->id }}" headline="{{ $post->naam }}" email="{{$post->email}}" datetime="{{ $post->created_at }}" fulltext="{{ $post-> bericht }}" tel="{{$post->tel}}"/>

                    @endforeach
                </table>
            </div>
    </div>
</div>

@endsection
