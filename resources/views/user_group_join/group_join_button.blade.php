@if (Auth::user()->is_groups($group->id))
    {!! Form::open(['route' => ['users.leave', $group->id], 'method' => 'delete']) !!}
        {!! Form::submit('Leave', ['class' => "btn btn-danger btn-block"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['users.join', $group->id]]) !!}
        {!! Form::submit('Join', ['class' => "btn btn-primary btn-block"]) !!}
    {!! Form::close() !!}
@endif
