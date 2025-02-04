<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>API Documentation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 900px;
            margin-top: 20px;
        }

        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        pre {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h2>API Documentation</h2>
            <p>All requests must have the header:</p>
            <pre style="color: #007bff">Accept: application/json</pre>
            <p>Base URL</p>
            <pre style="color: #007bff">{{ config('app.url') . '/api' }}</pre>
        </div>

        <div class="accordion mb-4" id="apiAccordion">

            <!-- Login API -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#loginAPI">
                        Login API
                    </button>
                </h2>
                <div id="loginAPI" class="accordion-collapse collapse" data-bs-parent="#apiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>POST /api/login</code></p>
                        <p><strong>Request Body:</strong></p>
                        <pre>
{
    "name": "username or email",
    "password": "your_password"
}
                    </pre>
                        <p><strong>Response:</strong></p>
                        <pre>
{
    "status": true,
    "message": "User logged in successfully!",
    "access_token": "your_token",
    "token_type": "Bearer"
}
                    </pre>
                    </div>
                </div>
            </div>

            <!-- Signup API -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#signupAPI">
                        Signup API
                    </button>
                </h2>
                <div id="signupAPI" class="accordion-collapse collapse" data-bs-parent="#apiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>POST /api/signup</code></p>
                        <p><strong>Request Body:</strong></p>
                        <pre>
{
    "name": "your_name",
    "email": "your_email",
    "password": "your_password",
    "password_confirmation": "your_password"
}
                    </pre>
                        <p><strong>Response:</strong></p>
                        <pre>
{
    "status": true,
    "message": "Account created successfully! Verify your Email",
    "access_token": "your_token",
    "token_type": "Bearer"
}
                    </pre>
                    </div>
                </div>
            </div>

            <!-- Google Login API -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#googleLoginAPI">
                        Google Login API
                    </button>
                </h2>
                <div id="googleLoginAPI" class="accordion-collapse collapse" data-bs-parent="#apiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>POST /api/login/google</code></p>
                        <p><strong>Request Body:</strong></p>
                        <pre>
{
    "token": "google_access_token"
}
                    </pre>
                        <p><strong>Response:</strong></p>
                        <pre>
{
    "status": true,
    "message": "User logged in successfully!",
    "access_token": "your_token",
    "token_type": "Bearer"
}
                    </pre>
                    </div>
                </div>
            </div>

            <!-- Apple Login API -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#appleLoginAPI">
                        Apple Login API
                    </button>
                </h2>
                <div id="appleLoginAPI" class="accordion-collapse collapse" data-bs-parent="#apiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>POST /api/login/apple</code></p>
                        <p><strong>Request Body:</strong></p>
                        <pre>
{
    "id_token": "apple_id_token"
}
                    </pre>
                        <p><strong>Response:</strong></p>
                        <pre>
{
    "status": true,
    "message": "User logged in successfully!",
    "access_token": "your_token",
    "token_type": "Bearer"
}
                    </pre>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#resetPasswordAPI">
                        Reset Password API
                    </button>
                </h2>
                <div id="resetPasswordAPI" class="accordion-collapse collapse" data-bs-parent="#apiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>POST /reset-password</code></p>
                        <p><strong>Request Body:</strong></p>
                        <pre>
        {
            "email": "your_email@example.com"
        }
                    </pre>
                        <p><strong>Response (Success):</strong></p>
                        <pre>
        {
            "status": true,
            "message": "Password reset link sent. Please check your email."
        }
                    </pre>
                        <p><strong>Response (Failure - User Not Found):</strong></p>
                        <pre>
        {
            "status": false,
            "message": "User not found."
        }
                    </pre>
                        <p><strong>Response (Failure - Validation Errors):</strong></p>
                        <pre>
        {
            "status": false,
            "message": [
                "The email field is required."
            ]
        }
                    </pre>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#resendVerificationAPI">
                        Resend Email Verification API
                    </button>
                </h2>
                <div id="resendVerificationAPI" class="accordion-collapse collapse" data-bs-parent="#apiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>POST /email/resend-verification</code></p>
                        <p><strong>Request Body:</strong></p>
                        <pre>
        {
            "email": "your_email@example.com"
        }
                    </pre>
                        <p><strong>Response (Success - Verification Link Sent):</strong></p>
                        <pre>
        {
            "status": true,
            "message": "A new verification link has been sent to the email address you provided during registration."
        }
                    </pre>
                        <p><strong>Response (Failure - Email Not Found):</strong></p>
                        <pre>
        {
            "status": false,
            "message": "We couldn't find an account with that email."
        }
                    </pre>
                        <p><strong>Response (Failure - Email Already Verified):</strong></p>
                        <pre>
        {
            "status": true,
            "message": "Email already Verified"
        }
                    </pre>
                        <p><strong>Response (Failure - Validation Errors):</strong></p>
                        <pre>
        {
            "status": false,
            "message": [
                "The email field is required."
            ]
        }
                    </pre>
                    </div>
                </div>
            </div>

        </div>

        <div class="accordion">
            <h4 class="mt-4">🔒 These Routes Require Authentication</h4>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#getUserAPI">
                        Get Authenticated User API
                    </button>
                </h2>
                <div id="getUserAPI" class="accordion-collapse collapse" data-bs-parent="#authApiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>GET /user</code></p>
                        <p><strong>Headers:</strong></p>
                        <pre>
Authorization: Bearer {your_token}
            </pre>
                        <p><strong>Response (Success):</strong></p>
                        <pre>
{
    "status": true,
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com"
    }
}
            </pre>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#logoutAPI">
                        Logout API
                    </button>
                </h2>
                <div id="logoutAPI" class="accordion-collapse collapse" data-bs-parent="#authApiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>POST /logout</code></p>
                        <p><strong>Headers:</strong></p>
                        <pre>
Authorization: Bearer {your_token}
            </pre>
                        <p><strong>Response (Success):</strong></p>
                        <pre>
{
    "status": true,
    "message": "User logged out successfully!"
}
            </pre>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#addPurchaseAPI">
                        Add Purchase API
                    </button>
                </h2>
                <div id="addPurchaseAPI" class="accordion-collapse collapse" data-bs-parent="#authApiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>POST /purchase</code></p>
                        <p><strong>Headers:</strong></p>
                        <pre>
Authorization: Bearer {your_token}
            </pre>
                        <p><strong>Request Body:</strong></p>
                        <pre>
{
    "plan_id": 1
}
            </pre>
                        <p><strong>Response (Success):</strong></p>
                        <pre>
{
    "status": true,
    "message": "Purchase created successfully! Activation code sent to your email."
}
            </pre>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#purchaseStatusAPI">
                        Get Purchase Status API
                    </button>
                </h2>
                <div id="purchaseStatusAPI" class="accordion-collapse collapse" data-bs-parent="#authApiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>POST /purchase/status</code></p>
                        <p><strong>Headers:</strong></p>
                        <pre>
Authorization: Bearer {your_token}
            </pre>
                        <p><strong>Response (Success - Active Purchase):</strong></p>
                        <pre>
{
    "status": true,
    "purchases": {
        "id": 1,
        "plan_id": 2,
        "expires_at": "2025-02-10T00:00:00.000Z"
    }
}
            </pre>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#redeemCodeAPI">
                        Redeem Activation Code API
                    </button>
                </h2>
                <div id="redeemCodeAPI" class="accordion-collapse collapse" data-bs-parent="#authApiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>POST /purchase/redeem</code></p>
                        <p><strong>Headers:</strong></p>
                        <pre>
Authorization: Bearer {your_token}
            </pre>
                        <p><strong>Request Body:</strong></p>
                        <pre>
{
    "activation_code": "ABC123XYZ"
}
            </pre>
                        <p><strong>Response (Success - Code Redeemed):</strong></p>
                        <pre>
{
    "status": true,
    "message": "Purchase activated successfully!",
    "purchase": {
        "id": 1,
        "plan_id": 2,
        "expires_at": "2025-03-01T00:00:00.000Z"
    }
}
            </pre>
                        <p><strong>Response (Failure - Invalid Code):</strong></p>
                        <pre>
{
    "status": false,
    "message": "Invalid or already used activation code."
}
            </pre>
                    </div>
                </div>
            </div>

        </div>

        <div class="accordion">
            <h4 class="mt-4"> Public Routes </h4>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#allServersAPI">
                        All Servers API
                    </button>
                </h2>
                <div id="allServersAPI" class="accordion-collapse collapse" data-bs-parent="#apiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>GET /api/servers</code></p>
                        <p><strong>Response:</strong></p>
                        <pre>
            {
                "status": true,
                "servers": [
                    {
                        "id": 1,
                        "name": "Server 1",
                        "subServers": [
                            {
                                "id": 1,
                                "name": "Sub Server 1"
                            },
                            ...
                        ]
                    },
                    ...
                ]
            }
                        </pre>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#allPlansAPI">
                        All Plans API
                    </button>
                </h2>
                <div id="allPlansAPI" class="accordion-collapse collapse" data-bs-parent="#apiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>GET /api/plans</code></p>
                        <p><strong>Response:</strong></p>
                        <pre>
            {
                "status": true,
                "plans": [
                    {
                        "id": 2,
                        "name": "Plan 2",
                        "details": "Details about Plan 2"
                    },
                    ...
                ]
            }
                        </pre>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#optionsAPI">
                        Options API
                    </button>
                </h2>
                <div id="optionsAPI" class="accordion-collapse collapse" data-bs-parent="#apiAccordion">
                    <div class="accordion-body">
                        <p><strong>Endpoint:</strong> <code>GET /api/options</code></p>
                        <p><strong>Response:</strong></p>
                        <pre>
            {
                "privacy_policy": "Your privacy policy content here",
                "tos": "Your terms of service content here"
            }
                        </pre>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
