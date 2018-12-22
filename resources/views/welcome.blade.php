@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <?php $user = Auth::user(); ?>
            {{ $user->name }}


    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Task Management</h1>
                <h2>シンプルなタスク管理</h2>
                {!! link_to_route('signup.get', '新規登録しますか？', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection