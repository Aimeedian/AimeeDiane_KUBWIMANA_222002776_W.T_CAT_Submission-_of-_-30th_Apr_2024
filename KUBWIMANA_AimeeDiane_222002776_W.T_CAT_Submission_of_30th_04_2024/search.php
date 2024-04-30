<?php
// Check if the 'query' GET parameter is set
if (isset($_GET['query']) && !empty($_GET['query'])) {
    // Connection details with single file
     include "dbconnection.php";
    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Queries for different tables
    $queries = [
        'employee' => "SELECT * FROM employee WHERE username LIKE '%$searchTerm%'",
        'holiday' => "SELECT * FROM holiday WHERE id LIKE '%$searchTerm%'",
        'attendance' => "SELECT *  FROM attendance WHERE id LIKE '%$searchTerm%'",
        'notification' => "SELECT * FROM notification WHERE content LIKE '%$searchTerm%'",
        'permission' => "SELECT * FROM permission WHERE id LIKE '%$searchTerm%'",
        'department' => "SELECT * FROM department WHERE name LIKE '%$searchTerm%'",
        'register' => "SELECT * FROM register WHERE firstname LIKE '%$searchTerm%'"
    ];

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>"; // Dynamic field extraction from result
            }
        } else {
            echo "<p>No results found in $table matching the search term: '$searchTerm'</p>";
        }
    }

    // Close the connection
    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>
