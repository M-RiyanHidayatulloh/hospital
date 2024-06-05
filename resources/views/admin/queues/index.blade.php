<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Queues</h1>
            <a href="{{ route('queues.create') }}" class="btn btn-primary mb-3">Add New Queue</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Appointment ID</th>
                        <th>Queue Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($queues as $queue)
                        <tr>
                            <td>{{ $queue->id }}</td>
                            <td>{{ $queue->appointment_id }}</td>
                            <td>{{ $queue->queue_number }}</td>
                            <td>{{ $queue->status }}</td>
                            <td>
                                <a href="{{ route('queues.edit', $queue->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('queues.destroy', $queue->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pull-right">
            {{ $queues->links() }}
            </div>
        </div>
    </div>
</div>
