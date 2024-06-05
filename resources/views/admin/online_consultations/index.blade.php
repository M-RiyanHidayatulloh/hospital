<div class="container">
    <h1 class="my-4">Online Consultations</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('online_consultations.create') }}" class="btn btn-primary mb-4">Create New Consultation</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Mode</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($online_consultations as $consultation)
                <tr>
                    <td>{{ $consultation->id }}</td>
                    <td>{{ $consultation->patient->name }}</td>
                    <td>{{ $consultation->doctor->name }}</td>
                    <td>{{ $consultation->consultation_date }}</td>
                    <td>{{ $consultation->consultation_mode }}</td>
                    <td>
                        <a href="{{ route('online_consultations.edit', $consultation->id) }}"
                            class="btn btn-warning">Edit</a>
                        <form action="{{ route('online_consultations.destroy', $consultation->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-right">
    {{ $online_consultations->links() }}
    </div>
</div>
