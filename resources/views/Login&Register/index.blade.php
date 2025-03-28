<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href={{ asset("assets/css/Login_register.css") }}>
</head>

<body>
    <section class="container">
        <div class="box sign_in">
            <h2>Already have an account?</h2>
            <button class="tabs" id="sign_in_btn">Sign in</button>
        </div>
        <div class="box sign_up">
            <h2>Don't have an account?</h2>
            <button class="tabs" id="sign_up_btn">Sign up</button>
        </div>
        <div class="form_container">
            <div class="form_box sign_in_form">
                <form action="#" method="post">
                    <h3>Sign in</h3>
                    <input type="text" placeholder="Username">
                    <input type="password" placeholder="Password">
                    <button class="primary">Login</button>
                    <a href="#">Forgot your Password?</a>

                </form>
            </div>
            <div class="form_box sign_up_form">
                <form action="#" method="post">
                    <h3>Sign up</h3>
                    <input type="text" placeholder="Username">
                    <input type="email" placeholder="Email">
                    <input type="password" placeholder="Password">
                    <input type="password" placeholder="Confirm Password">
                    <button class="secondary">Register</button>
                </form>
            </div>
        </div>
    </section>
    <script src={{ asset('assets/js/Login_register.js') }}></script>
</body>

</html>
