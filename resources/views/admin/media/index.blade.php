@extends('layouts.admin')


@section('content')
    @if(Session::has('deleted_photo'))

        <p class="bg-danger">{{session('deleted_photo')}}</p>

    @endif

    <h1>Media</h1>

    @if($photos)
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->file?$photo->file:'http://placehold.it/400x400'}}"></td>
                    <td>{{$photo->created_at ? $photo->created_at :'no date' }}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete photo',['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop