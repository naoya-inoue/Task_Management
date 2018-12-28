@extends('layouts.app')

@section('content')
<div class="text-center">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="jumbotron">
                    <h1>{{ $user->name }}</h1>
                        {!! link_to_route('users.edit', 'ユーザ情報編集', ['id' => Auth::id()], ['class' => 'glyphicon glyphicon-pencil btn btn-default aria-label=Left Align aria-hidden="true']) !!}

                </div>
                <?php $now = date("y/m/d H:i");?>
                <h2><span class="label label-warning">現在<strong> {{ $now }} </strong>です。</span></h2>
            </div>
        </div>
        <br>
            {!! link_to_route('users.groups.list', 'グループ一覧', ['id' => $user->id], ['class' => 'btn btn-default']) !!}
            {!! link_to_route('users.tasks.list', '個人タスク一覧', ['id' => $user->id], ['class' => 'btn btn-default']) !!}
            
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="form-group">
            <div class="text-left"><h4>個人タスク　{!! link_to_route('user.tasks.create', 'タスクを作成', ['id' => Auth::id()], ['class' => 'btn btn-primary']) !!}</h4></div>
                @if (count($ptasks) > 0)
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-6 text-center">タスク名</th>
                                <th class="col-md-5 text-center">期日</th>
                                <th class="col-md-1 text-center">状態</th>
                                <th class="col-md-1 text-center"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($ptasks as $ptask)
                                <tr style="height:4em">
                                    <td style="vertical-align:middle" class="text-left">{!! link_to_route('user.tasks.show', $ptask->title, ['id' => $user->id,'task' => $ptask->id]) !!}</td>
                                    <td style="vertical-align:middle">
                                        <?php    $now = date("Y-m-d");
                                            $date = $ptask->deadline;
                                        if(date("d",(strtotime($now))) == date("d",(strtotime($date)))){
        		                           print ('<text style="color:red">期日本日設定です！</text>');
                                        }elseif($now < $date){
                        		            $interval = date("d",(strtotime($date) - strtotime($now)));
                        		            print ( '残り' . $interval . '日です。<br>' . date("Y年m月d日",(strtotime($date))) . 'に設定されています。');
                		                }else{
                        		            print ('<text style="color:red">期日を過ぎています。</text><br>' . date("Y年m月d日",(strtotime($date))) . 'に設定されていました。');
                		                }
                        		        ?></td>
                                    <td style="vertical-align:middle"><?php if($ptask->status == 0 ) {
                                        print ("進行前");
                                        } elseif ($ptask->status == 1) {
                                        print ("進行中");
                                        } else {
                                        print ("完了");
                                        }
                                        ?></td>
                                    <td style="vertical-align:middle"><?php print($ptask->comments->count()); ?></td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                @endif
        </div>
            <div class="text-left"><h4>グループタスク　{!! link_to_route('groups.create', 'グループを作成', null, ['class' => 'btn btn-primary']) !!}</h4></div>
                           <div class="form-group">
                @if (count($grouptasks) > 0)
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th class="col-md-4 text-center">タスク名</th>
                                <th class="col-md-3 text-center">グループ名</th>
                                <th class="col-md-4 text-center">期日</th>
                                <th class="col-md-1 text-center">状態</th>
                                <th class="col-md-1 text-center"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($grouplist as $group)
                                @foreach ($group->tasks as $task)
                
                                <tr style="height:4em">
                                    <td style="vertical-align:middle" class="text-left">{!! link_to_route('group.tasks.show', $task->title, ['id' => $group->id, 'task' => $task->id]) !!}</td>
                                    <td style="vertical-align:middle">{!! link_to_route('groups.show', $group->group_name, ['id' => $group]) !!}</td>
                                    <td style="vertical-align:middle"><?php    $now = date("Y-m-d");
                                            $date = $task->deadline;
                                        if(date("d",(strtotime($now))) == date("d",(strtotime($date)))){
        		                           print ('<text style="color:red">期日本日設定です！</text>');
                                        }elseif($now < $date){
                        		            $interval = date("d",(strtotime($date) - strtotime($now)));
                        		            print ( '残り' . $interval . '日です。<br>' . date("Y年m月d日",(strtotime($date))) . 'に設定されています。');
                		                }else{
                        		            print ('<text style="color:red">期日を過ぎています。</text><br>' . date("Y年m月d日",(strtotime($date))) . 'に設定されていました。');
                		                }
                        		    ?></td>
                                    <td style="vertical-align:middle"><?php if($task->status == 0 ) {
                                        print ("進行前");
                                        } elseif ($task->status == 1) {
                                        print ("進行中");
                                        } else {
                                        print ("完了");
                                        }
                                        ?></td>
                <td style="vertical-align:middle"><?php print($task->comments->count()); ?></td>
                                </tr>
                                @endforeach
                                @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection