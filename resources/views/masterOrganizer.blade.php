<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Organizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table td {
            white-space: normal;
            word-wrap: break-word;
            max-width: 200px;
        }
        .table th, .table td {
            vertical-align: middle; 
        }
        .table .no-column {
            width: 5%; 
            text-align: center;
        }
        .table .name-column {
            width: 30%; 
        }
        .table .about-column {
            width: 55%;
        }
        .table .action-column {
            width: 10%; 
            text-align: center; 
        }

         /* CSS untuk tombol Create */
         .btn-create {
            background-color: transparent; /* Warna latar belakang transparan */
            border: 2px solid #6c757d; /* Border abu-abu */
            color: #6c757d; /* Warna teks abu-abu */
            border-radius: 0; /* Menghilangkan border-radius */
            padding: 0.5rem 1rem; /* Padding untuk tombol */
            font-weight: bold; /* Mengatur ketebalan font */
        }

        .btn-create:hover {
            background-color: #6c757d; /* Warna latar belakang saat hover */
            color: white; /* Mengubah warna teks menjadi putih saat hover */
        }
    </style>
</head>
<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid justify-content-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Master Data
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Master Event Category</a></li>
                            <li><a class="dropdown-item" href="{{ route('masterOrganizer') }}">Master Organizer</a></li>
                            <li><a class="dropdown-item" href="#">Master Event</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('eventMenu') }}">Events</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        <div class="d-flex align-items-center">
            <h1 class="me-3">Organizer</h1>
            <a href="{{ route('organizers.create') }}" class="btn btn-create">+ Create</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="no-column">No</th>
                    <th class="name-column">Organizer Name</th>
                    <th class="about-column">About</th>
                    <th class="action-column">Action</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($organizers as $index => $organizer)
        <tr>
            <td class="no-column">{{ $index + 1 }}</td>
            <td class="name-column">
                <a href="{{ route('organizers.show', $organizer->id) }}" style="color: black;">{{ $organizer->name }}</a>
            </td>
            <td class="about-column">{{ $organizer->description }}</td>
            <td class="action-column">
                <a href="{{ route('organizers.edit', $organizer->id) }}" class="btn btn-warning">✏️</a>
                <form action="{{ route('organizers.destroy', $organizer->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">🗑️</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

