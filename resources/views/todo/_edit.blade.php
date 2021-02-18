@extends('layouts.app')

@section('title')
    Todo Update
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header  text-right"><a href="{{route('todo.create')}}"><i class="fa fa-plus-square-o"></i>  Add task</a></div>
                <div class="card-body align-self-center">
                    <form action="{{route('todo.update', $todo->id)}}" method="post" class="align-items-center">
                        @csrf
                        @method('patch')
                        <div class="form-group mx-sm-1 mb-2 ">
                            <input type="text" name="title" id="title" value="{{$todo->title}}" placeholder="e.g. Read every day p3" class="form-control">
                        </div>
                        <div class="form-group mx-sm-1 mb-2 ">
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="e.g. description p3">{{$todo->description}}</textarea>
                          </div>
                        <button type="submit" class="btn mb-5 btn-outline-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection