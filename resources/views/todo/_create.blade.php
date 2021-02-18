@extends('layouts.app')

@section('title')
    Timex | Todo Create
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right"><a href="{{route('todo.create')}}"><i class="fa fa-plus-square-o"></i>  Add task</a></div>
                <div class="card-body align-self-center">
                    <form action="{{route('todo.create')}}" method="post" class="align-items-center">
                        @csrf
                        <div class="form-group mx-sm-1 mb-1 ">
                            <input type="text" name="title" id="title" placeholder="e.g. Read every day p3" class="form-control"><br/>
                        </div>
                        <div class="form-group mx-sm-1 mb-5 ">
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="e.g. description"></textarea>
                        </div>

                        <div class="form-group mx-sm-1 mb-1 ">
                            @livewire('step')
                        </div>

                            <button type="submit" class="btn mb-5 btn-outline-primary btn-block">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection