<div class="container">
    <h1>Patient</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">Add New Patient</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Birthdate</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->address }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->birthdate }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST"
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
    {{ $patients->links() }}
    </div>
<div class="card">
    <div class="card-body">
        <div class="container">
            <h1>Patient</h1>
            <a href="{{ route('patients.create') }}" class="btn btn-primary">Add New Patient</a>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->address }}</td>
                            <td>{{ $patient->phone }}</td>
                            <td>{{ $patient->birthdate }}</td>
                            <td>{{ $patient->gender }}</td>
                            <td>{{ $patient->description }}</td>
                            <td>
                                <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST"
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
        </div>
    </div>
</div>
