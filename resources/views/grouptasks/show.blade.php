@extends('layouts.app')

@section('content')
    <div class="text-center">
            <h4>グループタスク</h4>
                    @include('tasks_status.tasks_status_button')<br>
    </div>
        
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
<div class="panel panel-default">
	<div class="panel-heading">
		<h4><span class="label label-info">タスク件名</span> {{ $task->title }}</h4>
		<p><span class="label label-info">状況</span>
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
        <h4><span class="label label-info">タスク説明</span></h4>
        <p>{!! nl2br(e($task->content)) !!}</p>
	</div>
	<div class="panel-footer">
		<h4><span class="label label-info">期日</span></h4>
		        <p><?php    $now = date("Y-m-d");
                            $date = $task->deadline;
                        if(date("Y-m-d",(strtotime($now))) == date("Y-m-d",(strtotime($date)))){
                            print ('<text style="color:red">' .'期日本日設定です！' .'</text>');
                        }elseif($now < $date){
        		            $interval = (strtotime($date) - strtotime($now))/(60*60*24);
        		            print ( "残り" . $interval . "日です。". "<br>" . date("Y年m月d日",(strtotime($date))) . "に設定されています。");
		                }else{
        		            print (date("Y年m月d日",(strtotime($date))) . "に期日設定、期日を過ぎています。");
		                }
        		    ?></p>
	</div>
</div>

	{!! link_to_route('group.tasks.edit', 'タスク編集', ['id' => $group->id,'task' => $task->id], ['class' => 'glyphicon glyphicon-pencil btn btn-default btn-xs pull-right']) !!}

                    @if ($task->created_at == $task->updated_at)
                        <p>作成日 {{ $task->created_at }}</p>
                    @else()
                        <p>更新日 {{ $task->updated_at }}</p>
                    @endif
    {!! Form::model($task, ['route' => ['user.tasks.ToDo.update', 'id' => Auth::id(),'task' => $task->id], 'method' => 'put']) !!}
        @foreach ($ToDos as $ToDo)
            @if($ToDo->status == "0")
                <p>{!! Form::checkbox('ToDoCheck[]', $ToDo->id) !!} {{$ToDo->ToDo}}</p>
            @elseif($ToDo->status =="1")
                <p>{!! Form::checkbox('ToDoCheck[]', $ToDo->id , true) !!} {{$ToDo->ToDo}}</p>
            @endif
        @endforeach
        {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
    @include('commons.ToDo_post', ['task'=>$task])

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
        </tbody>
    </table>
    
@endsection