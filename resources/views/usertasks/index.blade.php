@extends('layouts.app')

@section('content')
    <div class="text-center">
        {{ $user->name }}
            <h3>タスク一覧</h3>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    @if (count($user_tasks) > 0)
        <table class="table table-striped table-condensed table-hover" style="table-layout:fixed;">
            <thead>
                <tr>
                    <th class="col-md-7">【タスク名】<br>タスク説明</th>
                    <th class="col-md-2">期日</th>
                    <th class="col-md-1">状態</th>
                    <th class="col-md-1">コメント数</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($user_tasks as $user_task)
                    <tr>
                        <td><h4>【{!! link_to_route('user.tasks.show', $user_task->title, ['id' => Auth::id(),'task' => $user_task->id]) !!}】</h4><div style="overflow:hidden; text-overflow:ellipsis;">{{ $user_task->content }}</div></td>
                        <td style="vertical-align:middle">{{ $user_task->deadline }}</td>
                        <td style="vertical-align:middle"><?php if($user_task->status == 0 ) {
                            print ("進行前");
                            } elseif ($user_task->status == 1) {
                            print ("進行中");
                            } else {
                            print ("完了");
                            }
                            ?></td>
<td style="vertical-align:middle">counts</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    @endif
        </div>
    </div>


@endsection