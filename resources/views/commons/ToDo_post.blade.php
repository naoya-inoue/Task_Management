
{!! Form::model($task,['route' => ['ToDo.store', $task->id]]) !!}
    <div class="form-group">
        {!! form::label('ToDo', 'ToDo') !!}
        {!! form::text('ToDo', old('ToDo'), ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('追加', ['class' => 'btn btn-primary btn-block']) !!}
{!! Form::close() !!}