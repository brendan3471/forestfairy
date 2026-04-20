@extends('admin.layout')

@section('content')
<div class="page-header">
    <div style="display: flex; align-items: center; gap: 16px;">
        <a href="{{ route('admin.orders.show', $order) }}" style="color: var(--text-muted);"><i class="fa-solid fa-arrow-left"></i></a>
        <h1 class="page-title">Tracking: Order #{{ $order->id }}</h1>
    </div>
    <div>
        <span class="status-badge status-shipped">
            {{ $order->tracking_number }}
        </span>
    </div>
</div>

<div class="card">
    <h3 style="margin-bottom: 24px;"><i class="fa-solid fa-truck-fast"></i> Real-time Tracking Status</h3>
    
    @if(isset($tracking['events']) && count($tracking['events']) > 0)
        <div class="tracking-timeline">
            @foreach($tracking['events'] as $event)
                <div class="tracking-event">
                    <div class="event-time">
                        <div class="date">{{ \Carbon\Carbon::parse($event['datetime'])->format('d M') }}</div>
                        <div class="time">{{ \Carbon\Carbon::parse($event['datetime'])->format('H:i') }}</div>
                    </div>
                    <div class="event-marker">
                        <div class="marker-line"></div>
                        <div class="marker-dot {{ $loop->first ? 'active' : '' }}"></div>
                    </div>
                    <div class="event-details">
                        <div class="event-description">{{ $event['description'] }}</div>
                        <div class="event-location">{{ $event['location'] ?? 'New Zealand' }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div style="padding: 40px; text-align: center; color: var(--text-muted);">
            <i class="fa-solid fa-hourglass-start" style="font-size: 2rem; margin-bottom: 16px; display: block;"></i>
            No tracking events found yet. This usually means the parcel was just recently booked.
        </div>
    @endif
</div>

<style>
.tracking-timeline {
    padding: 20px 0;
}

.tracking-event {
    display: flex;
    gap: 24px;
    margin-bottom: 0;
}

.event-time {
    width: 60px;
    text-align: right;
    flex-shrink: 0;
}

.event-time .date {
    font-weight: 700;
    font-size: 0.9rem;
    color: var(--text-dark);
}

.event-time .time {
    font-size: 0.8rem;
    color: var(--text-muted);
}

.event-marker {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    width: 20px;
}

.marker-line {
    width: 2px;
    background: var(--border);
    flex-grow: 1;
    position: absolute;
    top: 0;
    bottom: 0;
}

.tracking-event:last-child .marker-line {
    background: transparent;
}

.marker-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: var(--border);
    border: 2px solid white;
    z-index: 1;
    margin-top: 5px;
}

.marker-dot.active {
    background: var(--gold);
    box-shadow: 0 0 0 4px rgba(212, 168, 67, 0.2);
}

.event-details {
    padding-bottom: 32px;
}

.event-description {
    font-weight: 600;
    font-size: 1rem;
    color: var(--text-dark);
    margin-bottom: 4px;
}

.event-location {
    font-size: 0.85rem;
    color: var(--text-muted);
}
</style>
@endsection
