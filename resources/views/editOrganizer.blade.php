<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid justify-content-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Master Data
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('masterEventCategory') }}">Master Event Category</a></li>
                            <li><a class="dropdown-item" href="{{ route('masterOrganizer') }}">Master Organizer</a></li>
                            <li><a class="dropdown-item" href="{{ route('masterEvent') }}">Master Event</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('eventMenu') }}">Events</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div></div> <br>
<h1 class="text-center">{{ isset($organizer) ? 'Edit Organizer' : 'Create Organizer' }}</h1>

<form action="{{ isset($organizer) ? route('organizers.update', $organizer->id) : route('organizers.store') }}" method="POST" class="container mt-4">
    @csrf
    @if(isset($organizer))
        @method('PUT')
    @endif

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label"><strong>Organizer Name</strong></label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $organizer->name ?? '') }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="facebook_link" class="form-label"><strong>Facebook</strong></label>
            <input type="text" class="form-control" name="facebook_link" id="facebook_link" value="{{ old('facebook_link', $organizer->facebook_link ?? '') }}">
        </div>
        <div class="col-md-6">
            <label for="x_link" class="form-label"><strong>X</strong></label>
            <input type="text" class="form-control" name="x_link" id="x_link" value="{{ old('x_link', $organizer->x_link ?? '') }}">
        </div>
    </div>
    </div>

    <div class="row mb-3">
        
        <div class="col-md-6">
            <label for="website_link" class="form-label"><strong>Website</strong></label>
            <input type="text" class="form-control" name="website_link" id="website_link" value="{{ old('website_link', $organizer->website_link ?? '') }}">
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label"><strong>About</strong></label>
        <textarea class="form-control" name="description" id="description" rows="4">{{ old('description', $organizer->description ?? '') }}</textarea>
    </div>

    <div class="d-flex">
    <button type="submit" class="btn btn-create flex-fill me-2">Save</button>
    <a href="{{ route('masterOrganizer') }}" class="btn btn-secondary flex-fill">Cancel</a>
</div>
</form>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
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

