@extends('layouts.app')

@section('content')
<div class="text-center">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                <div class="jumbotron">
                    <h1>{{ $user->name }}</h1>
                </div>
            </div>
        </div>
    </div>
                
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                
            {!! Form::model($user, ['route' => ['users.update', ['id' => $user->id, 'task' => $task->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
            
                    {!! Form::submit('変更', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
@endsection