@extends('layouts.app')

@section('content')
    
    @if (count($grouplist) > 0)

<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-md-8">グループ名</th>
            <th class="col-md-2">参加日</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($grouplist as $group)
            <tr>
                <td>{!! link_to_route('groups.show', $group->group_name, ['id' => $group->id]) !!}</td>
                <td>{{ $group->created_at }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
    @endif

@endsection