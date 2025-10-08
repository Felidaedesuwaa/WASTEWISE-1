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
    <title>Rewards - WasteWise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .reward-card {
            transition: all 0.3s ease;
        }

        .reward-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-white border-b shadow-sm flex justify-between items-center px-6 py-3">
        <div class="flex items-center space-x-2">
            <div class="w-5 h-5 rounded-full border border-green-500"></div>
            <h1 class="text-xl font-semibold text-green-700">WasteWise</h1>
        </div>
        <nav class="flex space-x-6 text-sm font-medium">
  <a href="dashboard.php" class="hover:text-green-700">Dashboard</a>
  <a href="submit_e-waste.php" class="hover:text-green-700">Submit E-Waste</a>
  <a href="rewards.php" class="hover:text-green-700">Rewards</a>
</nav>
        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-600">Welcome, <?php echo $_SESSION['username']; ?></span>
            <a href="logout.php" class="text-sm text-gray-600 hover:text-black">Logout</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto p-6 space-y-8">
        <!-- Page Title -->
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-900">Your Rewards</h1>
        </div>

        <!-- Points Summary -->
        <section class="bg-white shadow rounded-lg p-8 text-center">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Points Summary</h2>
            <div class="bg-green-50 border border-green-200 rounded-lg p-6 mx-auto max-w-md">
                <p class="text-4xl font-bold text-green-700 mb-2">1,250 points</p>
                <p class="text-green-600 font-medium">Available for redemption</p>
            </div>
        </section>

        <hr class="border-gray-300">

        <!-- Redeem Points Section -->
        <section class="bg-white shadow rounded-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Redeem Points</h2>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- GCash Card -->
                <div class="reward-card bg-white border border-gray-200 rounded-xl p-6 hover:border-green-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-wallet text-green-600"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900">GCash</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">100 points = ₱100</p>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Minimum redemption:</span>
                            <span class="font-medium">100 points</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Processing time:</span>
                            <span class="font-medium">24-48 hours</span>
                        </div>
                    </div>
                    <button onclick="openRedeemModal('GCash')" class="w-full mt-6 bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300">
                        Redeem with GCash
                    </button>
                </div>

                <!-- PayPal Card -->
                <div class="reward-card bg-white border border-gray-200 rounded-xl p-6 hover:border-green-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fab fa-paypal text-blue-600"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900">PayPal</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">100 points = ₱100</p>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Minimum redemption:</span>
                            <span class="font-medium">100 points</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">Processing time:</span>
                            <span class="font-medium">2-3 business days</span>
                        </div>
                    </div>
                    <button onclick="openRedeemModal('PayPal')" class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300">
                        Redeem with PayPal
                    </button>
                </div>
            </div>
        </section>

        <!-- Point Value Summary -->
        <section class="bg-green-50 border border-green-200 rounded-lg p-6">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-semibold text-green-800">Point Summary</h3>
                    <p class="text-green-600">Cash value</p>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold text-green-700">₱1,250</p>
                    <p class="text-green-600">1,250 points</p>
                </div>
            </div>
        </section>

        <!-- Redemption History Section -->
        <section class="bg-white shadow rounded-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Redemption History</h2>

            <div class="space-y-6">
                <!-- GCash Transfer -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">GCash Transfer</h3>
                            <p class="text-gray-600">October 15, 2023</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-red-600">-500 Points</p>
                            <p class="text-gray-600">₱500</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center space-x-2">
                        <div class="w-4 h-4 border-2 border-green-500 rounded"></div>
                        <span class="text-green-600 font-medium">Completed</span>
                    </div>
                </div>

                <!-- PayPal Transfer -->
                <div class="border border-gray-200 rounded-lg p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">PayPal Transfer</h3>
                            <p class="text-gray-600">October 15, 2023</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-red-600">-300 Points</p>
                            <p class="text-gray-600">₱300</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center space-x-2">
                        <div class="w-4 h-4 border-2 border-green-500 rounded"></div>
                        <span class="text-green-600 font-medium">Completed</span>
                    </div>
                </div>
            </div>

            <hr class="my-8 border-gray-300">

            <!-- Quick Redemption Info -->
            <div class="grid md:grid-cols-2 gap-6">
                <div class="text-center p-4">
                    <h4 class="font-semibold text-gray-900 mb-2">GCash</h4>
                    <p class="text-gray-600">100 points = ₱100</p>
                </div>
                <div class="text-center p-4">
                    <h4 class="font-semibold text-gray-900 mb-2">PayPal</h4>
                    <p class="text-gray-600">100 points = ₱100</p>
                </div>
            </div>

            <div class="text-center mt-6">
                <button onclick="openRedeemModal('GCash')" class="bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-8 rounded-lg transition duration-300">
                    Redeem Points
                </button>
            </div>
        </section>
    </main>

    <!-- Redeem Modal -->
    <div id="redeemModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-900" id="modalTitle">Redeem Points</h3>
                <button onclick="closeRedeemModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Amount to Redeem</label>
                    <div class="flex space-x-2">
                        <input type="number" id="redeemAmount" min="100" step="100" value="100" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500">
                        <span class="flex items-center px-3 bg-gray-100 border border-gray-300 rounded-md text-gray-700">
                            points
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Minimum: 100 points</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" id="accountLabel">GCash Number</label>
                    <input type="text" id="accountNumber" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500" placeholder="Enter your account number">
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Points to redeem:</span>
                        <span id="pointsDisplay" class="font-medium">100 points</span>
                    </div>
                    <div class="flex justify-between text-sm mt-1">
                        <span class="text-gray-600">Cash value:</span>
                        <span id="cashDisplay" class="font-bold text-green-600">₱100</span>
                    </div>
                </div>

                <div class="flex space-x-3 pt-4">
                    <button onclick="closeRedeemModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-3 px-4 rounded-lg transition duration-300">
                        Cancel
                    </button>
                    <button onclick="processRedemption()" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300">
                        Confirm Redeem
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentProvider = '';

        function openRedeemModal(provider) {
            currentProvider = provider;
            const modal = document.getElementById('redeemModal');
            const title = document.getElementById('modalTitle');
            const accountLabel = document.getElementById('accountLabel');

            title.textContent = `Redeem with ${provider}`;
            accountLabel.textContent = provider === 'GCash' ? 'GCash Number' : 'PayPal Email';
            document.getElementById('accountNumber').placeholder = provider === 'GCash' ? '09XX XXX XXXX' : 'your.email@example.com';

            modal.classList.remove('hidden');
            updateRedemptionDisplay();
        }

        function closeRedeemModal() {
            document.getElementById('redeemModal').classList.add('hidden');
            document.getElementById('redeemAmount').value = '100';
            document.getElementById('accountNumber').value = '';
        }

        function updateRedemptionDisplay() {
            const amount = parseInt(document.getElementById('redeemAmount').value) || 0;
            const pointsDisplay = document.getElementById('pointsDisplay');
            const cashDisplay = document.getElementById('cashDisplay');

            pointsDisplay.textContent = `${amount} points`;
            cashDisplay.textContent = `₱${amount}`;
        }

        function processRedemption() {
            const amount = parseInt(document.getElementById('redeemAmount').value) || 0;
            const accountNumber = document.getElementById('accountNumber').value.trim();

            if (amount < 100) {
                alert('Minimum redemption is 100 points.');
                return;
            }

            if (amount > 1250) {
                alert('You don\'t have enough points. Available: 1,250 points');
                return;
            }

            if (!accountNumber) {
                alert(`Please enter your ${currentProvider === 'GCash' ? 'GCash number' : 'PayPal email'}.`);
                return;
            }

            // In a real application, you would send this to your server
            alert(`Success! ${amount} points (₱${amount}) will be transferred to your ${currentProvider} account within 24-48 hours.`);
            closeRedeemModal();
        }

        // Event listeners
        document.getElementById('redeemAmount').addEventListener('input', updateRedemptionDisplay);

        // Close modal when clicking outside
        document.getElementById('redeemModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeRedeemModal();
            }
        });
    </script>
</body>

</html>