<div>
    @if(session()->has('message'))
        <div>{{session()->get('message')}}</div>
    @elseif(session()->has('error'))
        <div>{{session()->get('error')}}</div>
    @endif
</div>