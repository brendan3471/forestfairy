@extends('admin.layout')

@section('content')
<div class="page-header">
    <h1 class="page-title">Reviews Moderation</h1>
</div>

@if(session('success'))
<div style="background-color: #E6F7ED; color: #7EB87A; padding: 12px 20px; border-radius: var(--radius); margin-bottom: 20px; font-weight: 500; display: flex; align-items: center; gap: 8px;">
    <i class="fa-solid fa-circle-check"></i>
    {{ session('success') }}
</div>
@endif

<div class="card">
    <div style="background-color: #FAF7F2; border: 1px solid var(--border); border-radius: var(--radius); padding: 15px; margin-bottom: 25px; font-size: 0.9rem; line-height: 1.5; color: var(--text-muted);">
        <strong><i class="fa-solid fa-circle-info" style="color: var(--gold); margin-right: 5px;"></i> Food Safety Compliance Reminder:</strong><br>
        Please review submissions carefully to ensure they do not mention medical or health claims (e.g. "cured my cough", "healed my sore throat", "treats infections"). Reviews discussing taste, texture, pairings, and general satisfaction are perfect for approval!
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Rating</th>
                    <th>Reviewer</th>
                    <th style="width: 35%;">Comment</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th style="text-align: right; width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reviews as $review)
                <tr>
                    <td>
                        <div style="font-weight: 500; color: var(--text);">
                            {{ ucwords(str_replace('-', ' ', $review->product_slug)) }}
                        </div>
                    </td>
                    <td>
                        <div style="color: var(--gold-dark); font-size: 0.85rem; white-space: nowrap;">
                            {!! str_repeat('<i class="fa-solid fa-star"></i>', $review->rating) . str_repeat('<i class="fa-regular fa-star"></i>', 5 - $review->rating) !!}
                        </div>
                    </td>
                    <td style="font-weight: 500;">
                        {{ $review->reviewer_name }}
                    </td>
                    <td style="font-size: 0.88rem; color: var(--text); line-height: 1.4; vertical-align: top; padding-top: 16px;">
                        @if($review->comment)
                            {{ $review->comment }}
                        @else
                            <em style="color: var(--text-muted);">No text review.</em>
                        @endif
                    </td>
                    <td>
                        <span class="status-badge" style="
                            display: inline-block;
                            padding: 4px 12px;
                            border-radius: 50px;
                            font-size: 0.75rem;
                            font-weight: 600;
                            text-transform: capitalize;
                            @if($review->status === 'approved')
                                background: #E6F7ED; color: #7EB87A;
                            @elseif($review->status === 'rejected')
                                background: #FDE8E8; color: #E53E3E;
                            @else
                                background: #FFF9E6; color: #D4A843;
                            @endif
                        ">
                            {{ $review->status }}
                        </span>
                    </td>
                    <td style="color: var(--text-muted); font-size: 0.82rem;">
                        {{ $review->created_at->format('M d, Y') }}
                    </td>
                    <td style="text-align: right; white-space: nowrap;">
                        @if($review->status === 'pending')
                            <form action="{{ route('admin.reviews.approve', $review) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-primary" style="padding: 6px 12px; font-size: 0.78rem; background: #7EB87A; color: white;">
                                    Approve
                                </button>
                            </form>
                            <form action="{{ route('admin.reviews.reject', $review) }}" method="POST" style="display: inline-block; margin-left: 4px;">
                                @csrf
                                <button type="submit" class="btn" style="padding: 6px 12px; font-size: 0.78rem; background: #E53E3E; color: white;">
                                    Reject
                                </button>
                            </form>
                        @elseif($review->status === 'approved')
                            <form action="{{ route('admin.reviews.reject', $review) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn" style="padding: 6px 12px; font-size: 0.78rem; background: #E53E3E; color: white;">
                                    Reject
                                </button>
                            </form>
                        @elseif($review->status === 'rejected')
                            <form action="{{ route('admin.reviews.approve', $review) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-primary" style="padding: 6px 12px; font-size: 0.78rem; background: #7EB87A; color: white;">
                                    Approve
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 40px; color: var(--text-muted);">
                        No reviews submitted yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($reviews->hasPages())
    <div style="margin-top: 24px;">
        {{ $reviews->links() }}
    </div>
    @endif
</div>
@endsection
