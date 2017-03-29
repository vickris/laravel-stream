<div class="well well-sm">
    <p><small class="text-muted">{{ date('F j, Y, g:i a', strtotime($activity['time'])) }}</small></p>
    <p><strong>{{ $activity['actor']['name'] }}</strong> is now friends with <strong>{{ $activity['followed']['name'] }}</strong></p>
</div>
