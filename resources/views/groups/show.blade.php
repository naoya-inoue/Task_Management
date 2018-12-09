@extends('layouts.app')

@section('content')
<div class="text-center">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
//テーブルに変更しても良いかも
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
            @include('user_group_join.group_join_button', ['user' => $user])
            
            OK
            
            </div>
        </div>
            



@endsection