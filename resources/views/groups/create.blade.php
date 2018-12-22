@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>グループの作成</h1>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        
        {!! Form::open(['route' => 'groups.store', $id=Auth::user()]) !!}
            <div class="form-group">
                {!! form::label('group_name', 'グループ名') !!}
                {!! form::text('group_name', old('group_name'), ['class' => 'form-control']) !!}
            </div>
                
            <div class="form-group">
                {!! form::label('group_explanation', 'グループの説明') !!}
                {!! form::textarea('group_explanation', old('group_explanation'), ['class' => 'form-control', 'rows=3']) !!}
            </div>

            {!! Form::submit('Create', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
</div>




@endsection