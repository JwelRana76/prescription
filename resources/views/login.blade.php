
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Orbit Eye Hospital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
            background: linear-gradient(135deg, #dceaff, #f7faff);
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 800px;
            overflow: hidden;
            border: 0;
            border-radius: 22px;
            box-shadow: 0 20px 60px rgba(20, 65, 140, .18);
        }

        .left-panel {
            position: relative;
            min-height: 680px;
            height: 100%;
            color: white;
            background:
                linear-gradient(
                    180deg,
                    rgba(0, 70, 155, .95) 0%,
                    rgba(0, 75, 160, .18) 48%,
                    rgba(0, 65, 150, .98) 100%
                ),
                url('/image/doctor-avater.jpg') center / cover no-repeat;
        }

        .left-content {
            min-height: 680px;
            padding: 35px 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            text-align: center;
        }

        .brand i {
            font-size: 70px;
        }

        .brand h2 {
            font-size: 30px;
            font-weight: 700;
        }

        .brand p {
            font-size: 19px;
            font-style: italic;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
            font-size: 17px;
        }

        .feature i {
            font-size: 24px;
            width: 30px;
        }

        .right-panel {
            min-height: 680px;
            padding: 45px;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-area {
            width: 100%;
            max-width: 500px;
        }

        .login-title {
            font-size: 42px;
            font-weight: 700;
            color: #101d37;
        }

        .subtitle {
            font-size: 20px;
            color: #596783;
            margin-bottom: 35px;
        }

        .input-group {
            margin-bottom: 24px;
        }

        .input-group-text {
            background: white;
            border: 1px solid #cdd7e8;
            border-right: 0;
            border-radius: 12px 0 0 12px;
            padding: 0 17px;
            font-size: 22px;
            color: #596783;
        }

        .input-group .form-control {
            height: 62px;
            border: 1px solid #cdd7e8;
            border-left: 0;
            border-radius: 0 12px 12px 0;
            font-size: 17px;
            box-shadow: none;
        }

        .input-group:focus-within .input-group-text,
        .input-group:focus-within .form-control {
            border-color: #0d6efd;
        }

        .password-toggle {
            background: white;
            border: 1px solid #cdd7e8;
            border-left: 0;
            border-radius: 0 12px 12px 0;
            padding: 0 16px;
        }

        .login-btn {
            width: 100%;
            height: 62px;
            color: white;
            background: linear-gradient(90deg, #0755e9, #0863df);
            border: 0;
            border-radius: 12px;
            font-size: 20px;
            font-weight: 600;
        }

        .login-btn:hover {
            color: white;
            background: #0649bc;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 18px;
            margin: 24px 0;
            color: #455371;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #d5deed;
        }

        .google-btn {
            width: 100%;
            height: 58px;
            background: white;
            border: 1px solid #bdcce4;
            border-radius: 12px;
            font-size: 17px;
        }

        .blue-link {
            color: #075de5;
            text-decoration: none;
        }

        @media (max-width: 767px) {
            body {
                padding: 12px;
            }

            .left-panel,
            .left-content {
                min-height: 270px;
            }

            .left-content {
                padding: 25px 20px;
                gap: 20px;
            }

            .brand i {
                font-size: 45px;
            }

            .brand h2 {
                font-size: 25px;
            }

            .brand p {
                font-size: 16px;
            }

            .features {
                display: none;
            }

            .right-panel {
                min-height: auto;
                padding: 35px 22px;
            }

            .login-title {
                font-size: 32px;
            }

            .subtitle {
                font-size: 17px;
            }
        }
    </style>
</head>
<body>

<div class="card login-card">
    <div class="row g-0">
        <!-- LEFT COLUMN: 50% -->
        <div class="col-md-6">
            <div class="left-panel">
                <div class="left-content">

                    <div class="brand">
                        <i class="bi bi-eye-fill"></i>
                        <h2>Orbit Eye Hospital</h2>
                        <p>Better Vision, Brighter Future</p>
                    </div>

                    <div class="features">
                        <div class="feature">
                            <i class="bi bi-shield-check"></i>
                            <span>Secure Access</span>
                        </div>

                        <div class="feature">
                            <i class="bi bi-lightning-charge-fill"></i>
                            <span>Fast &amp; Reliable</span>
                        </div>

                        <div class="feature">
                            <i class="bi bi-heart-fill"></i>
                            <span>Your Health, Our Priority</span>
                        </div>
                    </div>

                    <div class="text-center">
                        &copy; {{ date('Y') }} Orbit Eye Hospital
                    </div>

                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN: 50% -->
        <div class="col-md-6">
            <div class="right-panel">
                <div class="form-area">

                    <div class="text-center">
                        <h1 class="login-title">Welcome Back!</h1>
                        <p class="subtitle">Login to your account</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <label for="username" class="form-label">
                            Username
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>

                            <input type="text"
                                   name="username"
                                   id="username"
                                   value="{{ old('username') }}"
                                   class="form-control"
                                   placeholder="Username"
                                   autocomplete="username"
                                   required autofocus>
                        </div>

                        @error('username')
                            <div class="text-danger small mb-3">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="password" class="form-label">
                            Password
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill"></i>
                            </span>

                            <input type="password"
                                   name="password"
                                   id="password"
                                   class="form-control"
                                   placeholder="Password"
                                   autocomplete="current-password"
                                   required>

                            <button type="button"
                                    class="password-toggle"
                                    onclick="togglePassword()">
                                <i class="bi bi-eye-slash" id="eyeIcon"></i>
                            </button>
                        </div>

                        @error('password')
                            <div class="text-danger small mb-3">
                                {{ $message }}
                            </div>
                        @enderror

                        <button type="submit" class="btn login-btn">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            Login
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');

        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        } else {
            password.type = 'password';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        }
    }
</script>

</body>
</html>
