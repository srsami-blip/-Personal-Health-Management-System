<?php
// 1. Connect to the database
include 'config.php';

// --- CREATE LOGIC (Add New Log) ---
if (isset($_POST['add_health'])) {
    $log_date = $_POST['log_date'];
    $weight = $_POST['weight_kg'];
    $sleep = $_POST['sleep_hours'];
    $water = $_POST['water_glasses'];
    $notes = $_POST['notes'];

    $query = "INSERT INTO health_logs (log_date, weight_kg, sleep_hours, water_glasses, notes) 
              VALUES ('$log_date', '$weight', '$sleep', '$water', '$notes')";

    if (mysqli_query($con, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// --- UPDATE LOGIC (Edit Existing Log) ---
if (isset($_POST['update_health'])) {
    $id = $_POST['id']; // Hidden ID from edit.php
    $log_date = $_POST['log_date'];
    $weight = $_POST['weight_kg'];
    $sleep = $_POST['sleep_hours'];
    $water = $_POST['water_glasses'];
    $notes = $_POST['notes'];

    $query = "UPDATE health_logs SET 
              log_date='$log_date', 
              weight_kg='$weight', 
              sleep_hours='$sleep', 
              water_glasses='$water', 
              notes='$notes' 
              WHERE id=$id";

    if (mysqli_query($con, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

// --- DELETE LOGIC ---
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $query = "DELETE FROM health_logs WHERE id = $id";

    if (mysqli_query($con, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}
?>