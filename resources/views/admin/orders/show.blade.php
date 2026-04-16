@extends('admin.layout')

@section('content')
<div class="page-header">
    <div style="display: flex; align-items: center; gap: 16px;">
        <a href="{{ route('admin.orders.index') }}" style="color: var(--text-muted);"><i class="fa-solid fa-arrow-left"></i></a>
        <h1 class="page-title">Order #{{ $order->id }}</h1>
    </div>
    <div>
        <span class="status-badge status-{{ $order->payment_status === 'paid' ? 'paid' : 'pending' }}" style="font-size: 1rem; padding: 8px 16px;">
            Payment: {{ $order->payment_status }}
        </span>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
    <!-- Items & Updates -->
    <div>
        <div class="card">
            <h3 style="margin-bottom: 20px;">Order Items</h3>
            <table style="border: none;">
                <thead>
                    <tr style="border: none;">
                        <th style="padding-left: 0;">Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th style="text-align: right; padding-right: 0;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td style="padding-left: 0;">
                            <div style="font-weight: 600;">{{ $item->product_name }}</div>
                            <div style="font-size: 0.8rem; color: var(--text-muted);">{{ $item->product_slug }}</div>
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->unit_price / 100, 2) }}</td>
                        <td style="text-align: right; font-weight: 600; padding-right: 0;">
                            ${{ number_format(($item->unit_price * $item->quantity) / 100, 2) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right; padding-top: 24px; border: none; color: var(--text-muted);">Subtotal</td>
                        <td style="text-align: right; padding-top: 24px; border: none; font-weight: 600;">
                            ${{ number_format(($order->total_amount - $order->shipping_amount) / 100, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right; border: none; color: var(--text-muted);">Shipping</td>
                        <td style="text-align: right; border: none; font-weight: 600;">
                            ${{ number_format($order->shipping_amount / 100, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right; border: none; font-size: 1.2rem; font-weight: 700; padding-top: 12px;">Total</td>
                        <td style="text-align: right; border: none; font-size: 1.2rem; font-weight: 700; padding-top: 12px; color: var(--brown);">
                            ${{ number_format($order->total_amount / 100, 2) }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="card">
            <h3 style="margin-bottom: 20px;">Process Order (Shipping)</h3>
            <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Status</label>
                        <select name="shipping_status" style="width: 100%; padding: 12px; border: 1px solid var(--border); border-radius: var(--radius);">
                            <option value="pending" {{ $order->shipping_status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processed" {{ $order->shipping_status === 'processed' ? 'selected' : '' }}>Processed</option>
                            <option value="shipped" {{ $order->shipping_status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $order->shipping_status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Tracking Number</label>
                        <input type="text" name="tracking_number" value="{{ $order->tracking_number }}" placeholder="e.g. NZ12345678" style="width: 100%; padding: 12px; border: 1px solid var(--border); border-radius: var(--radius);">
                    </div>
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Tracking URL</label>
                    <input type="url" name="tracking_url" value="{{ $order->tracking_url }}" placeholder="https://..." style="width: 100%; padding: 12px; border: 1px solid var(--border); border-radius: var(--radius);">
                </div>
                <button type="submit" class="btn btn-primary">Update Status & Tracking</button>
            </form>
        </div>
    </div>

    <!-- Customer & Shipping Detail -->
    <div>
        <div class="card">
            <h3 style="margin-bottom: 20px;">Customer</h3>
            <div style="margin-bottom: 8px; font-weight: 600;">{{ $order->customer_name }}</div>
            <div style="color: var(--text-muted); font-size: 0.9rem;">{{ $order->customer_email }}</div>
        </div>

        <div class="card">
            <h3 style="margin-bottom: 20px;">Shipping Address</h3>
            @php $ship = json_decode($order->shipping_address, true); @endphp
            @if($ship && isset($ship['address']))
                <div style="font-size: 0.95rem; line-height: 1.6;">
                    {{ $ship['name'] ?? $order->customer_name }}<br>
                    {{ $ship['address']['line1'] }}<br>
                    @if($ship['address']['line2']){{ $ship['address']['line2'] }}<br>@endif
                    {{ $ship['address']['city'] }}, {{ $ship['address']['postal_code'] }}<br>
                    {{ $ship['address']['country'] }}
                </div>
            @else
                <div style="color: var(--text-muted);">No address details provided via Stripe.</div>
            @endif
        </div>

        <div class="card" style="background: var(--dark); color: white;">
            <h3 style="margin-bottom: 12px; color: var(--gold);">Stripe Info</h3>
            <div style="font-size: 0.8rem; opacity: 0.7; margin-bottom: 4px;">Session ID</div>
            <div style="font-size: 0.75rem; word-break: break-all; opacity: 0.9;">{{ $order->stripe_session_id }}</div>
        </div>
    </div>
</div>
@endsection
