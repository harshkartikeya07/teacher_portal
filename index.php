<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script defer src="./assets/js/common.js"></script>
</head>

<body class="h-100">
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html">
                                    <h4>Tailwebs</h4>
                                </a>
                                <h2>Login</h2>
                                <form action="login.php" method="post" class="mt-5 mb-5 login-input">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="username" placeholder="Username" >
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password" placeholder="Password" >
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn login-form__btn submit w-100">
                                    </div>
                               
                                    <?php 
                                    if (isset($_SESSION['error'])): ?>
                                    <div class="alert alert-danger alert-dismissible fade show err_msg">
                                       <?php echo htmlspecialchars($_SESSION['error']); ?></div>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php unset($_SESSION['error']); ?>