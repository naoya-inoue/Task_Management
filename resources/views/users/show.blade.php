@extends('layouts.app')

@section('content')
<div class="text-center">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                <div class="jumbotron">
                    <h1>{{ $user->name }}</h1>
                        {!! link_to_route('users.edit', 'ユーザ情報編集', ['id' => $user->id], ['class' => 'glyphicon glyphicon-pencil btn btn-default aria-label=Left Align aria-hidden="true']) !!}

                </div>
                <?php $now = date("y/m/d H:i");?>
                <h2><span class="label label-warning">現在<strong> {{ $now }} </strong>です。</span></h2>
            </div>
        </div>
        <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="background-color:GRAY">
            <div class="form-group">
                <div class="text-left"><h4>個人タスク　<a href="#" class="btn btn-primary btn-inline">タスクを作成</a></h4></div>
                
            </div>
            
            table
            lesson10.7.5
            
            
            <div class="text-left"><h4>グループタスク　<a href="#" class="btn btn-primary btn-inline">グループを作成</a></h4></div>
            
            table
            lesson10.7.5
            
        </div>
    </div>
</div>
@endsection