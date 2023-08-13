// upload.php
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["video"])) {
    $uploadDir = "uploads/";
    $uploadedFile = $_FILES["video"];

    // Check for errors during upload
    if ($uploadedFile["error"] === UPLOAD_ERR_OK) {
        $fileName = basename($uploadedFile["name"]);
        $filePath = $uploadDir . $fileName;

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($uploadedFile["tmp_name"], $filePath)) {
            // You could store the video metadata or other information in a database here

            // Respond with a success message
            http_response_code(200);
            echo "success";
        } else {
            http_response_code(500);
            echo "Error moving uploaded file.";
        }
    } else {
        http_response_code(400);
        echo "Error during file upload.";
    }
} else {
    http_response_code(400);
    echo "Invalid request.";
}
?>
