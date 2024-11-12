<?php
include '../Admin/dbconn.php'; // Include your database connection

// Fetch the action history
$result = $conn->query("SELECT id, action, description, created_at FROM action_history ORDER BY created_at DESC");
?>

<div class="container-fluid p-0 m-0" id="history" style="display: none;">
    <h2 class="text-center">Action History</h2>

    <div class="table-responsive"> <!-- Add responsive table container -->
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Description</th>
                    <th>Date & Time</th>
                    <th>Action</th> <!-- New column for delete action -->
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['action']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm delete-btn" data-id="<?php echo $row['id']; ?>">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No history yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.delete-btn').on('click', function() {
        var id = $(this).data('id');
        
        if (confirm('Are you sure you want to delete this record?')) {
            $.ajax({
                url: 'delete_history.php',
                type: 'POST',
                data: {id: id},
                success: function(response) {
                    alert(response);
                    location.reload(); // Reload the page to see changes
                },
                error: function() {
                    alert('Error deleting record.');
                }
            });
        }
    });
});
</script>

<?php
$conn->close(); // Close the database connection
?>
