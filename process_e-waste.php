<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data here
    $items = $_POST['items'] ?? [];
    $description = $_POST['description'] ?? '';
    $quantity = $_POST['quantity'] ?? 1;
    $condition = $_POST['condition'] ?? '';
    $pickupDate = $_POST['pickupDate'] ?? '';
    $pickupAddress = $_POST['pickupAddress'] ?? '';
    $timeSlot = $_POST['timeSlot'] ?? '';
    
    // In a real application, you would:
    // 1. Validate the data
    // 2. Save to database
    // 3. Handle file uploads
    // 4. Send confirmation emails, etc.
    
    // For now, just show a success message and redirect
    $_SESSION['success_message'] = "Your e-waste pickup has been scheduled successfully!";
    header("Location: dashboard.php");
    exit();
} else {
    header("Location: submit_e-waste.php");
    exit();
}
?>