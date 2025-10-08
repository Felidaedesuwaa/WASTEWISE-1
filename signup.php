<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php?signup=success");
        exit();
    } else {
        $error = "❌ Username already taken!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>WasteWise | Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Create Account</h2>
    <?php if (isset($error)) echo "<p class='text-red-600 mb-3'>$error</p>"; ?>
    <form method="POST" class="space-y-4">
      <input type="text" name="username" placeholder="Username" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
      <input type="password" name="password" placeholder="Password" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
      <button type="submit"
        class="w-full bg-green-700 text-white py-2 rounded-lg hover:bg-green-800 transition">Sign Up</button>
    </form>
    <p class="text-sm text-gray-600 mt-4">Already have an account?
      <a href="login.php" class="text-green-700 hover:underline">Login</a>
    </p>
  </div>
</body>
</html>
