<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "❌ Invalid password!";
        }
    } else {
        $error = "❌ User not found!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>WasteWise | Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Welcome Back</h2>
    <?php if (isset($_GET['signup'])) echo "<p class='text-green-600 mb-3'>✅ Signup successful! Please login.</p>"; ?>
    <?php if (isset($error)) echo "<p class='text-red-600 mb-3'>$error</p>"; ?>
    <form method="POST" class="space-y-4">
      <input type="text" name="username" placeholder="Username" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
      <input type="password" name="password" placeholder="Password" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
      <button type="submit"
        class="w-full bg-green-700 text-white py-2 rounded-lg hover:bg-green-800 transition">Login</button>
    </form>
    <p class="text-sm text-gray-600 mt-4">Don’t have an account?
      <a href="signup.php" class="text-green-700 hover:underline">Sign Up</a>
    </p>
  </div>
</body>
</html>
