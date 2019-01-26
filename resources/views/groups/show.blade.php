@extends('layouts.app')

@section('content')
<div class="text-center">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="jumbotron">
                    <h1>{{ $group->group_name }}</h1>
                    
                        <div class="text-left">
                            <span class="label label-info">グループの説明</span>
                            <p>{!! nl2br(e($group->group_explanation)) !!}</p>
                        </div>
                    {!! link_to_route('groups.edit', 'グループ情報編集', ['id' => $group->id], ['class' => 'glyphicon glyphicon-pencil btn btn-default btn-xs pull-right aria-label=Left Align aria-hidden="true"']) !!}
                </div>
                    <div class="text-right">
                        @if ($group->created_at == $group->updated_at)
                            <p>作成日 {{ $group->created_at }}</p>
                        @else()
                            <p>更新日 {{ $group->updated_at }}</p>
                        @endif
                    </div>
                    
    @include('user_group_join.group_join_button', ['user' => $user])<br>


@if (Auth::user()->is_groups($group->id))

    {!! link_to_route('group.tasks.create', 'グループタスクを作成', ['id' => $group->id],['class' =>'btn btn-dfault']) !!}
    {!! link_to_route('group.tasks.list', 'グループタスク一覧', ['id' => $group->id],['class' =>'btn btn-dfault']) !!}


タスク数<span class="badge">{{ $user_count  = $count['count_group_tasks'] }}</span>
進行中<span class="badge">{{ $user_count  = $count['count_group_tasks_not'] }}</span>
完了<span class="badge">{{ $user_count  = $count['count_group_tasks_comp'] }}</span>


    <div class="row">
        <div class="col-md-3">
            @if (count($userlist) > 0)
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><center>参加ユーザ<span class="badge">{{ $user_count  = $count['count_group_join_users'] }}</span></center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $userlist as $joinuser )
                        <tr>
                            <td>{{ $joinuser->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <div class="col-md-9">
        @if (count($grouptasks) > 0)
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="col-md-6 text-center">タスク名</th>
                        <th class="col-md-3 text-center">期日</th>
                        <th class="col-md-2 text-center">状態</th>
                        <th class="col-md-1 text-center"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($grouptasks as $grouptask)
                        <tr style="height:4em">
                            <td style="vertical-align:middle" class="text-left">{!! link_to_route('group.tasks.show', $grouptask->title, ['id' => $group->id,'task' => $grouptask->id]) !!}</td>
                            <td style="vertical-align:middle"><?php    $now = date("Y-m-d");
                                $date = $grouptask->deadline;
                                    if(date("Y-m-d",(strtotime($now))) == date("Y-m-d",(strtotime($date))) || ($now > $date)){
    		                           print ('<text style="color:red">' . date("Y年m月d日",(strtotime($date))) . '</text>');
                                    }else {
        		                        $interval = (strtotime($date) - strtotime($now))/(60*60*24);
                    		            print ( '残り' . $interval . '日<br>' . date("Y年m月d日",(strtotime($date))));
            		                }
                                    ?></td>
                            <td style="vertical-align:middle"><?php if($grouptask->status == 0 ) {
                                print ("進行前");
                                } elseif ($grouptask->status == 1) {
                                print ("進行中");
                                } else {
                                print ("完了");
                                }
                                ?></td>
                            <td style="vertical-align:middle"><?php print($grouptask->comments->count()); ?></td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        @endif
        </div>
    </div>
    {!! Form::open(['route' => ['groups.destroy', $group->id], 'method' => 'delete']) !!}
        {!! Form::submit('グループ削除', ['class' => 'btn btn-danger btn-xs']) !!}
    {!! Form::close() !!}

@endif
                
                
            </div>
        </div>
    </div>



@endsection