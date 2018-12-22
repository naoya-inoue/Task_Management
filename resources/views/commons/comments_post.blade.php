
{!! Form::model($task,['route' => ['comments.store', $task->id]]) !!}
    <div class="form-group">
        {!! form::label('comment', 'コメント') !!}
        {!! form::textarea('comment', old('comment'), ['class' => 'form-control', 'rows=3']) !!}
    </div>

    {!! Form::submit('comment', ['class' => 'btn btn-primary btn-block']) !!}
{!! Form::close() !!}