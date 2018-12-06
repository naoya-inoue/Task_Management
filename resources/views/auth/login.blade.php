@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ログイン</h1>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        
        {!! Form::open(['route' => 'login.post']) !!}    
            <div class="form-group">
                {!! form::label('email', 'メールアドレス') !!}
                {!! form::email('email', old('email'), ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('password', 'パスワード') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            
            {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
        
        <p>{!! link_to_route('signup.get', '新規登録しますか？') !!}</p>
        </div>
    </div>
@endsection