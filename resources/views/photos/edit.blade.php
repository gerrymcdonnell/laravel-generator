@extends('...layouts.app')

<!-- copied from create listing -->

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">

                <div class="card-header">Edit </div>

                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    {!! Form::open(['action' => ['PhotosController@update',$photo->id],'method'=>'post']) !!}

                    <!-- show photo -->
                    <img width="200" src="{{$photo->getPathAttribute()}}">


                    {{Form::bsText('photo',$photo->photo,[])}}
                    {{Form::bsText('title',$photo->title,[])}}
                    {{Form::bsText('size',$photo->size,[])}}
                    {{Form::bsText('description',$photo->description,[])}}

                    {{Form::hidden('_method','PUT')}}

                    {{Form::bsSubmit('submit me',['class'=>'btn btn-primary'])}}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection