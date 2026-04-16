@extends('admin.layout')

@section('content')
<div class="page-header">
    <h1 class="page-title">Orders</h1>
</div>

<div class="card">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Shipping</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td style="font-weight: 600;">#{{ $order->id }}</td>
                    <td>
                        <div style="font-weight: 500;">{{ $order->customer_name }}</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted);">{{ $order->customer_email }}</div>
                    </td>
                    <td style="font-weight: 600;">${{ number_format($order->total_amount / 100, 2) }}</td>
                    <td>
                        <span class="status-badge status-{{ $order->payment_status === 'paid' ? 'paid' : 'pending' }}">
                            {{ $order->payment_status }}
                        </span>
                    </td>
                    <td>
                        <span class="status-badge status-{{ $order->shipping_status }}">
                            {{ $order->shipping_status }}
                        </span>
                    </td>
                    <td style="color: var(--text-muted); font-size: 0.85rem;">
                        {{ $order->created_at->format('M d, Y') }}
                    </td>
                    <td style="text-align: right;">
                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-primary" style="padding: 6px 14px; font-size: 0.8rem;">
                            View
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 40px; color: var(--text-muted);">
                        No orders found yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top: 24px;">
        {{ $orders->links() }}
    </div>
</div>
@endsection
