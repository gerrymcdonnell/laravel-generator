@extends('...layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Upload Photo </div>

                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    {!!
                    Form::open(['action' => 'PhotosController@store',
                    'method'=>'post',
                    'enctype'=>'multipart/form-data'
                    ])!!}

                    {{Form::file('photo')}}
                    {{Form::bsText('title','',[])}}
                    {{Form::bsTextArea('description','',[])}}

                    {{Form::bsSubmit('submit me',['class'=>'btn btn-primary'])}}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection