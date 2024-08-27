<h1>تعديل وظيفة</h1>

<form action="{{ route('admin.jobs.update', $job->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">ti</label>
    <input type="text" name="title" id="title" value="{{ $job->title }}">
    <label for="description">Discripthion</label>
    <textarea name="description" id="description">{{ $job->description }}</textarea>
    <button type="submit">update</button>
</form>
