@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Apply for {{ $job->title }}</h2>
    <form action="{{ route('jobs.apply.submit', $job->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="resume">Upload Resume</label>
            <input type="file" class="form-control" id="resume" name="resume" required>
        </div>
        <div class="form-group mt-3">
            <label for="cover_letter">Cover Letter (optional)</label>
            <textarea class="form-control" id="cover_letter" name="cover_letter" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit Application</button>
    </form>
</div>
@endsection
