@extends('layouts.app')

@section('title', 'Secure Checkout | Forest Fairy Honey')

@section('content')
<div class="breadcrumb-bar">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a> <span aria-hidden="true">/</span>
            <a href="/cart">Cart</a> <span aria-hidden="true">/</span>
            <span aria-current="page">Checkout</span>
        </nav>
    </div>
</div>

<section class="checkout-section section-padding">
    <div class="container">
        <h1 class="page-title animate-on-scroll">Secure Checkout</h1>

        <div class="checkout-layout">
            <!-- Left: Shipping & Details -->
            <div class="checkout-main animate-on-scroll">
                <div class="checkout-card">
                    <h2 class="card-title"><i class="fa-solid fa-location-dot"></i> Shipping Address</h2>
                    <p class="card-desc">Search for your New Zealand address to calculate shipping.</p>
                    
                    <div class="address-search-container">
                        <div class="input-group">
                            <input type="text" id="addressSearch" class="form-input" placeholder="Start typing your address..." autocomplete="off">
                            <i class="fa-solid fa-magnifying-glass search-icon"></i>
                            <div id="addressResults" class="address-results-dropdown hidden"></div>
                        </div>
                    </div>

                    <div id="selectedAddress" class="selected-address hidden">
                        <div class="address-details" id="addressDisplay"></div>
                        <button type="button" class="btn-text" id="changeAddressBtn">Change address</button>
                    </div>

                    <!-- Shipping Options -->
                    <div id="shippingOptionsContainer" class="shipping-options-section hidden">
                        <h3 class="section-subtitle">Select Shipping Method</h3>
                        <div class="shipping-grid" id="shippingGrid">
                            <!-- Populated via JS -->
                        </div>
                    </div>
                </div>

                <div class="checkout-actions">
                    <button type="button" id="proceedToPayment" class="btn-primary btn-full" disabled>
                        <i class="fa-solid fa-lock"></i> Go to Payment
                    </button>
                </div>
            </div>

            <!-- Right: Order Summary -->
            <aside class="checkout-sidebar animate-on-scroll">
                <div class="checkout-card summary-card">
                    <h2 class="card-title">Order Summary</h2>
                    <div class="summary-items">
                        @foreach($items as $item)
                        <div class="summary-item">
                            <div class="summary-item-info">
                                <span class="summary-item-name">{{ $item['name'] }}</span>
                                <span class="summary-item-meta">{{ $item['weight'] }} × {{ $item['quantity'] }}</span>
                            </div>
                            <span class="summary-item-price">${{ $item['total'] }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="summary-totals">
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>${{ number_format($subtotal / 100, 2) }}</span>
                        </div>
                        <div class="summary-row" id="shippingRow">
                            <span>Shipping</span>
                            <span id="shippingDisplay">Calculated next</span>
                        </div>
                        <div class="summary-row total-row">
                            <span>Total</span>
                            <span id="totalDisplay">${{ number_format($subtotal / 100, 2) }}</span>
                        </div>
                    </div>

                    <div class="checkout-trust">
                        <p><i class="fa-solid fa-shield-check"></i> 256-bit SSL Encrypted Payment</p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<style>
/* Checkout Layout */
.checkout-layout {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 40px;
    margin-top: 30px;
}

.checkout-card {
    background: white;
    padding: 30px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    margin-bottom: 24px;
    border: 1px solid var(--border-light);
}

.card-title {
    font-size: 1.4rem;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.card-title i { color: var(--gold); }
.card-desc { color: var(--text-muted); margin-bottom: 24px; font-size: 0.95rem; }

/* Address Search */
.address-search-container { position: relative; }
.input-group { position: relative; }
.form-input {
    width: 100%;
    padding: 14px 16px 14px 45px;
    border: 2px solid var(--border);
    border-radius: var(--radius);
    font-size: 1rem;
    transition: all 0.3s ease;
}
.form-input:focus { border-color: var(--gold); outline: none; box-shadow: 0 0 0 4px rgba(212, 168, 67, 0.1); }
.search-icon { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--text-muted); }

.address-results-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: white;
    border: 1px solid var(--border);
    border-radius: 0 0 var(--radius) var(--radius);
    box-shadow: var(--shadow-md);
    z-index: 100;
    max-height: 300px;
    overflow-y: auto;
}

.address-result {
    padding: 12px 16px;
    cursor: pointer;
    border-bottom: 1px solid var(--border-light);
}
.address-result:hover { background: #f9f6f0; }
.address-result:last-child { border-bottom: none; }

/* Selected Address */
.selected-address {
    padding: 16px;
    background: #f9f6f0;
    border-radius: var(--radius);
    border: 1px dashed var(--gold);
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.address-details { font-size: 0.95rem; line-height: 1.5; color: var(--text-dark); }
.btn-text { background: none; border: none; color: var(--gold); font-weight: 600; cursor: pointer; text-decoration: underline; }

/* Shipping Grid */
.shipping-grid {
    display: grid;
    gap: 12px;
    margin-top: 16px;
}
.shipping-option {
    border: 2px solid var(--border);
    padding: 16px;
    border-radius: var(--radius);
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.2s ease;
}
.shipping-option:hover { border-color: var(--gold-light); background: #fffcf8; }
.shipping-option.active { border-color: var(--gold); background: #fffcf8; }

.shipping-info { display: flex; flex-direction: column; gap: 4px; }
.shipping-name { font-weight: 600; color: var(--text-dark); }
.shipping-time { font-size: 0.8rem; color: var(--text-muted); }
.shipping-price { font-weight: 700; color: var(--gold); }

/* Summary */
.summary-items { margin-bottom: 24px; }
.summary-item {
    display: flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid var(--border-light);
}
.summary-item-info { display: flex; flex-direction: column; }
.summary-item-name { font-weight: 600; font-size: 0.95rem; }
.summary-item-meta { font-size: 0.8rem; color: var(--text-muted); }
.summary-item-price { font-weight: 600; }

.summary-totals { margin-top: 20px; }
.summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    color: var(--text-muted);
}
.total-row {
    border-top: 2px solid var(--border-light);
    padding-top: 15px;
    margin-top: 15px;
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--brown);
}

.checkout-trust {
    margin-top: 30px;
    text-align: center;
    font-size: 0.8rem;
    color: var(--text-muted);
}
.stripe-badge { height: 25px; margin-bottom: 10px; opacity: 0.7; }

@media (max-width: 992px) {
    .checkout-layout { grid-template-columns: 1fr; }
    .checkout-sidebar { order: -1; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const subtotal = {{ $subtotal }}; // in cents
    const addressSearch = document.getElementById('addressSearch');
    const addressResults = document.getElementById('addressResults');
    const selectedAddress = document.getElementById('selectedAddress');
    const addressDisplay = document.getElementById('addressDisplay');
    const changeAddressBtn = document.getElementById('changeAddressBtn');
    const shippingOptionsContainer = document.getElementById('shippingOptionsContainer');
    const shippingGrid = document.getElementById('shippingGrid');
    const proceedBtn = document.getElementById('proceedToPayment');
    
    let currentAddressId = null;
    let selectedShipping = null;

    // 1. Address Autocomplete
    let searchTimeout;
    addressSearch.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const q = this.value.trim();
        if (q.length < 3) {
            addressResults.classList.add('hidden');
            return;
        }

        searchTimeout = setTimeout(() => {
            fetch(`/address/search?q=${encodeURIComponent(q)}`)
                .then(res => res.json())
                .then(data => {
                    addressResults.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(addr => {
                            const div = document.createElement('div');
                            div.className = 'address-result';
                            div.textContent = addr.full_address;
                            div.addEventListener('click', () => selectAddress(addr));
                            addressResults.appendChild(div);
                        });
                        addressResults.classList.remove('hidden');
                    } else {
                        addressResults.classList.add('hidden');
                    }
                });
        }, 300);
    });

    function selectAddress(addr) {
        currentAddressId = addr.address_id;
        addressSearch.value = addr.full_address;
        addressResults.classList.add('hidden');
        
        // Fetch full details to check for Rural/Standard
        fetch(`/address/details/${addr.address_id}`)
            .then(res => res.json())
            .then(details => {
                const isRural = details.is_rural || false;
                showShippingOptions(isRural);
                
                addressDisplay.innerHTML = `<strong>${addr.full_address}</strong>`;
                addressSearch.closest('.address-search-container').classList.add('hidden');
                selectedAddress.classList.remove('hidden');
            });
    }

    changeAddressBtn.addEventListener('click', () => {
        selectedAddress.classList.add('hidden');
        addressSearch.closest('.address-search-container').classList.remove('hidden');
        shippingOptionsContainer.classList.add('hidden');
        proceedBtn.disabled = true;
        updateTotals(0);
    });

    // 2. Shipping Options
    function showShippingOptions(isRural) {
        shippingGrid.innerHTML = '';
        
        const options = [];
        const isFreeShipping = subtotal >= 7500;

        if (isFreeShipping) {
            options.push({
                id: 'free',
                name: 'Free NZ Shipping',
                time: '2-4 business days',
                price: 0
            });
        } else {
            const basePrice = isRural ? 12.50 : 7.50;
            const typeName = isRural ? 'Rural NZ Delivery' : 'Standard NZ Delivery';
            
            options.push({
                id: isRural ? 'rural' : 'standard',
                name: typeName,
                time: '2-3 business days',
                price: basePrice
            });
        }

        options.forEach(opt => {
            const div = document.createElement('div');
            div.className = 'shipping-option';
            div.innerHTML = `
                <div class="shipping-info">
                    <span class="shipping-name">${opt.name}</span>
                    <span class="shipping-time">${opt.time}</span>
                </div>
                <span class="shipping-price">${opt.price === 0 ? 'FREE' : '$' + opt.price.toFixed(2)}</span>
            `;
            div.addEventListener('click', () => {
                document.querySelectorAll('.shipping-option').forEach(el => el.classList.remove('active'));
                div.classList.add('active');
                selectedShipping = opt;
                proceedBtn.disabled = false;
                updateTotals(opt.price);
            });
            shippingGrid.appendChild(div);
        });

        shippingOptionsContainer.classList.remove('hidden');
    }

    function updateTotals(shippingPrice) {
        const shippingDisplay = document.getElementById('shippingDisplay');
        const totalDisplay = document.getElementById('totalDisplay');
        
        shippingDisplay.textContent = shippingPrice === 0 ? 'FREE' : '$' + shippingPrice.toFixed(2);
        const total = (subtotal / 100) + shippingPrice;
        totalDisplay.textContent = '$' + total.toFixed(2);
    }

    // 3. Handoff to Stripe
    proceedBtn.addEventListener('click', function() {
        this.disabled = true;
        this.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Processing...';

        fetch('{{ route('checkout.prepare') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                address_id: currentAddressId,
                shipping_type: selectedShipping.name,
                shipping_amount: selectedShipping.price
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.url) {
                window.location.href = data.url;
            } else {
                alert('Checkout failed. Please try again.');
                this.disabled = false;
                this.textContent = 'Go to Payment';
            }
        })
        .catch(err => {
            console.error(err);
            alert('Something went wrong.');
            this.disabled = false;
        });
    });
});
</script>
@endsection
