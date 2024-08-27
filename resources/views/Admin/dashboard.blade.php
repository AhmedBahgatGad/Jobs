<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <div class="container my-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-4">
            @foreach($jobs as $job)
                <div class="col-md-4">
                    <div class="card shadow-sm border-light mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $job->job_title }}</h5>
                            <p class="card-text">{{ $job->description }}</p>
                            <p class="card-text"><small class="text-muted">{{ $job->location }}</small></p>
                            <p class="card-text"><strong>Salary:</strong> {{ $job->salary }}</p>

                            <div class="d-flex justify-content-between">
                                <form action="{{ route('admin.jobs.accept', $job->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </form>

                                <form action="{{ route('admin.jobs.reject', $job->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
