<?php
// Start session
session_start();

// Include database connection
require 'db_connection.php';

// Generate a unique form token for the session
if (!isset($_SESSION['form_token'])) {
    $_SESSION['form_token'] = md5(uniqid(rand(), true));
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the session token exists and matches the submitted token
    if (isset($_SESSION['form_token']) && $_SESSION['form_token'] === $_POST['form_token']) {
        // Regenerate token to prevent resubmission
        unset($_SESSION['form_token']);

        // Sanitize and validate input data
        $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
        $exp_date = mysqli_real_escape_string($conn, $_POST['exp_date']);
        $cvv = mysqli_real_escape_string($conn, $_POST['cvv']);
        $payment_type = mysqli_real_escape_string($conn, $_POST['payment_type']);
        $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $travel_date = mysqli_real_escape_string($conn, $_POST['travel_date']);
        $travel_duration = (int) $_POST['travel_duration'];

        // Calculate travel_end_date
        $travel_end_date = date('Y-m-d', strtotime($travel_date . ' + ' . ($travel_duration - 1) . ' days'));

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format.'); window.history.back();</script>";
            exit;
        }

        // Validate phone number
        if (!preg_match('/^\d{10}$/', $phone)) {
            echo "<script>alert('Invalid phone number. It must be 10 digits.'); window.history.back();</script>";
            exit;
        }

        // Handle profile image upload
        if ($_FILES['profile_image']['error'] !== UPLOAD_ERR_OK) {
            // Display specific error code message
            echo "<script>alert('File upload error code: " . $_FILES['profile_image']['error'] . "'); window.history.back();</script>";
            exit;
        } else {
            // Check for valid file types (JPG and PNG)
            $allowed_types = ['image/jpeg', 'image/png'];
            $file_type = mime_content_type($_FILES['profile_image']['tmp_name']);

            if (!in_array($file_type, $allowed_types)) {
                echo "<script>alert('Invalid file type. Only JPG and PNG files are allowed.'); window.history.back();</script>";
                exit;
            }

            // Move the uploaded file to the desired location
            $upload_dir = 'uploads/';
            $filename = basename($_FILES['profile_image']['name']);
            $target_file = $upload_dir . $filename;

            // Ensure the directory exists
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                
            
        // Insert data into the database
        $sql = "INSERT INTO bookings (
                    account_number, exp_date, cvv, payment_type, customer_name, email, phone, 
                    travel_date, travel_end_date, profile_image
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssssssss",
            $account_number, $exp_date, $cvv, $payment_type,
            $customer_name, $email, $phone, $travel_date,
            $travel_end_date, $filename
        );

        if ($stmt->execute()) {
            $booking_id = $stmt->insert_id;
            echo "<script>alert('Booking created successfully! Booking ID: $booking_id');</script>";

            // Generate a QR Code
            require('phpqrcode/qrlib.php');
            $qr_code_data = "https://example.com/user_image_collection.php?user_id=$booking_id";
            $qr_code_file = 'qrcodes/' . $booking_id . '.png';
            QRcode::png($qr_code_data, $qr_code_file, QR_ECLEVEL_L, 5);

            // Generate ID card HTML
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
                <link rel="stylesheet" href="./downlode.css">
            </head>
            <body>
                <div id="body-section" class="body-section">
                    <div id="idCard" class="id-card">
                        <div class="header">
                            <h2><?php echo strtoupper(htmlspecialchars($customer_name)); ?></h2>
                            <p>ID NO: <?php echo htmlspecialchars($booking_id); ?></p>
                        </div>

                        <img src="uploads/<?php echo htmlspecialchars($filename); ?>" alt="Profile Photo" class="photo">

                        <div class="info">
                            <p><strong>Start:</strong> <?php echo htmlspecialchars($travel_date); ?></p>
                            <p><strong>Exp:</strong> <?php echo htmlspecialchars($travel_end_date); ?></p>
                        </div>
                    </div>
                    <div id="idCard" class="id-card">
                        <h3>Login your Image Collection</h3>
                        <img src="<?php echo $qr_code_file; ?>" alt="QR Code" class="qr-code">

                        <div class="contact">
                            <p>Email: travellanka@gmail.com</p>
                            <p>Website: www.travellanka.com</p>
                        </div>
                    </div>
                </div>

                <button id="downloadBtn" onclick="downloadPDF()">Download PDF</button>

                <script>
                    function downloadPDF() {
                        const element = document.getElementById('body-section');
                        const opt = {
                            margin: 1,
                            filename: 'id-card.pdf',
                            image: { type: 'jpeg', quality: 0.98 },
                            html2canvas: { scale: 2 },
                            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                        };

                        html2pdf().set(opt).from(element).save();
                    }
                </script>
            </body>
            </html>
            <?php
        } else {
            echo "<script>alert('Error creating booking: " . $stmt->error . "');</script>";
        }
    } else {
        echo "<script>alert('Error moving uploaded file. Please try again.');</script>";
    }
}

    } else {
        echo "<script>alert('Invalid form submission.'); window.history.back();</script>";
    }
} else {
    // Redirect to the form if the script is accessed without submitting the form
    header('Location: booking_form.php');
    exit;
}
?>
