@extends('admin.layout')

@section('content')
<div style="display: flex; align-items: center; justify-content: center; min-height: 80vh;">
    <div class="card" style="width: 100%; max-width: 400px; padding: 40px;">
        <div style="text-align: center; margin-bottom: 32px;">
            <h1 style="font-family: 'Playfair Display', serif; margin-bottom: 8px;">Admin Login</h1>
            <p style="color: var(--text-muted); font-size: 0.9rem;">Forest Fairy Honey Management</p>
        </div>

        @if($errors->any())
            <div style="background: #FFF5F5; color: #C53030; padding: 12px; border-radius: var(--radius); margin-bottom: 20px; font-size: 0.85rem;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.authenticate') }}" method="POST">
            @csrf
            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Email Address</label>
                <input type="email" name="email" id="email" required style="width: 100%; padding: 12px; border: 1px solid var(--border); border-radius: var(--radius); font-size: 0.95rem;" value="{{ old('email') }}">
            </div>

            <div style="margin-bottom: 32px;">
                <label for="password" style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Password</label>
                <input type="password" name="password" id="password" required style="width: 100%; padding: 12px; border: 1px solid var(--border); border-radius: var(--radius); font-size: 0.95rem;">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 14px;">Log In</button>
        </form>
    </div>
</div>
@endsection
