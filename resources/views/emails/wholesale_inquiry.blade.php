<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Wholesale Inquiry</title>
</head>
<body style="margin: 0; padding: 0; background-color: #FAF7F2; font-family: 'Inter', system-ui, -apple-system, sans-serif; color: #3D2B1A; -webkit-font-smoothing: antialiased;">

    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #FAF7F2; padding: 40px 20px;">
        <tr>
            <td align="center">
                <!-- Inner Container Card -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #FFFFFF; border: 1px solid #F3EDE1; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(44, 24, 16, 0.05);">
                    
                    <!-- Header Banner -->
                    <tr>
                        <td align="center" style="background-color: #2C1810; padding: 30px 40px; border-bottom: 3px solid #D4A843;">
                            <h1 style="margin: 0; font-family: 'Playfair Display', Georgia, serif; font-size: 22px; font-weight: normal; color: #FAF7F2; letter-spacing: 0.05em;">New Wholesale / Bulk Order Inquiry</h1>
                        </td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td style="padding: 40px;">
                            <p style="font-size: 16px; line-height: 1.6; margin-top: 0; margin-bottom: 25px; color: #3D2B1A;">You have received a new bulk order lead from the Wholesale page on Forest Fairy Honey.</p>
                            
                            <!-- Sender Details Table -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 30px; border: 1px solid #F3EDE1; border-radius: 8px; overflow: hidden; background-color: #FAF7F2;">
                                <tr>
                                    <td style="padding: 12px 15px; border-bottom: 1px solid #F3EDE1; font-weight: bold; width: 140px; font-size: 14px; color: #7A6552;">Business Name:</td>
                                    <td style="padding: 12px 15px; border-bottom: 1px solid #F3EDE1; font-size: 14px; color: #3D2B1A;">{{ $data['business_name'] ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 15px; border-bottom: 1px solid #F3EDE1; font-weight: bold; font-size: 14px; color: #7A6552;">Contact Name:</td>
                                    <td style="padding: 12px 15px; border-bottom: 1px solid #F3EDE1; font-size: 14px; color: #3D2B1A;">{{ $data['contact_name'] ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 15px; border-bottom: 1px solid #F3EDE1; font-weight: bold; font-size: 14px; color: #7A6552;">Email Address:</td>
                                    <td style="padding: 12px 15px; border-bottom: 1px solid #F3EDE1; font-size: 14px; color: #3D2B1A;"><a href="mailto:{{ $data['email'] }}" style="color: #B88A2A; text-decoration: underline;">{{ $data['email'] }}</a></td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 15px; border-bottom: 1px solid #F3EDE1; font-weight: bold; font-size: 14px; color: #7A6552;">Phone Number:</td>
                                    <td style="padding: 12px 15px; border-bottom: 1px solid #F3EDE1; font-size: 14px; color: #3D2B1A;">{{ $data['phone'] ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 15px; border-bottom: 1px solid #F3EDE1; font-weight: bold; font-size: 14px; color: #7A6552;">Estimated Qty:</td>
                                    <td style="padding: 12px 15px; border-bottom: 1px solid #F3EDE1; font-size: 14px; color: #3D2B1A; font-weight: bold; color: #B88A2A;">{{ $data['estimated_qty'] ?? 'N/A' }}</td>
                                </tr>
                                @if(!empty($data['products']))
                                <tr>
                                    <td style="padding: 12px 15px; font-weight: bold; font-size: 14px; color: #7A6552;">Products Interested:</td>
                                    <td style="padding: 12px 15px; font-size: 14px; color: #3D2B1A;">{{ implode(', ', $data['products']) }}</td>
                                </tr>
                                @endif
                            </table>

                            @if(!empty($data['notes']))
                            <!-- Notes Content -->
                            <h3 style="font-family: 'Playfair Display', Georgia, serif; font-size: 18px; margin-top: 0; margin-bottom: 15px; color: #2C1810; font-weight: normal; border-bottom: 1px solid #F3EDE1; padding-bottom: 8px;">Additional Notes:</h3>
                            <div style="font-size: 15px; line-height: 1.6; color: #3D2B1A; white-space: pre-wrap; background-color: #FAF7F2; padding: 20px; border-radius: 8px; border: 1px solid #F3EDE1;">
                                {{ $data['notes'] }}
                            </div>
                            @endif
                        </td>
                    </tr>

                    <!-- Footer Note -->
                    <tr>
                        <td align="center" style="padding: 20px 40px 30px 40px; background-color: #FAF7F2; border-top: 1px solid #F3EDE1;">
                            <p style="font-size: 12px; line-height: 1.5; color: #A08C7C; margin: 0;">
                                This email was generated automatically by the Forest Fairy Honey wholesale form. Click reply to respond directly to {{ $data['contact_name'] ?? 'the sender' }}.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
