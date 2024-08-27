<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">JobSite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('job_posts.index') }} ">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('employers.index') }} ">Employers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Candidates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('contact') }}  ">Contact</a>
                    </li>
                    <!-- Dashboard Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contact Section -->
    <div class="container mt-5">
        <h1 class="mb-4">Contact Us</h1>
        <p class="lead">We would love to hear from you! Whether you have a question about our services, need assistance, or just want to share your feedback, feel free to reach out.</p>
        
        <div class="row">
            <div class="col-md-6">
                <h3>Contact Information</h3>
                <p><strong>Email:</strong> support@jobsite.com</p>
                <p><strong>Phone:</strong> +123 456 7890</p>
                <p><strong>Address:</strong> 123 Job Street, City, Country</p>
            </div>
            <div class="col-md-6">
                <h3>Send Us a Message</h3>
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="container p-4">
            <p class="text-muted">&copy; 2024 JobSite. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
