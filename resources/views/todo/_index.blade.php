@extends('layouts.app')

@section('title')
    Todods All
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right"><a href="{{route('todo.create')}}"><i class="fa fa-plus-square-o"></i>  Add task</a></div>
                <div class="card-body text-center">
                    <div>
                        @if(session()->has('message'))
                            <div>{{session()->get('message')}}</div>
                        @elseif(session()->has('error'))
                            <div>{{session()->get('error')}}</div>
                        @endif
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($todos as $todo)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{route('todo.show', $todo->id)}}" class=" text-decoration-none">
                                    @if($todo->completed)
                                    <div class="text-capitalize"><del>{{ $todo->title }}</del></div>
                                    @else
                                    <div class="text-capitalize">{{ $todo->title }}</div>
                                    @endif
                                </a>
                                @include('todo.complete_button')
                            </li>
                        @endforeach
                    </ul>
                    
                </div>
                @include('sweetalert::alert')
            </div>
        </div>
    </div>
</div>
@endsection