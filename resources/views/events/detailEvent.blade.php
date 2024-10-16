<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .event-details {
            margin-top: 20px;
        }
        .event-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
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
<body>
    <div class="container mt-5">
    <h4>{{ $event->eventCategory->name }}</h4>
        <h1>{{ $event->title }}</h1>
            <img class = "rounded-t-lg img-fluid" src="https://picsum.photos/500?random" alt="Event Banner">
        <div class="event-details container">
    
    <div class="row mb-3">
        <div class="col-md-6">
            <p><strong style="font-size: 1.5rem;">Organizer:</strong> </p><p>{{ $event->organizer->name }}</p>
        </div>
        <div class="col-md-6">
            <p><strong style="font-size: 1.5rem;">Booking URL:</strong></p> <p> <a href="{{ $event->booking_url }}" target="_blank">{{ $event->booking_url }}</a></p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <p><strong style="font-size: 1.5rem;">Date and Time:</strong></p> <p> {{ \Carbon\Carbon::parse($event->date)->format('D, M d Y') }} - {{ \Carbon\Carbon::parse($event->start_time)->format('H:i A') }}</p>
        </div>
        <div class="col-md-6">
            <p><strong style="font-size: 1.5rem;">Location:</strong></p><p> {{ $event->venue }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <p><strong style="font-size: 1.5rem;">About This Event:</strong><br></p><p> {{ $event->description }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <p><strong style="font-size: 1.5rem;">Tags</strong><br>
                @if($event->tags)
                    <div class="d-flex flex-wrap">
                        @foreach(explode(',', $event->tags) as $tag)
                        <span class="tag-box me-2 mb-2">{{ trim($tag) }}</span>
                        @endforeach
                    </div>
                @endif
            </p>
        </div>
    </div>
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
