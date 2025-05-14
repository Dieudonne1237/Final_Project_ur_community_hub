@php
$today = now()->startOfDay();
$eventDate = \Carbon\Carbon::parse($event->event_date)->startOfDay();

if ($eventDate->lt($today)) {
    $status = 'Ended';
    $statusClass = 'bg-danger text-white';
} elseif ($eventDate->eq($today)) {
    $status = 'Ongoing';
    $statusClass = 'bg-success text-white';
} else {
    $status = 'Upcoming';
    $statusClass = 'bg-primary text-white';
}
@endphp
