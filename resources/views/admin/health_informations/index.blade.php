<div class="container">
    <h1>Health Information</h1>
    <a href="{{ route('health_informations.create') }}" class="btn btn-primary mb-3">Add New</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th> <!-- Added Content Header -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($health_informations as $healthInformation)
                <tr>
                    <td>{{ $healthInformation->title }}</td>
                    <td>{{ $healthInformation->content }}</td> <!-- Display content -->
                    <td>
                        <a href="{{ route('health_informations.edit', $healthInformation->id) }}"
                            class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('health_informations.destroy', $healthInformation->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
