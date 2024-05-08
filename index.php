<?php include 'includes/db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Clearance System</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
            <h1>Welcome to the Student Clearance System</h1>
        </header>
        <main>
            <section class="intro">
                <p>Manage your clearance requests efficiently with our system. Submit your requests, track their status, and stay informed throughout the process.</p>
            </section>
            <section class="features">
                <h2>Key Features</h2>
                <ul>
                    <li>Submit clearance requests online.</li>
                    <li>Track the status of your requests in real-time.</li>
                    <li>Receive notifications on approval or denial.</li>
                    <li>View and edit your profile information.</li>
                </ul>
            </section>
            <section class="action-buttons">
                <a href="clearance_request_form.php" class="btn-primary">Submit Clearance Request</a>
                <a href="clearances_table.php" class="btn-secondary">View All Clearances</a>
            </section>
        </main>
        <footer>
            <p>&copy; <?php echo date("Y"); ?> Student Clearance System. All rights reserved.</p>
        </footer>
    </body>
</html>
