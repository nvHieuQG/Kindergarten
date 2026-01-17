<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Đăng nhập</title>

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
        
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <style>
            :root {
                --bs-primary: #FF8A00;
                --bs-primary-rgb: 255, 138, 0;
            }
            body {
                font-family: 'Lexend', sans-serif;
                background: linear-gradient(135deg, #FFF5E6 0%, #FFECD1 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .auth-card {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border-radius: 24px;
                border: 1px solid rgba(255, 255, 255, 0.3);
                box-shadow: 0 20px 40px rgba(0,0,0,0.05);
                width: 100%;
                max-width: 450px;
                padding: 40px;
                position: relative;
                overflow: hidden;
            }
            .auth-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 5px;
                background: var(--bs-primary);
            }
            .logo-icon {
                width: 60px;
                height: 60px;
                background: var(--bs-primary);
                border-radius: 18px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 20px;
                color: white;
                font-size: 30px;
                box-shadow: 0 10px 20px rgba(255, 138, 0, 0.2);
            }
            .btn-primary {
                background-color: var(--bs-primary);
                border-color: var(--bs-primary);
                padding: 12px;
                border-radius: 12px;
                font-weight: 700;
                transition: all 0.3s;
            }
            .btn-primary:hover {
                background-color: #E67E00;
                border-color: #E67E00;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(255, 138, 0, 0.3);
            }
            .form-control {
                border-radius: 12px;
                padding: 12px 16px;
                border: 2px solid #F1F5F9;
                background: #F8FAFC;
            }
            .form-control:focus {
                border-color: var(--bs-primary);
                box-shadow: 0 0 0 4px rgba(255, 138, 0, 0.1);
                background: white;
            }
            label {
                font-weight: 600;
                margin-bottom: 8px;
                color: #1E293B;
            }
            h4 {
                font-family: 'Outfit', sans-serif;
                font-weight: 800;
                color: #1E293B;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="auth-card">
            <div class="text-center mb-4">
                <a href="/" class="text-decoration-none">
                    <div class="logo-icon">
                        <i class="fas fa-sun"></i>
                    </div>
                    <h4>Hoa Hướng Dương</h4>
                </a>
            </div>
            {{ $slot }}
        </div>
    </body>
</html>
