@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($albums as $album)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">{{ $album->name }}</div>
                <div class="card-body">
                    <p class="card-text">Description: {{ $album->description }}</p>
                    <a href="{{ route('albums.edit', $album) }}" class="btn btn-primary">Edite</a>
                    <a href="{{ route('albums.show', $album) }}" class="btn btn-primary">View Images</a>
                    <!-- Delete Button -->
                    @if(!$album->pictures->isEmpty())
                    <button type="button" class="btn btn-danger" onclick="showConfirmationModal({{ $album->id }})">Delete</button>
                    @endif
                    @if($album->pictures->isEmpty())
                        <form action="{{ route('destroy.album', $album) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>                    
                    @endif



                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>What would you like to do with the pictures in this album?</p>
                <form id="deleteAlbumForm" action="" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Album</button>
                </form>
                <button type="button" class="btn btn-primary" id="movePicturesButton" onclick="">Move Pictures</button>
            </div>
        </div>
    </div>
</div>

<!-- Move Pictures Modal -->
<div class="modal fade" id="movePicturesModal" tabindex="-1" aria-labelledby="movePicturesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="movePicturesModalLabel">Move Pictures to Another Album</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="movePicturesForm" action="" method="POST">
                    @csrf
                    <input type="hidden" name="old_album_id" id="oldAlbumId" value="">
                    <div class="form-group">
                        <label for="new_album_id">Select New Album</label>
                        <select class="form-control" id="new_album_id" name="new_album_id">
                            @foreach ($allAlbums as $otherAlbum)
                            <option value="{{ $otherAlbum->id }}">{{ $otherAlbum->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Move Pictures</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function showConfirmationModal(albumId) {
        const deleteForm = document.getElementById('deleteAlbumForm');
        deleteForm.action = `/albums/${albumId}/delete`;
        document.getElementById('movePicturesButton').onclick = function() {
            showMovePicturesModal(albumId);
        };
        $('#confirmationModal').modal('show');
    }

    function showMovePicturesModal(albumId) {
        console.log(albumId);

        // Hide the confirmation modal
        $('#confirmationModal').modal('hide');

        // Get the move form element
        const moveForm = document.getElementById('movePicturesForm');
        const oldAlbumIdInput = document.getElementById('oldAlbumId');

        // Set the form action dynamically
        moveForm.action = `/album/${albumId}/movepic`;

        // Set the hidden input value for old_album_id
        oldAlbumIdInput.value = albumId;

        // Show the move pictures modal
        $('#movePicturesModal').modal('show');
    }
</script>
@endsection
