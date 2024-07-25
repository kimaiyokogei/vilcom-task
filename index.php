<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration and Login</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="header">VILCOM STAFF BIOMETRIC REGISTRATION</div>
    <div class="navbar">
        <a href="javascript:void(0);" onclick="showHome">Home</a>
        <a href="javascript:void(0);" onclick="showAbout">About</a>
        <a href="javascript:void(0);" onclick="showContact">Contact Us</a>
        <a href="javascript:void(0);" onclick="showLogin()">Login</a>
    </div>

    <div class="container">
        <h2>Welcome to Vilcom Network</h2>
        <form id="registrationForm" onsubmit="return validateRegistration()" action="#">
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" required>
            </div>
            <div class="form-group">
                <label for="idNo">ID Number:</label>
                <input type="text" id="idNo" name="idNo" pattern="[0-9]+" title="Please enter only numeric characters." required>
            </div>
            <div class="form-group">
                <label for="gmail">Gmail:</label>
                <input type="email" id="gmail" name="gmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                       title="Enter a valid email address (e.g., example@gmail.com)" required>
            </div>
            <div class="form-group">
                <label for="passport">Passport Photo:</label>
                <input type="file" id="passport" name="passport" accept="image/*" required>
            </div>
            <div class="form-group">6
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
                <button type="button" onclick="showLogin()">Login</button>
            </div>
        </form>
        <div id="registrationMessage"></div>
    </div>

    <div class="container" style="display:none;" id="loginContainer">
        <h2>User Login</h2>
        <form id="loginForm" onsubmit="return validateLogin()" action="#">
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
                <a href="javascript:void(0);" onclick="showForgotPassword()">Forgot Password?</a>
            </div>
        </form>
        <div id="loginMessage"></div>
    </div>

    <div class="container" style="display:none;" id="forgotPasswordContainer">
        <h2>Forgot Password</h2>
        <form id="forgotPasswordForm" onsubmit="return validateForgotPassword()" action="#">
            <div class="form-group">
                <label for="forgotEmail">Gmail:</label>
                <input type="email" id="forgotEmail" name="forgotEmail" required>
            </div>
            <div class="form-group">
                <button type="submit">Reset Password</button>
            </div>
        </form>
        <div id="forgotPasswordMessage"></div>
    </div>
    <br><hr>

    <div class="about">
        <p><a href="About.php"></a><u>about</u></p>
        <p>Welcome to our user registration and login page.</p>
        <p>Here, you can create an account to join our network or log in if you are already a member.</p>
        <p>Our platform offers various features to enhance your experience.</p>
        <p>For more information, <a href="https://vilcom.ke">visit our page</a>.</p>
    </div>

    <div class="footer">
        &copy; 2024 Vilcom Networks.
    </div>

    <script>
        let users = [];

        function validateRegistration() {
            var fullName = document.getElementById('fullName').value;
            var idNo = document.getElementById('idNo').value;
            var gmail = document.getElementById('gmail').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            if (fullName && idNo && gmail && username && password) {
                users.push({ username: username, password: password });
                document.getElementById('registrationMessage').innerHTML = 'Registration Successful!';
                document.getElementById('registrationMessage').style.display = 'block';
                document.getElementById('registrationForm').reset();
                document.getElementById('registrationForm').style.display = 'none';
                document.getElementById('loginContainer').style.display = 'block';
                setTimeout(() => {
                    document.getElementById('registrationMessage').style.display = 'none';
                }, 3000); // Hide notification after 3 seconds
                return false;
            } else {
                alert('Please fill in all fields.');
                return false;
            }
        }

        function validateLogin() {
            var loginUsername = document.getElementById('loginUsername').value;
            var loginPassword = document.getElementById('loginPassword').value;

            var user = users.find(u => u.username === loginUsername && u.password === loginPassword);

            if (user) {
                document.getElementById('loginMessage').innerHTML = 'Login Successful!';
                document.getElementById('loginMessage').style.display = 'block';
                setTimeout(() => {
                    window.location.href = 'vilcom.html'; // Redirect to Vilcom page after 2 seconds
                }, 2000);
                return false;
            } else {
                document.getElementById('loginMessage').innerHTML = 'Invalid username or password.';
                document.getElementById('loginMessage').style.display = 'block';
                setTimeout(() => {
                    document.getElementById('loginMessage').style.display = 'none';
                }, 3000); // Hide notification after 3 seconds
                return false;
            }
        }

        function validateForgotPassword() {
            var forgotEmail = document.getElementById('forgotEmail').value;
            
            // You can implement further logic to validate the email and send reset instructions
            if (forgotEmail) {
                document.getElementById('forgotPasswordMessage').innerHTML = 'Password reset instructions have been sent to your Gmail.';
                document.getElementById('forgotPasswordMessage').style.display = 'block';
                setTimeout(() => {
                    document.getElementById('forgotPasswordMessage').style.display = 'none';
                }, 3000); // Hide notification after 3 seconds
                return false;
            } else {
                alert('Please enter your Gmail.');
                return false;
            }
        }

        function showLogin() {
            document.getElementById('registrationForm').style.display = 'none';
            document.getElementById('loginContainer').style.display = 'block';
            document.getElementById('forgotPasswordContainer').style.display = 'none';
        }

        function showForgotPassword() {
            document.getElementById('loginContainer').style.display = 'none';
            document.getElementById('forgotPasswordContainer').style.display = 'block';
        }
    </script>
</body>
</html>
