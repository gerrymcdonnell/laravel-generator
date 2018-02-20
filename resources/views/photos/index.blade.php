@extends('...layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
            Latest listings

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>
                        Photos <hr>
                        <a href="/photos/create">New Photo</a>

                        <br>
                        <a href="/photos/create2">Drag Drop</a>

                        <hr>
                        <br>

                        @if(count($photos))
                            <ul class="list-group">

                            @foreach($photos as $photo)
                                <li class="list-group-item">

                                <!-- show photo -->
                                <img width="200" src="{{$photo->getPathAttribute()}}">



                                <!--will go to show function-->
                                <a href="/photos/{{$photo->id}}">
                                    {{$photo->photo}}
                                </a>
                                |

                                <!-- edit -->
                                <a href="/photos/{{$photo->id}}/edit">
                                    Edit
                                </a>
                                <!-- end edit -->

                                |
                                <!-- delete -->
                                <!--send bookmark id -->
                                <button data-id="{{$photo->id}}" type="button" class="delete-photo btn btn-danger">delete</button>
                                <!-- end delete -->

                                </li>
                            @endforeach
                            </ul>
                        @endif

                    </h3>


                </div>
            </div>
        </div>
    </div>

@endsection