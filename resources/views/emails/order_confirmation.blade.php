<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Order Confirmation</title>
</head>
<body style="margin: 0; padding: 0; background-color: #FAF7F2; font-family: 'Inter', system-ui, -apple-system, sans-serif; color: #3D2B1A; -webkit-font-smoothing: antialiased;">

    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #FAF7F2; padding: 40px 20px;">
        <tr>
            <td align="center">
                <!-- Inner Container Card -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #FFFFFF; border: 1px solid #F3EDE1; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(44, 24, 16, 0.05);">
                    
                    <!-- Header Banner -->
                    <tr>
                        <td align="center" style="background-color: #2C1810; padding: 35px 40px; border-bottom: 3px solid #D4A843;">
                            <h1 style="margin: 0; font-family: 'Playfair Display', Georgia, serif; font-size: 24px; font-weight: normal; color: #FAF7F2; letter-spacing: 0.05em;">Forest Fairy Honey</h1>
                        </td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td style="padding: 40px 40px 30px 40px;">
                            <p style="font-size: 16px; line-height: 1.6; margin-top: 0; margin-bottom: 20px; color: #3D2B1A;">Hi {{ $firstName }},</p>
                            
                            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 25px; color: #3D2B1A;">Thank you for your order! We've received it and are busy packing your jar of raw, small batch honey to get it shipped to you as soon as possible.</p>
                            
                            <!-- Order Summary Heading -->
                            <h3 style="font-family: 'Playfair Display', Georgia, serif; font-size: 18px; margin-top: 0; margin-bottom: 15px; color: #2C1810; font-weight: normal; border-bottom: 1px solid #F3EDE1; padding-bottom: 8px;">Order Details (Order #{{ $order->id }})</h3>

                            <!-- Order Items Table -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 25px;">
                                <thead>
                                    <tr style="border-bottom: 2px solid #F3EDE1;">
                                        <th align="left" style="padding: 10px 0; font-size: 14px; color: #7A6552; border-bottom: 2px solid #F3EDE1;">Item</th>
                                        <th align="center" style="padding: 10px 0; font-size: 14px; color: #7A6552; border-bottom: 2px solid #F3EDE1; width: 60px;">Qty</th>
                                        <th align="right" style="padding: 10px 0; font-size: 14px; color: #7A6552; border-bottom: 2px solid #F3EDE1; width: 80px;">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                    <tr>
                                        <td style="padding: 12px 0; font-size: 15px; border-bottom: 1px solid #F3EDE1; color: #3D2B1A;">
                                            <strong>{{ $item->product_name }}</strong>
                                        </td>
                                        <td align="center" style="padding: 12px 0; font-size: 15px; border-bottom: 1px solid #F3EDE1; color: #3D2B1A;">{{ $item->quantity }}</td>
                                        <td align="right" style="padding: 12px 0; font-size: 15px; border-bottom: 1px solid #F3EDE1; color: #3D2B1A;">${{ number_format($item->unit_price * $item->quantity / 100, 2) }}</td>
                                    </tr>
                                    @endforeach
                                    
                                    <!-- Subtotal / Shipping / Total -->
                                    <tr>
                                        <td colspan="2" align="right" style="padding: 12px 0 6px 0; font-size: 14px; color: #7A6552;">Subtotal:</td>
                                        <td align="right" style="padding: 12px 0 6px 0; font-size: 14px; color: #3D2B1A;">${{ number_format(($order->total_amount - $order->shipping_amount) / 100, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right" style="padding: 6px 0; font-size: 14px; color: #7A6552;">Shipping:</td>
                                        <td align="right" style="padding: 6px 0; font-size: 14px; color: #3D2B1A;">
                                            @if($order->shipping_amount == 0)
                                                Free
                                            @else
                                                ${{ number_format($order->shipping_amount / 100, 2) }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right" style="padding: 6px 0 12px 0; font-size: 16px; font-weight: bold; color: #2C1810;">Total:</td>
                                        <td align="right" style="padding: 6px 0 12px 0; font-size: 16px; font-weight: bold; color: #2C1810; border-top: 1px solid #F3EDE1;">${{ number_format($order->total_amount / 100, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            @if($shippingAddressDecoded)
                            <!-- Shipping Info -->
                            <h3 style="font-family: 'Playfair Display', Georgia, serif; font-size: 18px; margin-top: 20px; margin-bottom: 15px; color: #2C1810; font-weight: normal; border-bottom: 1px solid #F3EDE1; padding-bottom: 8px;">Shipping Address</h3>
                            <p style="font-size: 14px; line-height: 1.6; margin-top: 0; margin-bottom: 25px; color: #3D2B1A; background-color: #FAF7F2; padding: 15px; border-radius: 8px; border: 1px solid #F3EDE1;">
                                <strong>{{ $shippingAddressDecoded['name'] ?? $order->customer_name }}</strong><br>
                                {{ $shippingAddressDecoded['address']['line1'] ?? '' }}<br>
                                @if(!empty($shippingAddressDecoded['address']['line2']))
                                    {{ $shippingAddressDecoded['address']['line2'] }}<br>
                                @endif
                                {{ $shippingAddressDecoded['address']['city'] ?? '' }} {{ $shippingAddressDecoded['address']['postal_code'] ?? '' }}<br>
                                New Zealand
                            </p>
                            @endif

                            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 25px; color: #3D2B1A;">If you have any questions about your delivery or would like to add special instructions, please reply directly to this email and we'll help you out.</p>
                            
                            <p style="font-size: 16px; line-height: 1.5; margin-bottom: 0; color: #2C1810; font-weight: 600;">
                                Forest Fairy Honey Team<br>
                                <span style="font-size: 14px; font-weight: normal; color: #7A6552;">Forest Fairy Honey</span>
                            </p>
                        </td>
                    </tr>

                    <!-- Footer Note -->
                    <tr>
                        <td align="center" style="padding: 20px 40px 30px 40px; background-color: #FAF7F2; border-top: 1px solid #F3EDE1;">
                            <p style="font-size: 12px; line-height: 1.5; color: #A08C7C; margin: 0;">
                                You are receiving this email because you made a purchase on forestfairyhoney.co.nz.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
