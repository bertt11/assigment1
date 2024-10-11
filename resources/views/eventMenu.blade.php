<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events in Surabaya</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="container mt-5">
    <div class="row">
        @foreach($events as $event)
        <div class="col-md-4 mb-4">
            <a href="#">
            <img class = "rounded-t-lg img-fluid w-100" src="https://picsum.photos/500?random={{ $loop->index}}" alt="Event Banner">
            </a>
        
            <div class="card">
               
                <div class="card-body">
                    <h5 class="card-title">
                    <a href="{{ route('events.detailEvent', $event->id) }}" style="color: black;">{{ $event->title }}</a>

                    </h5>
                    <br>
                    <p class="card-text">
                        <strong>{{ \Carbon\Carbon::parse($event->date)->format('D, M d Y') }} - {{ \Carbon\Carbon::parse($event->start_time)->format('H:i A') }}</strong><br>
                        {{ $event->venue }}<br>
                        <br>
                        Free<br>
                        Organizer: {{ $event->organizer->name }}<br>
                       
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>




    </div>

    <!-- Include Bootstrap JS and Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
