@extends('layouts.app')

@section('title')
    todo: Timex
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header text-right"><a href="{{route('todo.create')}}"><i class="fa fa-plus-square-o"></i>  Add task</a></div>

                <div class="card-body text-center">
                    
                        <h2>{{ $todo->title }}</h2>
                        <p>{{ $todo->description }}</p>
                        <div>
                            <a class="text-primary" href="/todo/{{$todo->id}}/edit">
                                <i class="fa fa-pencil-square-o fa-2x"></i>
                            </a>
                            <span onclick="event.preventDefault();
                            if(confirm('Are you relly want to delete?')){
                            document.getElementById('form-delete-{{$todo->id}}').submit()}" class="fa fa-trash-o fa-2x text-danger"></span>
                            <form style="display:none" action="{{route('todo.delete', $todo->id)}}" id="{{'form-delete-'.$todo->id}}" method="post" >
                                @csrf
                                @method('delete')
                            </form>

                        </div>
                    
                </div>
                @include('sweetalert::alert')
            </div>
        </div>
    </div>
</div>
@endsection
