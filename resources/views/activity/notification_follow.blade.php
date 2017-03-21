<div class="well well-sm">
    <p><small class="text-muted">{{ date('F j, Y, g:i a', strtotime($activity['time'])) }}</small></p>
    <p>You are now friends with <strong>{{ $activity['follower']['name'] }}</strong></p>
</div>
