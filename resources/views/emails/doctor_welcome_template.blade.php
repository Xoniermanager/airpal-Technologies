<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #ddf6fa;
            ;
            padding: 20px;
            color: #293991;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            color: #333333;
        }
        .email-body h2 {
            color: #293991;
            font-size: 20px;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.6;
        }
        .email-footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            color: #666666;
        }
        .email-footer a {
            color: #2c98f0;
            text-decoration: none;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #293991;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="email-container">
    <!-- Email Header -->
    <div class="email-header">
        <img src="{{ site('website_logo') }}" alt="Logo" width="200"/>
        <h3>Welcome to Airpal, {{ $user ?? '' }}!</h3>
    </div>

    <!-- Email Body -->
    <div class="email-body" style="border: solid 1px #eee;">
        <h2>Hello {{ $user ?? '' }},</h2>
        <p>
            Thank you for joining <strong>Airpal</strong>! We are excited to have you as part of our growing network of medical professionals.
        </p>
        <p>
            Your account has been successfully created, and you can now start managing appointments, connecting with patients, and providing the best care through our platform.
        </p>

        <p><strong>Here’s what you can do next:</strong></p>
        <ul>
            <li><strong>Manage your schedule:</strong> Set up your availability and manage appointments seamlessly.</li>
            <li><strong>Connect with patients:</strong> Access patient details and communicate through our secure platform.</li>
            <li><strong>Explore tools:</strong> Utilize our suite of medical tools to enhance your practice.</li>
        </ul>

        <p>
            Click the button below to access your dashboard and get started:
        </p>

        <!-- Call to Action Button -->
        <a href="{{ route('login.index')}}" class="btn" style="color: white">Go to Login</a>

        <p>
            If you have any questions, feel free to contact our support team at <a href="mailto:Airpaltechnology@gmail.com">Airpaltechnology@gmail.com</a>.
        </p>
    </div>

    <!-- Email Footer -->
    <div class="email-footer">
        <p>&copy; 2024 Airpal. All rights reserved.</p>
        <p>
            <a href="[Unsubscribe Link]">Unsubscribe</a> | 
            <a href="[Terms of Service Link]">Terms of Service</a> | 
            <a href="[Privacy Policy Link]">Privacy Policy</a>
        </p>
    </div>
</div>

</body>
</html>
