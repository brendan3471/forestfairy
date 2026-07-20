@extends('admin.layout')

@section('content')
<div class="page-header">
    <h1 class="page-title">Stock Management</h1>
</div>

@if(session('success'))
<div style="background: #E6F7ED; border: 1px solid #7EB87A; color: #2C1810; padding: 16px; border-radius: var(--radius); margin-bottom: 24px; display: flex; align-items: center; gap: 10px;">
    <i class="fa-solid fa-circle-check" style="color: #7EB87A; font-size: 1.2rem;"></i>
    <span>{{ session('success') }}</span>
</div>
@endif

<form action="{{ route('admin.stock.update') }}" method="POST">
    @csrf
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <p style="margin: 0; color: var(--text-muted); font-size: 0.95rem;">
                Manage available stock for each honey product variant. Items with fewer than 10 units will display low stock notices to customers.
            </p>
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-floppy-disk"></i> Update Stock
            </button>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Variant / Weight</th>
                        <th>SKU</th>
                        <th>Status</th>
                        <th>Quantity in Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $slug => $prod)
                        @foreach($prod['options'] as $weight => $opt)
                            @php
                                $sku = $opt['sku'];
                                $stockRecord = $stocks[$sku] ?? null;
                                $stockQty = $stockRecord ? $stockRecord->stock : 50;
                            @endphp
                            <tr>
                                <td>
                                    <strong>{{ $prod['name'] }}</strong>
                                </td>
                                <td>
                                    <span style="background: var(--cream); padding: 4px 10px; border-radius: 6px; font-weight: 500;">
                                        {{ $weight }}
                                    </span>
                                </td>
                                <td>
                                    <code style="background: #F3F4F6; padding: 2px 6px; border-radius: 4px; color: #4B5563; font-size: 0.85rem;">{{ $sku }}</code>
                                </td>
                                <td>
                                    @if($stockQty == 0)
                                        <span class="status-badge" style="background: #FEE2E2; color: #DC2626;">
                                            <i class="fa-solid fa-circle-xmark"></i> Sold Out
                                        </span>
                                    @elseif($stockQty < 10)
                                        <span class="status-badge" style="background: #FEF3C7; color: #B45309;">
                                            <i class="fa-solid fa-triangle-exclamation"></i> Low Stock ({{ $stockQty }} left)
                                        </span>
                                    @else
                                        <span class="status-badge status-paid">
                                            <i class="fa-solid fa-check"></i> In Stock ({{ $stockQty }})
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <input type="number" 
                                           name="stocks[{{ $sku }}]" 
                                           value="{{ $stockQty }}" 
                                           min="0" 
                                           style="width: 100px; padding: 8px 12px; border: 1px solid var(--border); border-radius: 8px; font-size: 0.95rem; font-weight: 600;">
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top: 24px; text-align: right;">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-floppy-disk"></i> Update Stock
            </button>
        </div>
    </div>
</form>
@endsection
