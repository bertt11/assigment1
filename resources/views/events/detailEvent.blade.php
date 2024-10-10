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
                            <li><a class="dropdown-item" href="#">Master Event Category</a></li>
                            <li><a class="dropdown-item" href="#">Master Organizer</a></li>
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
<body>
    <div class="container mt-5">
    <h4>{{ $event->eventCategory->name }}</h4>
        <h1>{{ $event->title }}</h1>
        
        <img src="{{ asset($event->image_url ?? 'images/default-banner.jpg') }}" class="img-fluid event-image" alt="Event Banner">
        
        <div class="event-details">
            <p><strong>Organizer:</strong> {{ $event->organizer->name }}</p>
            <p><strong>Booking URL:</strong> <a href="{{ $event->booking_url }}" target="_blank">{{ $event->booking_url }}</a></p>
            <p><strong>Date and Time:</strong> {{ \Carbon\Carbon::parse($event->date)->format('D, M d Y') }} - {{ \Carbon\Carbon::parse($event->start_time)->format('H:i A') }}</p>
            <p><strong>Location:</strong> {{ $event->venue }}</p>
            <p><strong>About This Event:</strong><br> {{ $event->description }}</p>
            
            <p><strong>Tags</strong><br> <div class="card">{{ $event->tags}}</div></p>
            
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
