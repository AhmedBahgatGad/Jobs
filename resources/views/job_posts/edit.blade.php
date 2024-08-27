<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Update Job</h1>
        <form action="{{ route('job_posts.update', $job->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="job_title" class="form-label">Job Title:</label>
                <input type="text" class="form-control" name="job_title" id="job_title" value="{{ old('job_title', $job->job_title) }}" required>
                @error('job_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date:</label>
                <input type="date" class="form-control" name="date" id="date" value="{{ old('date', $job->date) }}" required>
                @error('date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="salary" class="form-label">Salary:</label>
                <input type="number" class="form-control" name="salary" id="salary" value="{{ old('salary', $job->salary) }}" required>
                @error('salary')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location:</label>
                <input type="text" class="form-control" name="location" id="location" value="{{ old('location', $job->location) }}" required>
                @error('location')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" name="description" id="description" required>{{ old('description', $job->description) }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            

            <div class="d-flex justify-content-between">
                <button class="btn btn-primary" type="submit" >Update Job</button>
                <a href="{{ route('job_posts.index') }}" class="btn btn-secondary">Back to Jobs</a>
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>