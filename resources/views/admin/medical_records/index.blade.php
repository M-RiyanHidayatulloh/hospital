<div class="container">
    <h1>Medical Records</h1>
    <a href="{{ route('medical_records.create') }}" class="btn btn-primary">Add New Medical Record</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            {{ $message }}
        </div>
    @endif
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Diagnosis</th>
                <th>Treatment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medical_records as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->patient->name }}</td>
                    <td>{{ $record->doctor->name }}</td>
                    <td>{{ $record->diagnosis }}</td>
                    <td>{{ $record->treatment }}</td>
                    <td>
                        <a href="{{ route('medical_records.edit', $record->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('medical_records.destroy', $record->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-right">
    {{ $medical_records->links() }}
    </div>
</div>
