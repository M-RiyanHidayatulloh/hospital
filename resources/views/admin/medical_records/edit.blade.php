<div class="container">
    <h1>Edit Medical Record</h1>
    <form action="{{ route('medical_records.update', $medicalRecord->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" class="form-control" required>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}"
                        {{ $medicalRecord->patient_id == $patient->id ? 'selected' : '' }}>
                        {{ $patient->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" class="form-control" required>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}"
                        {{ $medicalRecord->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <textarea name="diagnosis" class="form-control" required>{{ $medicalRecord->diagnosis }}</textarea>
        </div>
        <div class="form-group">
            <label for="treatment">Treatment</label>
            <textarea name="treatment" class="form-control" required>{{ $medicalRecord->treatment }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
