<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
        </ol>
    </nav>
    <a href="{{ route('users.create') }}" type="button" class="btn btn-outline-secondary mb-3">Add User</a>
    <div class="card mb-4">
        <div class="card-body">
            <table id="dashboard" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($user->photo)
                                    <img src="{{ $user->avatar }}" alt="Profile" width="30" height="30" class="rounded-circle">
                                @else
                                    <img src="{{ asset('def-profile.jpg') }}" alt="Profile" width="30" height="30" class="rounded-circle">
                                @endif
                            </td>
                            <td>
                                {{ $user->fullname }}
                            </td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('users.view', $user->id) }}" class="btn btn-outline-success btn-sm">View</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#dashboard').DataTable({
            responsive: true,
            columnDefs: [
                {
                    "className": "text-center",
                    "targets": "_all"
                }
            ],
            columns: [
                { width: '3%' },
                { width: '3%' },
                { width: '10%' },
                { width: '5%' },
                { width: '10%' },
                { width: '5%' }
            ]
        });
    });
</script>
