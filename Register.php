<?php include('head.php'); ?>
<div class="container">
    <h2>Register</h2>
    <form id="registrationForm" onsubmit="return validateRegistration()" method="POST">
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
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Register</button>
        </div>
    </form>
    <div id="registrationMessage"></div>
</div>
<?php include('footer.php'); ?>

<script>
function validateRegistration() {
    var fullName = document.getElementById('fullName').value;
    var idNo = document.getElementById('idNo').value;
    var gmail = document.getElementById('gmail').value;
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (fullName && idNo && gmail && username && password) {
        document.getElementById('registrationMessage').innerHTML = 'Registration Successful!';
        setTimeout(() => {
            document.getElementById('registrationMessage').innerHTML = '';
            window.location.href = 'login.php'; // Redirect to login page after 3 seconds
        }, 3000);
        return false;
    } else {
        alert('Please fill in all fields.');
        return false;
    }
}
</script>
