@extends('layouts.app')

@section('content')
    <div class="text-center">
        {{ $group->group_name }}
            <h3>タスクの作成</h3>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            
        {!! Form::model($group,['route' => ['group.tasks', $group->id]]) !!}
            <div class="form-group">
                {!! form::label('title', 'タスク名') !!}
                {!! form::text('title', old('title'), ['class' => 'form-control']) !!}
            </div>
                
            <div class="form-group">
                {!! form::label('content', '詳細') !!}
                {!! form::text('content', old('content'), ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! form::label('deadline', '期日') !!}
                {!! form::date('deadline', old('deadline'), ['class' => 'form-control']) !!}
            </div>
            

            {!! Form::submit('Create', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
</div>




@endsection