<div class="wrapper">
    <div class="form-wrapper">
        <h2>Log Daily Health</h2>
        <form action="action.php" method="POST">
            <label>Date</label>
            <input type="date" name="log_date" required>
            
            <label>Weight (kg)</label>
            <input type="number" name="weight_kg" step="0.1" placeholder="e.g. 70.5" required>
            
            <label>Sleep Hours</label>
            <input type="number" name="sleep_hours" placeholder="e.g. 8" required>
            
            <label>Water Intake (Glasses)</label>
            <input type="number" name="water_glasses" placeholder="e.g. 10" required>
            
            <label>Notes</label>
            <textarea name="notes" rows="4" placeholder="How was your day?"></textarea>
            
            <div class="btn-box">
                <button type="submit" name="add_health" class="btn-add">Save Log</button>
                <a href="index.php" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</div>