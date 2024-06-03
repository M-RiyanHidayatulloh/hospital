<div class="container">
    <h1>Edit Health Information</h1>
    <form action="{{ route('health_informations.update', $health_information->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Laravel's way to handle PUT requests via forms -->

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $health_information->title }}" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $health_information->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
