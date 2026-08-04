<?php 
include 'config.php'; 

// Get the ID from the URL
$id = $_GET['id'];

// Fetch the existing data for this specific ID
$result = mysqli_query($con, "SELECT * FROM health_logs WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Health Log</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update Health Log</h2>
        <form action="action.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label>Date</label>
            <input type="date" name="log_date" value="<?php echo $row['log_date']; ?>" required>
            
            <label>Weight (kg)</label>
            <input type="number" name="weight_kg" step="0.1" value="<?php echo $row['weight_kg']; ?>" required>
            
            <label>Sleep Hours</label>
            <input type="number" name="sleep_hours" value="<?php echo $row['sleep_hours']; ?>" required>
            
            <label>Water Intake</label>
            <input type="number" name="water_glasses" value="<?php echo $row['water_glasses']; ?>" required>
            
            <label>Notes</label>
            <textarea name="notes" rows="4"><?php echo $row['notes']; ?></textarea>
            
            <div style="margin-top:20px;">
                <button type="submit" name="update_health" class="btn-add">Update Log</button>
                <a href="index.php" style="margin-left:10px; color:gray;">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>