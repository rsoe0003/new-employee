<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css"/>
</head>
  <body>
    <div class="container mt-4">  
        <div class="card">
            <div class="card-body">
            <form method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">
                    <!-- First Name -->
                    <div class="col-12 col-lg-6 mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="firstName"
                        placeholder="Enter first name..."
                        value="{{ $employee->first_name }}"
                        name="first_name"
                    />
                    </div>

                    <!-- Last Name -->
                    <div class="col-12 col-lg-6 mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="lastName"
                        placeholder="Enter last name..."
                        value="{{ $employee->last_name }}"
                        name="last_name"
                    />
                    </div>

                    <!-- Job Position -->
                    <div class="col-12 col-lg-6 mb-3">
                    <label for="jobPosition" class="form-label">Job Position</label>
                    <select class="form-select" id="jobPosition" name="job_position" required>
                        <option selected value="{{ $employee->job_position }}">{{ $employee->job_position }}</option>
                        <option value="Manager">Manager</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Staff">Staff</option>
                    </select>
                    </div>

                    <!-- Date of Birth -->
                    <div class="col-12 col-lg-6 mb-3">
                    <label for="dateOfBirth" class="form-label"
                        >Date of Birth</label
                    >
                    <input type="date" class="form-control" id="dateOfBirth" name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth) }}" />
                    </div>

                    <!-- Phone Number -->
                    <div class="col-12 col-lg-6 mb-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input
                        type="number"
                        class="form-control"
                        id="phoneNumber"
                        placeholder="Enter phone number..."
                        value="{{ $employee->phone_number }}"
                        name="phone_number"
                        required
                    />
                    </div>

                    <!-- Email -->
                    <div class="col-12 col-lg-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder="Enter email..."
                        value="{{ $employee->email }}"
                        name="email"
                    />
                    </div>

                    <!-- Province -->
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="province" class="form-label">Province</label>
                        <select class="form-select" id="province" name="province" required>
                            <option value="{{ $employee->province }}" selected>{{ $employee->province }}</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                        </select>
                    </div>

                    <!-- City -->
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="city" class="form-label">City</label>
                        <select class="form-select" id="city" name="city" required>
                            <option value="{{ $employee->city }}" selected>{{ $employee->city }}</option>
                        </select>
                    </div>

                    <!-- Address -->
                    <div class="col-12 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea
                        class="form-control"
                        id="address"
                        rows="3"
                        placeholder="Enter address..."
                        name="address"
                        required
                    >{{ $employee->address }}</textarea>
                    </div>

                    <!-- ZIP Code -->
                    <div class="col-12 col-lg-6 mb-3">
                    <label for="zipCode" class="form-label">ZIP Code</label>
                    <input
                        type="number"
                        class="form-control"
                        id="zipCode"
                        placeholder="Enter ZIP code..."
                        name="zip_code"
                        value="{{ $employee->zip_code }}"
                    />
                    </div>

                    <!-- KTP Number -->
                    <div class="col-12 col-lg-6 mb-3">
                    <label for="ktpNumber" class="form-label">KTP Number</label>
                    <input
                        type="number"
                        class="form-control"
                        id="ktpNumber"
                        placeholder="Enter KTP number..."
                        name="ktp_number"
                        value="{{ $employee->ktp_number }}"
                    />
                    </div>

                    <!-- KTP Image -->
                    <div class="col-12 mb-3">
                    <label for="ktpImage" class="form-label">KTP Image</label>
                    <input
                        type="file"
                        class="form-control"
                        id="ktpImage"
                        name="ktp_image"
                    /><img src="{{ Storage::url($employee->ktp_image) }}" width="100" alt="KTP Image">
                    </div>

                    <!-- Bank Account -->
                    <div class="col-12 col-lg-6 mb-3">
                    <label for="bankAccount" class="form-label">Bank Account</label>
                    <select class="form-select" id="bankAccount" name="bank_account" required>
                        <option selected value="{{ $employee->bank_account }}">{{ $employee->bank_account }}</option>
                        <option value="BCA">BCA</option>
                        <option value="Mandiri">Mandiri</option>
                        <option value="CIMB">CIMB</option>
                    </select>
                    </div>

                    <!-- Bank Account Number -->
                    <div class="col-12 col-lg-6 mb-3">
                    <label for="bankAccountNumber" class="form-label"
                        >Bank Account Number</label
                    >
                    <input
                        type="number"
                        class="form-control"
                        id="bankAccountNumber"
                        placeholder="Enter bank account number..."
                        name="bank_account_number"
                        value="{{ $employee->bank_account_number }}"
                    />
                    </div>
                </div>
         
            <div class="d-flex justify-content-end gap-2">
                <a
                type="button"
                class="btn btn-secondary"
                href="{{ route('welcome') }}"
                >
                Close
            </a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>let table = new DataTable('#employeeData');</script>
    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>