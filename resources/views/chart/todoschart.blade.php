@extends('layouts.app')

@section('title')
    Todos Chart
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header text-center">Todos Chart</div>

                <div class="card-body text-center">
                    <div>
                        {!! $chart->container() !!}
                    </div>
                {!! $chart->script() !!}
            </div>
        </div>
    </div>
    
</div>
@endsection