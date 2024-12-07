<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="styley.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="left-box">
                <h2>Sign Up</h2>
                <form action="signup-check.php" method="post">

                <!-- Menampilkan Pesan Error -->
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php } ?>

        <!-- Menampilkan Pesan Sukses -->
        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo htmlspecialchars($_GET['success']); ?></p>
        <?php } ?>
                    <input type="text" 
                    name="uname" 
                    placeholder="Username" 
                    value="<?php echo isset($_GET['uname']) ? htmlspecialchars($_GET['uname']) : ''; ?>" 
                           required>
                    <input type="email" 
                    name="email" 
                    placeholder="Email" 
                    value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>" 
                    required>

                    <input type="password" 
                    name="password" 
                    placeholder="Password" 
                    required>

                    <input type="password" 
                    name="re_password" 
                    placeholder="Re-type Password" 
                    required>
                    <button type="submit" class="btn">Sign Up</button>
                </form>
            </div>
            <div class="right-box">
                <h2>Welcome Back!</h2>
                <p>Already have an account?</p>
                <a href="index.php" class="btn-secondary">Sign In</a>
            </div>
        </div>
    </div>
</body>
</html>