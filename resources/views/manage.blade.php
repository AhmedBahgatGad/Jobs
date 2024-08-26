@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Manage Your Applications</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Job Title</th>
                <th scope="col">Date Applied</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
                <tr>
                    <td>{{ $application->job->title }}</td>
                    <td>{{ $application->created_at->format('Y-m-d') }}</td>
                    <td>{{ $application->status ?? 'Pending' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
