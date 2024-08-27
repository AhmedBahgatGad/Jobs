<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>All Jobs Data</h1>
            <a href="{{ route('job_posts.create') }}" class="btn btn-primary">Create New Job</a>
        </div>

        <div class="row">
            @foreach ($jobs as $job)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $job->job_title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $job->location }}</h6>
                        <p class="card-text"><strong>Date:</strong> {{ $job->date }}</p>
                        <p class="card-text"><strong>Salary:</strong> {{ $job->salary }}</p>
                        <p class="card-text">{{ Str::limit($job->description, 100) }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('job_posts.edit', $job->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('job_posts.destroy', $job->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
