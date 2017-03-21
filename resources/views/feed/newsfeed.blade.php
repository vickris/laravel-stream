@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($activities)
            <div class="panel panel-default">
                <div class="panel-heading">
                    News Feed
                </div>

                <div class="panel-body">
                    @foreach ($activities as $activity)
                        @include('stream-laravel::render_activity', array('activity'=>$activity))
                    @endforeach
                </div>
            </div>
        @else
        <p>You are not following anyone.Follow other users <a href="/users">here</a> in order to see their activities</p>
        @endif
    </div>
@endsection
