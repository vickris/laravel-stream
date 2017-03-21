@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($activities)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Notification feed
                </div>

                <div class="panel-body">
                    @foreach ($activities as $activity)
                        @foreach ($activity['activities'] as $activity)
                            @include('stream-laravel::render_activity', array('aggregated_activity'=>$activity, 'prefix'=>'notification'))
                        @endforeach
                    @endforeach
                </div>
            </div>
        @else
        <p>You don't have any follow activities</p>
        @endif
    </div>
@endsection
