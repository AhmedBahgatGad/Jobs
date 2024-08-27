<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for {{ $job->job_title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Apply for {{ $job->job_title }}</h1>
        <p><strong>Location:</strong> {{ $job->location }}</p>
        <p><strong>Description:</strong> {{ $job->description }}</p>
        <p><strong>Salary:</strong> {{ $job->salary }}</p>
        <form action="{{ route('jobs.submitApplication', $job->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Submit Application</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
