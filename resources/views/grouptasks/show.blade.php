@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h2>{{ $task->title }}</h2>
            <h4>タスク詳細</h4>
                    @if ($task->created_at == $task->updated_at)
                        <p>作成日 {{ $task->created_at }}</p>
                    @else()
                        <p>更新日 {{ $task->updated_at }}</p>
                    @endif
                    @include('tasks_status.tasks_status_button')
            {!! link_to_route('group.tasks.edit', 'タスク編集', ['id' => $group->id,'task' => $task->id], ['class' => 'glyphicon glyphicon-pencil btn btn-default btn-xs']) !!}
    </div>
        
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>タスク件名【{{ $task->title }}】</h4>
		<p>状況→
            <?php if($task->status == 0 ) {
            print ("進行前");
            } elseif ($task->status == 1) {
            print ("進行中");
            } else {
            print ("完了");
            }
            ?> </p>
	</div>
	<div class="panel-body">
        <h4>タスク説明</h4><p>{!! nl2br(e($task->content)) !!}</p>
	</div>
	<div class="panel-footer">
		<h4>期日：</h4>
		        <p><?php    $now = date("Y-m-d");
                            $date = $task->deadline;
                        if($now < $date){
        		            $interval = date("d",(strtotime($date) - strtotime($now)));
        		            print ( "残り" . $interval . "日です。". "<br>" . $date . "に設定されています。");
		                }else{
        		            print ("期日を過ぎています。");
		                }
        		    ?></p>
	</div>
</div>

@include('commons.comments_post', ['task'=>$task])
<table class="table table-striped table-condensed">
    <thead>
        <tr>
            <th class="col-md-5">コメント</th>
            <th class="col-md-3">ユーザ</th>
            <th class="col-md-3">日付</th>
        </tr>
    </thead>
    <tbody>
@foreach ($comments as $comment)
    <tr>
        <td>{!! nl2br($comment->comment) !!}</td>
        <td style="vertical-align:middle">{{ $comment->user->name }}</td>
        <td style="vertical-align:middle">{{ $comment->created_at}}</td>
    </tr>
@endforeach
</table>

@endsection