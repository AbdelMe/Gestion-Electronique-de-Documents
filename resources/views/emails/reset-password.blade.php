<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
    <style>
        body {
            font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8fafc;
            color: #364152;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .email-wrapper {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
        }

        .email-header {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 28px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .email-body {
            padding: 32px;
        }

        .email-body h2 {
            margin: 0 0 20px 0;
            color: #1e40af;
            font-size: 22px;
            font-weight: 600;
            position: relative;
            padding-bottom: 10px;
        }

        .email-body h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #3b82f6;
            border-radius: 3px;
        }

        .email-body p {
            margin: 0 0 16px 0;
            color: #4b5563;
            font-size: 15px;
        }

        .btn-container {
            text-align: center;
            margin: 28px 0;
        }

        .btn {
            display: inline-block;
            padding: 14px 28px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 15px;
            box-shadow: 0 2px 10px rgba(59, 130, 246, 0.3);
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }

        .email-footer {
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #64748b;
            background: #f1f5f9;
            border-top: 1px solid #e2e8f0;
        }

        .email-footer a {
            color: #3b82f6;
            text-decoration: none;
        }

        .email-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 640px) {
            .email-wrapper {
                margin: 20px auto;
                border-radius: 0;
            }
            
            .email-body {
                padding: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-header">
            <h1>{{ config('app.name') }}</h1>
        </div>

        <div class="email-body">
            <h2>Password Reset Request</h2>
            <p>Hello{{ isset($name) ? ' ' . $name : '' }},</p>

            <p>We received a request to reset your password. Click the button below to set a new password:</p>

            <div class="btn-container">
                <a href="{{ $url }}" class="btn">Reset Password</a>
            </div>

            <p>This link will expire in 24 hours for your security. If you didn't request a password reset, please ignore this email or contact support if you have questions.</p>

            <p>Thank you,<br><strong>The {{ config('app.name') }} Team</strong></p>
        </div>

        <div class="email-footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.<br>
            <a href="{{ config('app.url') }}">Visit our website</a> | <a href="mailto:support@example.com">Contact Support</a>
        </div>
    </div>
</body>
</html>