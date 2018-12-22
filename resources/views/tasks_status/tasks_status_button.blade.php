
@if ($task->status == 0)
    {!! Form::open(['route' => ['tasks.status', $task->id]]) !!}
        {!! Form::submit('開始', ['class' => "btn btn-danger"]) !!}
    {!! Form::close() !!}
@elseif ($task->status ==1 )
    {!! Form::open(['route' => ['tasks.status', $task->id]]) !!}
        {!! Form::submit('完了に変更', ['class' => "btn btn-primary"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['tasks.status', $task->id]]) !!}
        {!! Form::submit('進行中に戻す', ['class' => "btn btn-success"]) !!}
    {!! Form::close() !!}
@endif

