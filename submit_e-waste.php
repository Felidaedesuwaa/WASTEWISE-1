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
    <title>Submit E-Waste - WasteWise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .file-upload {
            border: 2px dashed #d1d5db;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .file-upload:hover {
            border-color: #10b981;
        }

        .file-upload.dragover {
            border-color: #10b981;
            background-color: #f0fdf4;
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
    <main class="max-w-3xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Submit E-Waste for Pickup</h1>

        <form id="eWasteForm" class="space-y-8" action="process_e-waste.php" method="POST" enctype="multipart/form-data">
            <!-- E-Waste Items Section -->
            <section class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">E-Waste Items</h2>
                
                <!-- Select Items -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Select Items</label>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <input type="checkbox" id="laptop" name="items[]" value="Laptop" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="laptop" class="ml-2 text-sm text-gray-700">Laptop</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="smartphone" name="items[]" value="Smartphone" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="smartphone" class="ml-2 text-sm text-gray-700">Smartphone</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="tablet" name="items[]" value="Tablet" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="tablet" class="ml-2 text-sm text-gray-700">Tablet</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="monitor" name="items[]" value="Monitor" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="monitor" class="ml-2 text-sm text-gray-700">Monitor</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="keyboard" name="items[]" value="Keyboard" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="keyboard" class="ml-2 text-sm text-gray-700">Keyboard</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="mouse" name="items[]" value="Mouse" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="mouse" class="ml-2 text-sm text-gray-700">Mouse</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="printer" name="items[]" value="Printer" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="printer" class="ml-2 text-sm text-gray-700">Printer</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="other" name="items[]" value="Other" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="other" class="ml-2 text-sm text-gray-700">Other</label>
                        </div>
                    </div>
                </div>
                
                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" placeholder="Please describe your e-waste items..."></textarea>
                </div>
            </section>
            
            <!-- Quantity Section -->
            <section class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Quantity</h2>
                
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">How many items?</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1" class="w-24 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
            </section>
            
            <!-- Condition & Instructions -->
            <section class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Condition & Instructions</h2>
                
                <div>
                    <label for="condition" class="block text-sm font-medium text-gray-700 mb-2">Please describe the condition of your e-waste items and any special instructions for pickup</label>
                    <textarea id="condition" name="condition" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" placeholder="e.g., Laptop screen is broken but still powers on. Please ring doorbell twice."></textarea>
                </div>
            </section>
            
            <!-- Upload Images -->
            <section class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Upload Images</h2>
                
                <div class="file-upload p-8 text-center cursor-pointer" id="dropArea">
                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                    <p class="text-lg font-medium">Click to upload or drag and drop</p>
                    <p class="text-sm text-gray-500 mt-2">PNG, JPG up to 10MB</p>
                    <input type="file" id="fileInput" name="images[]" class="hidden" accept="image/png, image/jpeg" multiple>
                </div>
                
                <div id="fileList" class="mt-4 space-y-2"></div>
            </section>
            
            <!-- Pickup Details -->
            <section class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Pickup Details</h2>
                
                <!-- Preferred Pickup Date -->
                <div class="mb-6">
                    <label for="pickupDate" class="block text-sm font-medium text-gray-700 mb-2">Preferred Pickup Date</label>
                    <input type="date" id="pickupDate" name="pickupDate" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
                
                <!-- Pickup Address -->
                <div class="mb-6">
                    <label for="pickupAddress" class="block text-sm font-medium text-gray-700 mb-2">Pickup Address</label>
                    <textarea id="pickupAddress" name="pickupAddress" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" placeholder="Enter your complete address..."><?php echo isset($_SESSION['user_address']) ? $_SESSION['user_address'] : ''; ?></textarea>
                </div>
                
                <!-- Time Slot -->
                <div>
                    <label for="timeSlot" class="block text-sm font-medium text-gray-700 mb-2">Select time slot</label>
                    <select id="timeSlot" name="timeSlot" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                        <option value="">Select a time slot</option>
                        <option value="8:00 AM - 10:00 AM">8:00 AM - 10:00 AM</option>
                        <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                        <option value="1:00 PM - 3:00 PM">1:00 PM - 3:00 PM</option>
                        <option value="3:00 PM - 5:00 PM">3:00 PM - 5:00 PM</option>
                    </select>
                </div>
            </section>
            
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-8 rounded-lg shadow-md transition duration-300">
                    Schedule Pickup
                </button>
            </div>
        </form>
    </main>

    <script>
        // File upload functionality
        const dropArea = document.getElementById('dropArea');
        const fileInput = document.getElementById('fileInput');
        const fileList = document.getElementById('fileList');

        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        // Highlight drop area when item is dragged over it
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        // Handle dropped files
        dropArea.addEventListener('drop', handleDrop, false);

        // Handle click to upload
        dropArea.addEventListener('click', () => {
            fileInput.click();
        });

        // Handle file input change
        fileInput.addEventListener('change', function() {
            handleFiles(this.files);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight() {
            dropArea.classList.add('dragover');
        }

        function unhighlight() {
            dropArea.classList.remove('dragover');
        }

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }

        function handleFiles(files) {
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                
                // Validate file type and size
                if (!file.type.match('image.*')) {
                    alert('Please upload only image files (PNG, JPG).');
                    continue;
                }
                
                if (file.size > 10 * 1024 * 1024) {
                    alert('File size exceeds 10MB limit.');
                    continue;
                }
                
                // Display file info
                const fileItem = document.createElement('div');
                fileItem.className = 'flex items-center justify-between p-2 bg-gray-50 rounded';
                
                const fileInfo = document.createElement('div');
                fileInfo.className = 'flex items-center';
                
                const fileIcon = document.createElement('i');
                fileIcon.className = 'fas fa-file-image text-green-500 mr-2';
                
                const fileName = document.createElement('span');
                fileName.className = 'text-sm';
                fileName.textContent = file.name;
                
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'text-red-500 hover:text-red-700';
                removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                removeBtn.onclick = function() {
                    fileItem.remove();
                };
                
                fileInfo.appendChild(fileIcon);
                fileInfo.appendChild(fileName);
                fileItem.appendChild(fileInfo);
                fileItem.appendChild(removeBtn);
                fileList.appendChild(fileItem);
            }
        }

        // Form submission
        document.getElementById('eWasteForm').addEventListener('submit', function(e) {
            // Basic validation
            const selectedItems = document.querySelectorAll('input[name="items[]"]:checked');
            if (selectedItems.length === 0) {
                e.preventDefault();
                alert('Please select at least one e-waste item.');
                return;
            }

            const pickupDate = document.getElementById('pickupDate').value;
            if (!pickupDate) {
                e.preventDefault();
                alert('Please select a preferred pickup date.');
                return;
            }

            const pickupAddress = document.getElementById('pickupAddress').value;
            if (!pickupAddress.trim()) {
                e.preventDefault();
                alert('Please enter your pickup address.');
                return;
            }

            const timeSlot = document.getElementById('timeSlot').value;
            if (!timeSlot) {
                e.preventDefault();
                alert('Please select a time slot.');
                return;
            }

            // If all validations pass, form will submit normally
        });

        // Set minimum date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('pickupDate').min = today;
    </script>
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