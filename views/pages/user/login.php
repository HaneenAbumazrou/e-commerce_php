<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/user/assets/css/auth.style.css">

</head>
<body>
    

<?php //dd($_SESSION) ?>

    <div class="d-flex justify-content-center">
        <div class="cont <?= $signup ?? null ?>">
            <div class="form sign-in">
                <h2>Login</h2>
                    <form action="/login" method="post">
                    <label>
                        <span>Email</span>
                        <input type="text" name="email" class="border-bottom border-1 border-dark py-1"
                        value="<?= $_POST["email"] ?? null ?>"/>
                        <span class="text-danger">
                            <?= $_SESSION["login_errors"]["email_error"] ?? null ?>
                        </span>
                    </label>
                    
                    <label>
                        <span>Password</span>
                        <input type="password" name="password" class="border-bottom border-1 border-dark py-1"/>
                        <span class="text-danger">
                            <?= $_SESSION["login_errors"]["password_error"] ?? null ?>
                        </span>
                    </label>

                    <button type="submit" class="submit">Sign In</button>
                </form>
            </div>


            <div class="sub-cont">
                <div class="img">
                    <div class="img__text m--up">
                    
                        <h3>Don't have an account? Please Sign up!<h3>
                    </div>
                    <div class="img__text m--in">
                    
                        <h3>If you already has an account, just sign in.<h3>
                    </div>
                    <div class="img__btn">
                        <span class="m--up">Sign Up</span>
                        <span class="m--in">Sign In</span>
                    </div>
                </div>

                <div class="form sign-up">
                    <h2>Create your Account</h2>
                    <form action="/register" method="post">
                        <div class="row">
                            <div class="col col-sm-12 col-lg-6">
                                <label>
                                    <span>First Name</span>
                                    <input type="text" name="first_name" value="<?= $_POST["first_name"] ?? null ?>"/>
                                </label>
                                <span class="text-danger">
                                    <?= $_SESSION["register_errors"]["first_name_error"] ?? null ?>
                                </span>
                            </div>
                            <div class="col col-sm-12 col-lg-6">
                                <label>
                                    <span>Last Name</span>
                                    <input type="text" name="last_name" value="<?= $_POST["last_name"] ?? null ?>"/>
                                </label>
                                <span class="text-danger">
                                    <?= $_SESSION["register_errors"]["last_name_error"] ?? null ?>
                                </span>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col col-lg-12">
                                <label>
                                    <span>Email</span>
                                    <input type="text" name="email" value="<?= $_POST["email"] ?? null ?>"/>
                                </label>
                                <span class="text-danger">
                                    <?= $_SESSION["register_errors"]["email_error"] ?? null ?>
                                </span>
                            </div>
                            <div class="col col-lg-12">
                                <label>
                                    <span>Username</span>
                                    <input type="text" name="username" value="<?= $_POST["username"] ?? null ?>"/>
                                </label>
                                <span class="text-danger">
                                    <?= $_SESSION["register_errors"]["username_error"] ?? null ?>
                                </span>
                            </div>
                        </div>
    
    
                        <div class="row">
                            <div class="col col-sm-12 col-lg-6">
                                <label>
                                    <span>Password</span>
                                    <input type="password"  name="password"/>
                                </label>
                                <span class="text-danger">
                                    <?= $_SESSION["register_errors"]["password_error"] ?? null ?>
                                </span>
                            </div>
                            <div class="col col-sm-12 col-lg-6">
                                <label>
                                    <span>Password Confirmation</span>
                                    <input type="password"  name="password_confirmation"/>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="submit">Sign Up</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>


</body>
</html>
<?php unset($_SESSION["register_errors"]); ?>