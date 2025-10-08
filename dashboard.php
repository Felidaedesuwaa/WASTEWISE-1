<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>WasteWise Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
  <!-- Header -->
  <header class="bg-white border-b shadow-sm flex justify-between items-center px-6 py-3">
    <div class="flex items-center space-x-2">
      <div class="w-5 h-5 rounded-full border border-green-500"></div>
      <h1 class="text-xl font-semibold text-green-700">WasteWise</h1>
    </div>
    <nav class="flex space-x-6 text-sm font-medium">
      <a href="dashboard.php" class="text-green-700 border-b-2 border-green-700 pb-1">Dashboard</a>
      <a href="submit_e-waste.php" class="hover:text-green-700">Submit E-Waste</a>
      <a href="#" class="hover:text-green-700">Rewards</a>
    </nav>
    <div class="flex items-center space-x-4">
      <span class="text-sm text-gray-600">Welcome, <?php echo $_SESSION['username']; ?></span>
      <a href="logout.php" class="text-sm text-gray-600 hover:text-black">Logout</a>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-5xl mx-auto p-6 space-y-6">
    <h2 class="text-lg font-semibold mb-3">Hello, <?php echo $_SESSION['username']; ?> 👋</h2>
    <section>
      <h3 class="text-md font-semibold mb-3">Your E-Waste Management Dashboard</h3>
      <div class="grid grid-cols-3 gap-6">
        <div class="bg-white shadow rounded-lg p-4">
          <p class="text-sm text-gray-500">Total Pickups</p>
          <h3 class="text-2xl font-bold">12</h3>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
          <p class="text-sm text-gray-500">Reward Points</p>
          <h3 class="text-2xl font-bold">1,250</h3>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
          <p class="text-sm text-gray-500">CO2 Saved</p>
          <h3 class="text-2xl font-bold">48 kg</h3>
        </div>
      </div>
    </section>

    <!-- Your Scheduled Pickups Section -->
    <section class="bg-white shadow rounded-lg p-6">
      <h2 class="text-lg font-semibold mb-4">Your Scheduled Pickups</h2>

      <!-- First Pickup -->
      <div class="mb-6">
        <h3 class="font-medium mb-2">Laptop, Smartphone</h3>
        <p class="text-sm text-gray-500 mb-3">Old devices in working condition</p>
        <div class="flex items-start">
          <input type="checkbox" class="mt-1 mr-2">
          <div>
            <p class="font-medium">Dagupan City Center</p>
            <p class="text-sm text-gray-500">2025-09-14</p>
            <p class="text-sm text-gray-500">10:00 AM</p>
          </div>
        </div>
      </div>

      <hr class="my-6">

      <!-- Second Pickup -->
      <div class="mb-2">
        <h3 class="font-medium mb-2">Monitor, Keyboard</h3>
        <p class="text-sm text-gray-500 mb-3">Office equipment no longer needed</p>
        <div class="flex items-start">
          <input type="checkbox" class="mt-1 mr-2">
          <div>
            <p class="font-medium">Dagupan Riverside</p>
            <p class="text-sm text-gray-500">2025-05-18</p>
            <p class="text-sm text-gray-500">8:00 AM</p>
          </div>
        </div>
      </div>

      <hr class="my-6">

      <!-- Status Section -->
      <div class="flex space-x-6">
        <div>
          <p class="font-medium">Pending</p>
        </div>
        <div>
          <p class="font-medium">Scheduled</p>
        </div>
      </div>
    </section>

    <!-- Recent Activity Section -->
    <section class="bg-white shadow rounded-lg p-6">
      <h2 class="text-lg font-semibold mb-4">Recent Activity</h2>

      <!-- Activity Items -->
      <div class="mb-4">
        <h3 class="font-medium">Pickup completed</h3>
        <p class="text-sm text-gray-500">2 old laptops and 1 monitor - Oct. 28, 2024</p>
      </div>

      <div class="mb-4">
        <h3 class="font-medium">Points redeemed</h3>
        <p class="text-sm text-gray-500">P500 via Geash - Oct. 15, 2024</p>
      </div>
    </section>

    <!-- Quick Action Buttons -->
    <section class="bg-white shadow rounded-lg p-6">
      <h2 class="text-lg font-semibold mb-4">Quick Actions</h2>
      <div class="flex space-x-4">
        <a href="submit_e-waste.php" class="bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-6 rounded-lg shadow-md transition duration-300 flex items-center">
          <i class="fas fa-recycle mr-2"></i>
          Submit New E-Waste
        </a>
        <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg shadow-md transition duration-300 flex items-center">
          <i class="fas fa-gift mr-2"></i>
          Redeem Rewards
        </button>
      </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-white shadow rounded-lg p-6 mt-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- WasteWise Description -->
        <div>
          <h3 class="font-bold text-lg mb-3">WasteWise</h3>
          <p class="text-gray-600 text-sm">
            Making e-waste recycling simple, rewarding, and accessible for everyone in our community.
          </p>
        </div>

        <!-- Quick Links -->
        <div>
          <h3 class="font-bold text-lg mb-3">Quick Links</h3>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="text-gray-600 hover:text-green-700">How It Works</a></li>
            <li><a href="#" class="text-gray-600 hover:text-green-700">Accepted Items</a></li>
            <li><a href="#" class="text-gray-600 hover:text-green-700">Become a Collector</a></li>
            <li><a href="#" class="text-gray-600 hover:text-green-700">FAQ</a></li>
          </ul>
        </div>

        <!-- Contact Us -->
        <div>
          <h3 class="font-bold text-lg mb-3">Contact Us</h3>
          <ul class="space-y-2 text-sm text-gray-600">
            <li>123 Dagupan City</li>
            <li>contact@wastewise.ph</li>
            <li>(075) 123-4567</li>
          </ul>
        </div>
      </div>

      <hr class="my-6 border-gray-200">

      <!-- Copyright -->
      <div class="text-center text-sm text-gray-500">
        <p>&copy; 2024 WasteWise. All rights reserved.</p>
      </div>
    </footer>
  </main>
</body>

</html>