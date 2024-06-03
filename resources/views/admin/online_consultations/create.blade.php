<div class="container">
    <h1 class="my-4">Create Online Consultation</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('online_consultations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" id="patient_id" class="form-control">
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control">
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="consultation_date">Consultation Date</label>
            <input type="date" name="consultation_date" id="consultation_date" class="form-control">
        </div>

        <div class="form-group">
            <label for="consultation_mode">Consultation Mode</label>
            <select name="consultation_mode" id="consultation_mode" class="form-control">
                <option value="Chat">Chat</option>
                <option value="Video">Video</option>
                <option value="Audio">Audio</option>
            </select>
        </div>

        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea name="notes" id="notes" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
