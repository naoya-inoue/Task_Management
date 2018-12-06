@extends('layouts.app')

@section('content')
<div class="text-center">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                <div class="jumbotron">
                    <h1>{{ $user->name }}</h1>
                    <button type="button" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>ユーザ情報編集</button>
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
            
            <div class="text-left"><h4>グループタスク　<a href="#" class="btn btn-primary btn-inline">グループを作成</a></h4></div>
            
            table
            
        </div>
    </div>
</div>
@endsection