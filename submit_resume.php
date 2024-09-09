<?php
// Connect to the SQLite database
$database = new SQLite3('visitors.db');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    // Handle file upload
    $resume = $_FILES['resume'];
    $target_dir = "uploads/";
    $resume_filename = basename($resume["name"]);
    $target_file = $target_dir . $resume_filename;

    // Move uploaded file to the server
    if (move_uploaded_file($resume["tmp_name"], $target_file)) {
        // Prepare SQL to insert the visitor's data into the database
        $stmt = $database->prepare("INSERT INTO resumes (name, email, resume_path) VALUES (:name, :email, :resume_path)");
        $stmt->bindValue(':name', $name, SQLITE3_TEXT);
        $stmt->bindValue(':email', $email, SQLITE3_TEXT);
        $stmt->bindValue(':resume_path', $target_file, SQLITE3_TEXT);
        
        // Execute the query and insert the data
        $stmt->execute();

        // Success message
        echo "Thank you, $name! Your resume has been successfully uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
