<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Carrier Onboarding Lead</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #070B14; color: #F8FAFC; padding: 30px; margin: 0;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #0C1426; border: 1px solid #1E293B; border-radius: 14px; padding: 28px;">
        <h2 style="color: #00A3FF; margin-top: 0; font-size: 20px; text-transform: uppercase; letter-spacing: 0.05em;">
            Supernova Dispatch — New Carrier Lead
        </h2>
        <p style="color: #94A3B8; font-size: 14px; margin-bottom: 20px;">
            A carrier just submitted their fleet setup details on your website:
        </p>

        <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
            <tr>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #94A3B8; width: 40%;">Full Name:</td>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #FFFFFF; font-weight: bold;">{{ $leadData['full_name'] }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #94A3B8;">Company / Carrier:</td>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #FFFFFF;">{{ $leadData['company_name'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #94A3B8;">Phone Number:</td>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #38BDF8; font-weight: bold;">{{ $leadData['phone'] }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #94A3B8;">Email Address:</td>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #FFFFFF;">{{ $leadData['email'] }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #94A3B8;">MC / DOT Number:</td>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #F59E0B; font-weight: bold;">{{ $leadData['mc_number'] ?? 'Not Provided' }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #94A3B8;">Equipment Type:</td>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #FFFFFF; font-weight: bold;">{{ $leadData['equipment_type'] }}</td>
            </tr>
            @if(!empty($leadData['preferred_lanes']))
            <tr>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #94A3B8;">Preferred Lanes:</td>
                <td style="padding: 10px 0; border-bottom: 1px solid #1E293B; color: #FFFFFF;">{{ $leadData['preferred_lanes'] }}</td>
            </tr>
            @endif
            @if(!empty($leadData['notes']))
            <tr>
                <td style="padding: 10px 0; color: #94A3B8; vertical-align: top;">Additional Notes:</td>
                <td style="padding: 10px 0; color: #CBD5E1;">{{ $leadData['notes'] }}</td>
            </tr>
            @endif
        </table>

        <p style="margin-top: 24px; font-size: 12px; color: #64748B;">
            Tip: Click "Reply" in your email client to respond directly to {{ $leadData['full_name'] }} ({{ $leadData['email'] }}).
        </p>
    </div>
</body>
</html>