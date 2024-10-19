<?php
session_start();
include 'config.php';
include 'head.php';

if (!isset($_SESSION['user'])) {
    echo "<h1>Welcome!</h1>";
    echo '<a href="login.php"><button>Login</button></a>';
    echo '<a href="register.php"><button>Register</button></a>';
} else {
    echo "<h1>User List</h1>";
    $order = $_SESSION['order'] ?? 'ASC';
    $query = "SELECT * FROM users ORDER BY name $order";
    $result = pg_query($db, $query);

    if ($result) {
        echo '<table><tr><th>Photo</th><th>Name</th><th>Phone Number</th><th>Registration Date</th></tr>';
        while ($user = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td><img src="photos/' . htmlspecialchars($user['photo']) . '" alt="User Photo"></td>';
            echo '<td>' . htmlspecialchars($user['name']) . '</td>';
            echo '<td>' . htmlspecialchars($user['telefon']) . '</td>';
            echo '<td>' . htmlspecialchars($user['registration_date']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<a href="logout.php"><button>Logout</button></a>';
    } else {
        echo "Error fetching users.";
    }
}
