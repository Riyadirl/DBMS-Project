<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Rent-Ease</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .contact-container {
        margin-top: 100px;
    }

    .contact-container h1 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .contact-info {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .contact-info h4 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .contact-info p {
        font-size: 16px;
        margin-bottom: 15px;
    }

    .social-links ul {
        list-style: none;
        padding: 0;
    }

    .social-links li {
        margin-bottom: 10px;
    }

    .social-links a {
        text-decoration: none;
        color: #007bff;
        transition: color 0.3s ease;
    }

    .social-links a:hover {
        color: #0056b3;
    }
    </style>
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="container contact-container">
        <h1>Contact Us</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="contact-info">
                    <h4>Contact Information</h4>
                    <p><strong>Phone:</strong> +1-123-456-7890</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-info social-links">
                    <h4>Connect with Us</h4>
                    <ul>
                        <li><a href="https://www.facebook.com/rentease" target="_blank">Facebook</a></li>
                        <li><a href="https://www.instagram.com/rentease" target="_blank">Instagram</a></li>
                        <li><a href="https://www.twitter.com/rentease" target="_blank">Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>