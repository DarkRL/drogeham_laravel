@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div>
        	<a href="{{ route('admin.actueel.create') }}"><button type="button" class="btn btn-primary">Add Article</button></a>
            <div class="row">
                <div class= "col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Article Title</h4>
                        </div>
                        <div class="card-body">
                            <img src="{{URL::asset("./img/luchtfoto.jpg")}}" height="100px">
                        </div>
                    </div>
                </div>
                <div class= "col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Article Title</h4>
                        </div>
                        <div class="card-body">
                            <img src="{{URL::asset("./img/luchtfoto.jpg")}}" height="100px">
                        </div>
                    </div>
                </div>
                <div class= "col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Article Title</h4>
                        </div>
                        <div class="card-body">
                            <img src="{{URL::asset("./img/luchtfoto.jpg")}}" height="100px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection