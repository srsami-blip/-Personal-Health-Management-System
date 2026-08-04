<?php 
// 1. Connect to the database using your config file
include 'config.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Tracker | Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Daily Health Tracker</h1>
        
        <div class="top-bar">
            <a href="add.php" class="btn-add">Log Today's Health</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Weight (kg)</th>
                    <th>Sleep (hrs)</th>
                    <th>Water (glasses)</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // 2. Fetch all health logs from the database, sorted by the most recent date
                $sql = "SELECT * FROM health_logs ORDER BY log_date DESC";
                $result = mysqli_query($con, $sql);

                // 3. Check if there are any rows in the table
                if (mysqli_num_rows($result) > 0) {
                    // 4. Loop through each row and display it in the table
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['log_date']; ?></td>
                            <td><?php echo $row['weight_kg']; ?> kg</td>
                            <td><?php echo $row['sleep_hours']; ?> hrs</td>
                            <td><?php echo $row['water_glasses']; ?></td>
                            <td><?php echo $row['notes']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                                
                                <a href="action.php?delete_id=<?php echo $row['id']; ?>" 
                                   class="btn-delete" 
                                   onclick="return confirm('Are you sure you want to delete this log?')">
                                   Delete
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    // 5. Message shown if the database is currently empty
                    echo "<tr><td colspan='6' style='text-align:center;'>No health logs found. Click 'Log Today's Health' to start!</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="watermark">
            Created by <span>SR SAMI</span>
        </div>
    </div>
</body>
</html>