<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "roman_portfolio_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$firstName = $_POST['firstName'];
$lastName  = $_POST['lastName'];
$dob       = $_POST['dob'];
$email     = $_POST['email'];
$phone     = $_POST['phone'];
$address   = $_POST['address'];
$position  = $_POST['position'];
$workType  = $_POST['workType'];
$gender    = $_POST['gender'];
$disability = $_POST['disability'];
$race      = $_POST['race'];
$portfolio = $_POST['portfolio'];
$coverLetter = $_POST['coverLetter'];

// Save files under portfolio/uploads (filesystem)
$uploadDir = __DIR__ . "/../uploads/"; 
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$rawName = basename($_FILES["resume"]["name"]);
$safeName = time() . "_" . preg_replace('/[^A-Za-z0-9._-]/', '_', $rawName);
$targetFsPath = $uploadDir . $safeName;

if (!move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFsPath)) {
    die("Failed to upload file.");
}

// Web-relative path to store in DB (adjust if your site root differs)
$resumePathForDb = "uploads/" . $safeName;
$resumePath = $resumePathForDb;

// Insert into DB
$sql = "INSERT INTO collaborators
(first_name, last_name, dob, email, phone, address, position, work_type, gender, disability, race, portfolio, cover_letter, resume)
VALUES
('$firstName', '$lastName', '$dob', '$email', '$phone', '$address', '$position', '$workType', '$gender', '$disability', '$race', '$portfolio', '$coverLetter', '$resumePath')";

if ($conn->query($sql) === TRUE) {
    echo <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <title>Form Submitted</title>
            <link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="../css/collaborate.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        </head>
        <body>
            <main class="main-content">
                <section class="submit-success" role="status" aria-live="polite">
                    <div class="icon"><i class="fa-solid fa-circle-check"></i></div>
                    <h1>Thank you — submission received!</h1>
                    <p>We received your application. Ika-contact ka namin kapag may update.</p>
                    <a class="back-home-btn" href="../index.html"><i class="fa-solid fa-house"></i> Go back to Home</a>
                </section>
            </main>
        </body>
        </html>
        HTML;
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>