<?php include('head.php'); ?>
<div class="container">
    <h2>User Login</h2>
    <form id="loginForm" onsubmit="return validateLogin()" method="POST">
        <div class="form-group">
            <label for="loginUsername">Username:</label>
            <input type="text" id="loginUsername" name="loginUsername" required>
        </div>
        <div class="form-group">
            <label for="loginPassword">Password:</label>
            <input type="password" id="loginPassword" name="loginPassword" required>
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
            <a href="forgot_password.php">Forgot Password?</a>
        </div>
    </form>
    <div id="loginMessage"></div>
</div>
<?php include('footer.php'); ?>

<script>
function validateLogin() {
    var loginUsername = document.getElementById('loginUsername').value;
    var loginPassword = document.getElementById('loginPassword').value;

    // Simulate login validation
    if (loginUsername === "admin" && loginPassword === "password") {
        document.getElementById('loginMessage').innerHTML = 'Login Successful!';
        setTimeout(() => {
            window.location.href = 'home.php'; // Redirect to home page after 2 seconds
        }, 2000);
    } else {
        document.getElementById('loginMessage').innerHTML = 'Invalid username or password.';
        setTimeout(() => {
            document.getElementById('loginMessage').innerHTML = '';
        }, 3000);
    }
    return false;
}
</script>
