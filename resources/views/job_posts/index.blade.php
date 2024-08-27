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
        <h1 class="mb-4">All Jobs Data</h1>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Location</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                <tr>
                    <td>{{ $job->id }}</td>
                    <td>{{ $job->job_title }}</td>
                    <td>{{ $job->date }}</td>
                    <td>{{ $job->salary }}</td>
                    <td>{{ $job->location }}</td>
                    <td>{{ $job->description }}</td>
                    <td>

                        <a href="{{ route('job_posts.edit', $job->id) }}" class="btn btn-warning btn-sm">Edit</a>


                        <form action="{{ route('job_posts.destroy', $job->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                        <a href="{{ route('job_posts.create') }}" class="btn btn-secondary">Back to Create</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
