<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 - Page Not Found</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            /* background-color: #f9fafb; */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .error-box {
            /* background: #ffffff; */
            /* padding: 40px 30px; */
            max-width: 500px;
            width: 90%;
            text-align: center;
            border-radius: 12px;
            /* box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1); */
            animation: fadeIn 1s ease-out;
        }

        .error-box img {
            width: 300px;
            margin-bottom: 20px;
            animation: float 3s ease-in-out infinite;
        }

        .error-box h1 {
            font-size: 64px;
            margin: 10px 0;
            color: #222;
        }

        .error-box p {
            font-size: 18px;
            color: #666;
            margin: 15px 0 30px;
            line-height: 1.6;
        }
        .home-link {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4a6fa5;
            color: white;
            text-decoration: none;
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .home-link:hover {
            background-color: #3a5a8a;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .home-link:active {
            transform: translateY(1px);
        }

        .home-link::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .home-link:hover::before {
            left: 100%;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .home-link {
            animation: pulse 2s infinite;
        }


        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 480px) {
            .error-box h1 {
                font-size: 48px;
            }

            .error-box p {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="error-box"> <img src="{{ asset('assets/images/icons/404.png') }}" alt="Not Found" />
        <h1>404</h1>
        <p>Oops! The page you're looking for doesn't exist or has been moved.</p>
        <a href="{{ route('dashboard') }}" class="home-link">Go Back</a>
    </div>
</body>

</html>
