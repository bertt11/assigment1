<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-create {
            background-color: transparent;
            border: 2px solid #6c757d;
            color: #6c757d;
            border-radius: 0;
            padding: 0.5rem 1rem;
            font-weight: bold;
        }

        .btn-create:hover {
            background-color: #6c757d;
            color: white;
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
    <h1 class="text-center">Edit Event</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST" class="container mt-4">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="title" class="form-label"><strong>Event Title</strong></label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $event->title) }}" required>
            </div>
            <div class="col-md-6">
                <label for="venue" class="form-label"><strong>Location</strong></label>
                <input type="text" class="form-control" name="venue" id="venue" value="{{ old('venue', $event->venue) }}" required>
            </div>
        </div>

        <div class="row mb-3">
    <div class="col-md-6">
        <label for="event_category_id" class="form-label"><strong>Event Category</strong></label>
        <select class="form-control" name="event_category_id" id="event_category_id" required>
            @foreach($eventCategories as $eventCategory)
                <option value="{{ $eventCategory->id }}" {{ $event->event_category_id == $eventCategory->id ? 'selected' : '' }}>{{ $eventCategory->name }}</option>
            @endforeach
        </select>
    </div>
</div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="event_datetime" class="form-label"><strong>Date and Time</strong></label>
                <input type="datetime-local" class="form-control" name="event_datetime" id="event_datetime"
                       value="{{ isset($event) ? date('Y-m-d\TH:i', strtotime($event->date . ' ' . $event->start_time)) : old('event_datetime') }}"
                       required>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label"><strong>Description</strong></label>
            <textarea class="form-control" name="description" id="description" rows="4">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="organizer" class="form-label"><strong>Organizer</strong></label>
                <select class="form-control" name="organizer_id" id="organizer_id" required>
                    @foreach($organizers as $organizer)
                        <option value="{{ $organizer->id }}" {{ $event->organizer_id == $organizer->id ? 'selected' : '' }}>{{ $organizer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="tags" class="form-label"><strong>Tags</strong></label>
                <input type="text" class="form-control" name="tags" id="tags" value="{{ old('tags', $event->tags) }}">
            </div>
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-create flex-fill me-2">Save</button>
            <a href="{{ route('masterEvent') }}" class="btn btn-secondary flex-fill">Cancel</a>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
