<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Event</title>
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
            width: 15%;
        }
        .table .date-column {
            width: 12%;
        }
        .table .venue-column {
            width: 13%;
        }
        .table .organizer-column {
            width: 10%;
        }
        .table .about-column {
            width: 25%;
        }
        .table .tags-column {
            width: 10%;
        }
        .table .action-column {
            width: 10%;
            text-align: center;
        }

        /* CSS untuk tombol Create */
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

    <div class="container mt-4">
        <div class="d-flex align-items-center">
            <h1 class="me-3"><strong>Events</strong></h1>
            <a href="{{ route('events.create') }}" class="btn btn-create">+ Create</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="no-column">No</th>
                    <th class="name-column">Event Name</th>
                    <th class="date-column">Date</th>
                    <th class="venue-column">Location</th>
                    <th class="organizer-column">Organizer</th>
                    <th class="about-column">About</th>
                    <th class="tags-column">Tags</th>
                    <th class="action-column">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $index => $event)
                    <tr>
                        <td class="no-column">{{ $index + 1 }}</td>
                        <td class="name-column">
                            <a>{{ $event->title }}</a>
                        </td>
                        <td class="date-column">{{ \Carbon\Carbon::parse($event->date)->format('D, M d Y') }} <br> {{ \Carbon\Carbon::parse($event->start_time)->format('H:i A') }}</td>
                        <td class="venue-column">{{ $event->venue }}</td>
                        <td class="organizer-column">{{ $event->organizer->name }}</td>
                        <td class="about-column">{{ $event->description }}</td>
                        <td class="tags-column">
                            @foreach (explode(',', $event->tags) as $tag)
                                <span class="tag-box">{{ $tag }}</span>
                            @endforeach
                        </td>
                        <td class="action-column">
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">✏️</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
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

<style>
    .tag-box {
        display: inline-block;
        padding: 5px 10px;
        background-color: white;
        border: 1px solid black;
        border-radius: 5px;
        color: black;
    }

    .event-details strong {
        font-size: 1.5rem; /* Besarkan font pada judul */
    }
</style>
