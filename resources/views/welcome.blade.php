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
  <div class="px-5 mt-4">  
    <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                <h5>Employee Data</h5>
                <a
                type="button"
                class="btn btn-primary px-4"
                {{-- data-bs-toggle="modal"
                data-bs-target="#modalAddNew" --}}
                href="{{ route('create') }}"
                >
                Add New
            </a>
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <div class="table-responsive">
            <table class="table table-stripped" id="employeeData" style="width: 100%">
              <thead>
                <tr>
                  <th scope="col">Action</th>
                  <th scope="col">No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Job Position</th>
                  <th scope="col">Date of Birth</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Email</th>
                  <th scope="col">Province</th>
                  <th scope="col">City</th>
                  <th scope="col">Address</th>
                  <th scope="col">ZIP Code</th>
                  <th scope="col">KTP Number</th>
                  <th scope="col">KTP Image</th>
                  <th scope="col">Bank Account</th>
                  <th scope="col">Bank Account Number</th>
                  <th scope="col">Created At</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <a
                              type="button"
                              class="btn btn-warning"
                              {{-- data-bs-toggle="modal"
                              data-bs-target="#modalEdit{{ $employee->id }}" --}}
                              href="{{ route('edit', $employee->id)}}"
                            >
                              Edit
                            </a>
                            <button
                              type="button"
                              class="btn btn-danger"
                              data-bs-toggle="modal"
                              data-bs-target="#modalDelete{{ $employee->id }}"
                            >
                              Delete
                            </button>
                            </div>
                          </td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td>{{ $employee->job_position }}</td>
                        <td>{{ $employee->date_of_birth }}</td>
                        <td>{{ $employee->phone_number }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->province }}</td>
                        <td>{{ $employee->city }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>{{ $employee->zip_code }}</td>
                        <td>{{ $employee->ktp_number }}</td>
                        <td>
                            <img src="{{ Storage::url($employee->ktp_image) }}" width="100" alt="">
                        </td>
                        <td>{{ $employee->bank_account }}</td>
                        <td>{{ $employee->bank_account_number }}</td>
                        <td>{{ $employee->created_at }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>

            @foreach ($employees as $employee)

     <!-- Modal Box Delete -->
     <div class="modal fade" id="modalDelete{{ $employee->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel{{ $employee->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDeleteLabel{{ $employee->id }}">Delete Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary radius-8" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger radius-8">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
            @endforeach
          </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>let table = new DataTable('#employeeData');</script>
  </body>
</html>