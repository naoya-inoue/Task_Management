@extends('layouts.app')

@section('content')
<div class="text-center">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                <div class="jumbotron">
                    <h1>{{ $group->group_name }}</h1>
                </div>
            </div>
        </div>
    </div>
                
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                
            {!! Form::model($group, ['route' => ['groups.update', $group->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('group_name', 'グループ名') !!}
                    {!! Form::text('group_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('group_explanation', 'グループの説明') !!}
                    {!! form::textarea('group_explanation', old('group_explanation'), ['class' => 'form-control', 'row-5']) !!}
                </div>

                    {!! Form::submit('変更', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
@endsection