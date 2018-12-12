@extends('layouts.app')

@section('content')
    <div class="text-center">
        {{ $group->group_name }}
            <h3>タスク一覧</h3>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    @if (count($grouptasks) > 0)
        <table class="table table-striped table-condensed table-hover">
            <thead>
                <tr>
                    <th class="col-md-7">タスク名</th>
                    <th class="col-md-2">期日</th>
                    <th class="col-m">状態</th>
                    <th class="col-md-1">コメント数</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($grouptasks as $grouptask)
                    <tr>
                        <td>{!! link_to_route('users.show', $grouptask->title, ['id' => Auth::id()]) !!}</td>
                        <td>{{ $grouptask->deadline }}</td>
                        <td><?php if($grouptask->status == 0 ) {
                            print ("進行前");
                            } elseif ($grouptask->status == 1) {
                            print ("進行中");
                            } else {
                            print ("完了");
                            }
                            ?></td>
                        <td>counts</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    @endif
        </div>
    </div>


@endsection