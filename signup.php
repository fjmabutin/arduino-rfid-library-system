<?php
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = $_POST['role'];

    if (!$username || !$password || !$role) {
        $message = "All fields are required";
    } else {
        $message = "Created account for $username as $role.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>OLFU Library Sign Up</title>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    height: 100vh;
    background: linear-gradient(to right, #0f3d0f, #1f7a1f);
    color: white;
    display: flex;
    flex-direction: column;
}

/* Top Bar */
.top-bar {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 20px 40px;
}

.school-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.school-info img {
    width: 55px;
    height: 55px;
    border-radius: 50%;
}

.school-name {
    font-size: 20px;
    font-weight: bold;
}

/* Welcome text above form */
.welcome-text {
    font-size: 55px;
    font-weight: bold;
    margin-bottom: 40px;
    text-align: center;
}

/* Center Signup */
.center-area {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 75vh;
}

.signup-container {
    background-color: #0b2e0b;
    width: 420px;
    padding: 40px;
    border-radius: 35px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.5);
    text-align: center;
}

.signup-container input{
    width: 95%;
    padding: 12px;
    margin: 12px 0;
    border-radius: 15px;
    border: none;
    outline: none;
    background-color: #1f5c1f;
    color: white;
}

.signup-container select {
    width: 100%;
    padding: 12px;
    margin: 12px 0;
    border-radius: 15px;
    border: none;
    outline: none;
    background-color: #1f5c1f;
    color: white;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="white" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>');
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 16px 16px;
    cursor: pointer;
}

.password-wrapper {
    position: relative;
}

.password-wrapper span {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: white;
    font-size: 18px;
}

.signup-container button {
    width: 100%;
    padding: 12px;
    margin-top: 15px;
    border-radius: 25px;
    border: none;
    background-color: white;
    color: #0b2e0b;
    font-weight: bold;
    cursor: pointer;
}

.signup-container button:hover {
    background-color: #d9d9d9;
}


.error {
    background-color: #9d4c4c;
    padding: 10px;
    border-radius: 15px;
    margin-bottom: 15px;
    font-size: 14px;
}

p {
    color: white;
    margin-top: 10px;
}

p a {
    color: #90ee90;
    text-decoration: none;
}

p a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>

<div class="top-bar">
    <div class="school-info">
        <img src="assets/olfuLogo.jpg" alt="OLFU Logo">
        <div class="school-name">
            Our Lady of Fatima University
        </div>
    </div>
</div>

<div class="center-area">
    <div class="welcome-text">WELCOME!</div>

    <div class="signup-container">
        <h2>Sign Up</h2>

        <?php if ($message): ?>
        <div class="error"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>

            <div class="password-wrapper">
                <input type="password" name="password" placeholder="Password" id="passwordField" required>
                <span id="togglePassword">👁️</span>
            </div>

            <select name="role" required>
                <option value="" selected disabled>Select Role</option>
                <option value="student">Student</option>
                <option value="admin">Admin</option>
            </select>

            <button type="submit">Create Account</button>
        </form>

        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</div>

<script>
const password = document.getElementById('passwordField');
const toggle = document.getElementById('togglePassword');

toggle.addEventListener('click', () => {
    if (password.type === 'password') {
        password.type = 'text';
        toggle.textContent = '⦸';
    } else {
        password.type = 'password';
        toggle.textContent = '👁️';
    }
});
</script>

</body>
</html>