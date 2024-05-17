<!DOCTYPE html>
<html>
<head>
    <title>Album Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card {
            height: 300px; /* Set a fixed height for all cards */
            width: 100%; /* Ensure cards take full width */
            overflow: hidden; /* Hide any overflowing content */
        }

        .card-img {
            height: 200px; /* Set a fixed height for all images */
            overflow: hidden; /* Hide any overflowing content */
        }

        .card-img img {
            width: 100%; /* Ensure images take full width of their container */
            height: auto; /* Maintain aspect ratio */
        }

    </style>
</head>
<body>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Your custom scripts -->
    <script>
        function showConfirmationModal(albumId) {
            // Set the action attribute for the delete form to the correct route
            const deleteForm = document.getElementById('deleteAlbumForm');
            // Show the confirmation modal
            $('#confirmationModal').modal('show');
        }

        function showMovePicturesModal(albumId) {
            // Hide the confirmation modal
            console.log(albumId);

            $('#confirmationModal').modal('hide');
            // Show the move pictures modal
            moveForm.action = `/album/${albumId}/movepic`;

            $('#movePicturesModal').modal('show');
        }
    </script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('albums.index') }}">Albums</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('albums.create') }}">Create Album</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
