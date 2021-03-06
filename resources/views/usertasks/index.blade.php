@extends('layouts.app')

@section('content')
    <div class="text-center">
            <h3>{{ $user->name }}のタスク一覧</h3>
            {!! link_to_route('user.tasks.create', 'タスクを作成', ['id' => Auth::id()], ['class' => 'btn btn-primary']) !!}</h4>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    @if (count($user_tasks) > 0)
        <table class="table table-striped table-condensed table-hover" style="table-layout:fixed;">
            <thead>
                <tr>
                    <th class="col-md-5">【タスク名】<br>タスク説明</th>
                    <th class="col-md-4">期日</th>
                    <th class="col-md-1">状態</th>
                    <th class="col-md-1"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($user_tasks as $user_task)
                    <tr>
                        <td><h4>【{!! link_to_route('user.tasks.show', $user_task->title, ['id' => Auth::id(),'task' => $user_task->id]) !!}】</h4>  <div style="overflow:hidden; text-overflow:ellipsis;">{{ $user_task->content }}</div></td>
                        <td style="vertical-align:middle">
                            <?php    $now = date("Y-m-d");
                                $date = $user_task->deadline;
                                    if(date("y-m-d",(strtotime($now))) == date("y-m-d",(strtotime($date)))){
    		                           print ('<text style="color:red">期日本日設定です！</text>');
                                    }elseif($now < $date){
                    		            $interval = (strtotime($date) - strtotime($now))/(60*60*24);
                    		            print ( '残り' . $interval . '日です。<br>' . date("Y年m月d日",(strtotime($date))) . 'に設定されています。');
            		                }else{
                    		            print ('<text style="color:red">期日を過ぎています。</text><br>' . date("Y年m月d日",(strtotime($date))) . 'に設定されていました。');
            		                }
                                    ?></td>
                        <td style="vertical-align:middle"><?php if($user_task->status == 0 ) {
                            print ("進行前");
                            } elseif ($user_task->status == 1) {
                            print ("進行中");
                            } else {
                            print ("完了");
                            }
                            ?></td>
                        <td style="vertical-align:middle"><?php print($user_task->comments->count()); ?></td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    @endif
        </div>
    </div>


@endsection