@extends('layouts.app')

@section('content')
    <div class="text-center">
        {{ $task->name }}
        <h1>タスクの編集</h1>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

        {!! Form::model($task, ['route' => ['group.tasks.update','id' => $group->id,'task' => $task->id], 'method' => 'put']) !!}
            <div class="form-group">
                {!! form::label('title', 'タスク名') !!}
                {!! form::text('title', old('title'), ['class' => 'form-control']) !!}
            </div>
                
            <div class="form-group">
                {!! form::label('content', '詳細') !!}
                {!! form::textarea('content', old('content'), ['class' => 'form-control', 'rows=3']) !!}
            </div>
            
            <div class="form-group">
                {!! form::label('deadline', '期日') !!}
                {!! form::date('deadline', old('deadline'), ['class' => 'form-control']) !!}
            </div>



            {!! Form::submit('Edit', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
</div>




@endsection