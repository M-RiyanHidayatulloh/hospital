<div class="container">
    <h1 class="my-4">Edit Online Consultation</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('online_consultations.update', $onlineConsultation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" id="patient_id" class="form-control">
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}"
                        {{ $onlineConsultation->patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control">
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}"
                        {{ $onlineConsultation->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="consultation_date">Consultation Date</label>
            <input type="date" name="consultation_date" id="consultation_date" class="form-control"
                value="{{ $onlineConsultation->consultation_date }}">
        </div>

        <div class="form-group">
            <label for="consultation_mode">Consultation Mode</label>
            <select name="consultation_mode" id="consultation_mode" class="form-control">
                <option value="Chat" {{ $onlineConsultation->consultation_mode == 'Chat' ? 'selected' : '' }}>Chat
                </option>
                <option value="Video" {{ $onlineConsultation->consultation_mode == 'Video' ? 'selected' : '' }}>Video
                </option>
                <option value="Audio" {{ $onlineConsultation->consultation_mode == 'Audio' ? 'selected' : '' }}>Audio
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea name="notes" id="notes" class="form-control">{{ $onlineConsultation->notes }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
