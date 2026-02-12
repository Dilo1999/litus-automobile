<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4; -webkit-font-smoothing: antialiased;">
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #f4f4f4;">
        <tr>
            <td style="padding: 32px 16px;">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); overflow: hidden;">
                    {{-- Header with logo --}}
                    <tr>
                        <td style="padding: 32px 32px 24px; text-align: center; border-bottom: 2px solid #e7e5e4;">
                            <div style="border-bottom: 1px solid transparent;">
                                <img src="https://alzahageneraltrading.com/images/background/Logo-L-web.png" alt="Al Zaha General Trading" width="180" height="44" style="display: inline-block; max-width: 180px; height: auto; object-fit: contain;" />
                            </div>
                            <p style="margin: 12px 0 0; font-size: 11px; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: #c19b46;">General Trading</p>
                        </td>
                    </tr>
                    {{-- Title --}}
                    <tr>
                        <td style="padding: 28px 32px 8px;">
                            <p style="margin: 0; font-size: 11px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: #c19b46;">Contact Us</p>
                            <h1 style="margin: 6px 0 0; font-size: 22px; font-weight: 600; color: #1a1a1a; letter-spacing: -0.02em;">New Contact Form Submission</h1>
                            <p style="margin: 10px 0 0; font-size: 14px; color: #57534e; line-height: 1.5;">You have received a new message from the website.</p>
                        </td>
                    </tr>
                    {{-- Details card --}}
                    <tr>
                        <td style="padding: 16px 32px 24px;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #fafaf9; border: 1px solid #e7e5e4; border-radius: 8px;">
                                <tr>
                                    <td style="padding: 20px 20px 8px;">
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td style="padding: 0 0 12px; font-size: 12px; font-weight: 600; color: #c19b46; text-transform: uppercase; letter-spacing: 0.06em;">Name</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0 0 16px; font-size: 15px; color: #1a1a1a;">{{ $data['name'] }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0 0 12px; font-size: 12px; font-weight: 600; color: #c19b46; text-transform: uppercase; letter-spacing: 0.06em;">Email</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0 0 16px;"><a href="mailto:{{ $data['email'] }}" style="font-size: 15px; color: #1a1a1a; text-decoration: none;">{{ $data['email'] }}</a></td>
                                            </tr>
                                            @if(!empty($data['phone']))
                                            <tr>
                                                <td style="padding: 0 0 12px; font-size: 12px; font-weight: 600; color: #c19b46; text-transform: uppercase; letter-spacing: 0.06em;">Phone</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0 0 16px; font-size: 15px; color: #1a1a1a;">{{ $data['phone'] }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td style="padding: 0 0 12px; font-size: 12px; font-weight: 600; color: #c19b46; text-transform: uppercase; letter-spacing: 0.06em;">Message</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0; font-size: 15px; color: #1a1a1a; line-height: 1.6;">{{ $data['message'] }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    {{-- Reply button --}}
                    <tr>
                        <td style="padding: 0 32px 28px; text-align: center;">
                            <a href="mailto:{{ $data['email'] }}?subject=Re: Contact from {{ urlencode($data['name']) }}" style="display: inline-block; padding: 14px 28px; background-color: #c19b46; color: #1a1a1a; font-size: 13px; font-weight: 600; text-decoration: none; border-radius: 8px; letter-spacing: 0.04em;">Reply to {{ $data['name'] }}</a>
                        </td>
                    </tr>
                    {{-- Footer --}}
                    <tr>
                        <td style="padding: 20px 32px 24px; background-color: #fafaf9; border-top: 1px solid #e7e5e4; text-align: center;">
                            <p style="margin: 0; font-size: 12px; color: #57534e;">Thanks,<br><strong style="color: #1a1a1a;"></strong></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
