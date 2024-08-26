<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
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
                        <a class="nav-link" href="#">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Employers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Candidates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <!-- Dashboard Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Search Form -->
    <div class="container my-4">
        <form action="{{ route('jobs.search') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by job title or description" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>

    <!-- Job Cards Section -->
    <div class="container my-5">
        <div class="row g-4">
            @foreach($jobs as $job)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $job->job_title }}</h5>
                        <p class="card-text text-muted">{{ $job->location }}</p>
                        <p class="card-text">{{ Str::limit($job->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <small class="text-muted">{{ $job->date }}</small>
                            <a href="#" class="btn btn-primary btn-sm">View Details</a>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Salary: {{ $job->salary }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination (Optional) -->
        <div class="d-flex justify-content-center mt-4">
            {{ $jobs->links() }}
        </div>
    </div>

    <!-- Scripts for Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
