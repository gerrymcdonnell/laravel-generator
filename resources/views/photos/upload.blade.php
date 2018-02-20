@extends('...layouts.app')


    @section('content')

    <h1>Upload Media</h1>

    {!! Form::open(['method'=>'POST','action'=>'PhotosController@store2','class'=>'dropzone', 'id'=>'my-awesome-dropzone']) !!}

    {!! Form::close() !!}

    @endsection