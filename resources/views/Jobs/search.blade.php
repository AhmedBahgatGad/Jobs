<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Jobs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Search Jobs</h1>
        <form action="{{ route('jobs.search') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" id="job_title" name="job_title" class="form-control" placeholder="Enter job title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cat_id">Category ID</label>
                        <input type="text" id="cat_id" name="cat_id" class="form-control" placeholder="Enter category ID">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        @if(isset($jobs) && $jobs->isNotEmpty())
            <div class="list-group">
                @foreach($jobs as $job)
                    <div class="list-group-item">
                        <h5 class="mb-1">{{ $job->job_title }}</h5>
                        <p class="mb-1">Location: {{ $job->location }}</p>
                        <p class="mb-1">Salary: {{ $job->salary }}</p>
                        <p class="mb-1">Date: {{ $job->date }}</p>
                        <p class="mb-1">Description: {{ $job->description }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info" role="alert">
                No jobs found.
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
