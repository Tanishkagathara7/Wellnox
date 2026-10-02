<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product Enquiry - Wellnox</title>
</head>
<body style="margin: 0; padding: 0; background-color: #FAF7F2; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #222224;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #FAF7F2; padding: 40px 15px;">
        <tr>
            <td align="center">
                <!-- Master Card Container -->
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="max-width: 600px; width: 100%; background-color: #FFFFFF; border-radius: 18px; overflow: hidden; box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08); border: 1px solid #ebdccf;">
                    
                    <!-- Header with Gradient & Branding -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #101214 0%, #1e2126 100%); padding: 36px 40px; text-align: center; border-bottom: 3px solid #c98a58;">
                            <h1 style="margin: 0; color: #FFFFFF; font-size: 26px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;">
                                WELL<span style="color: #c98a58;">NOX</span>
                            </h1>
                            <p style="margin: 6px 0 0 0; color: rgba(255, 255, 255, 0.7); font-size: 13px; letter-spacing: 0.12em; text-transform: uppercase;">
                                The Luxurious Look of Wellness &bull; New Lead
                            </p>
                        </td>
                    </tr>

                    <!-- Notification Pill Banner -->
                    <tr>
                        <td style="padding: 24px 40px 10px 40px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #fcf8f2; border-left: 4px solid #c98a58; border-radius: 6px; padding: 14px 18px;">
                                <tr>
                                    <td>
                                        <p style="margin: 0; color: #85532a; font-size: 14px; font-weight: 600;">
                                            &bull; Instant Requirement Received from Website
                                        </p>
                                        <p style="margin: 4px 0 0 0; color: #666666; font-size: 12.5px;">
                                            A new prospective client has submitted an inquiry on the homepage form.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Client Details Table -->
                    <tr>
                        <td style="padding: 15px 40px 25px 40px;">
                            <h2 style="margin: 0 0 16px 0; color: #111111; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid #f0eee8; padding-bottom: 10px; text-align: left;">
                                Customer Information:
                            </h2>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                <tr>
                                    <td width="35%" style="padding: 10px 0; color: #71757e; font-size: 13.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em;">Full Name:</td>
                                    <td width="65%" style="padding: 10px 0; color: #111111; font-size: 15px; font-weight: 600;">{{ $data['name'] ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; color: #71757e; font-size: 13.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; border-top: 1px solid #f5f2eb;">Phone Number:</td>
                                    <td style="padding: 10px 0; color: #111111; font-size: 15px; font-weight: 600; border-top: 1px solid #f5f2eb;">
                                        <a href="tel:{{ $data['phone'] ?? '' }}" style="color: #c98a58; text-decoration: none;">{{ $data['phone'] ?? 'N/A' }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; color: #71757e; font-size: 13.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; border-top: 1px solid #f5f2eb;">Email Address:</td>
                                    <td style="padding: 10px 0; color: #111111; font-size: 15px; font-weight: 600; border-top: 1px solid #f5f2eb;">
                                        <a href="mailto:{{ $data['email'] ?? '' }}" style="color: #c98a58; text-decoration: none;">{{ $data['email'] ?? 'N/A' }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; color: #71757e; font-size: 13.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; border-top: 1px solid #f5f2eb;">Received On:</td>
                                    <td style="padding: 10px 0; color: #111111; font-size: 14px; border-top: 1px solid #f5f2eb;">{{ date('d M Y, h:i A') }}</td>
                                </tr>
                            </table>

                            <!-- Description Block -->
                            <div style="margin-top: 24px;">
                                <h3 style="margin: 0 0 10px 0; color: #111111; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; text-align: left;">
                                    Requirement / Description:
                                </h3>
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #faf7f2; border: 1px solid #ebdccf; border-radius: 12px; border-collapse: separate; table-layout: fixed;">
                                    <tr>
                                        <td align="left" valign="top" style="padding: 16px 20px 20px 20px; color: #222224; font-size: 14.5px; line-height: 1.6; text-align: left; vertical-align: top; mso-line-height-rule: exactly; white-space: pre-wrap; word-break: break-word;"><p style="margin: 0; padding: 0; text-align: left;">{{ trim($data['description'] ?? 'No message provided.') }}</p></td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Quick Action Buttons -->
                            <div style="margin-top: 30px; text-align: center;">
                                <table role="presentation" cellspacing="0" cellpadding="0" align="center" style="margin: 0 auto;">
                                    <tr>
                                        <td align="center" style="padding: 0 6px;">
                                            <a href="mailto:{{ $data['email'] ?? '' }}?subject=Wellnox%20Enquiry%20Response" style="display: inline-block; background: linear-gradient(135deg, #c98a58 0%, #b27341 100%); color: #FFFFFF; font-size: 14px; font-weight: 600; text-decoration: none; padding: 12px 28px; border-radius: 50px; box-shadow: 0 6px 18px rgba(201, 138, 88, 0.35);">
                                                Reply to Customer
                                            </a>
                                        </td>
                                        @if(!empty($data['phone']))
                                            <td align="center" style="padding: 0 6px;">
                                                <a href="tel:{{ $data['phone'] }}" style="display: inline-block; background-color: #111111; color: #FFFFFF; font-size: 14px; font-weight: 600; text-decoration: none; padding: 12px 24px; border-radius: 50px;">
                                                    Call Client
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer Note -->
                    <tr>
                        <td style="background-color: #f9f7f4; padding: 20px 40px; text-align: center; border-top: 1px solid #ebdccf;">
                            <p style="margin: 0; color: #888888; font-size: 12px; line-height: 1.5;">
                                This lead notification was automatically generated by <strong>Wellnox International Pvt. Ltd.</strong> website.<br>
                                Recipient: <span style="color: #c98a58;">rohantechmatrix@gmail.com</span>
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
