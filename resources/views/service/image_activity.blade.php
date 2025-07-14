@extends('layouts.app')

@section('title', 'Company Profile')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Activity Photos</th>
                            <th>Total Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $img)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $img->category }}</td>
                                <td>
                                    <img src="{{ asset('activityphotos_bac/' . $img->activity_photos) }}" alt="Activity Photo"
                                        style="max-width: 100px; height: auto; cursor: pointer;" data-toggle="modal"
                                        data-target="#imageModal{{ $img->id_service }}">

                                    <!-- Modal Preview Gambar -->
                                    <div class="modal fade" id="imageModal{{ $img->id_service }}" tabindex="-1"
                                        role="dialog" aria-labelledby="imageModalLabel{{ $img->id_service }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Preview Gambar</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset('activityphotos_bac/' . $img->activity_photos) }}"
                                                        alt="Full Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $img->total_gambar }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $img->id_service }}">
                                        <i class="fas fa-edit"></i> Add Image
                                    </button>

                                    <a href="{{ route('service.viewimages', $img->id_service) }}"
                                        class="btn btn-info btn-sm">
                                        <i class="fas fa-image"></i> View Images
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal Tambah Gambar -->
                            <div class="modal fade" id="edit{{ $img->id_service }}" tabindex="-1" role="dialog"
                                aria-labelledby="editLabel{{ $img->id_service }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <form action="{{ route('service.addimage') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_service" value="{{ $img->id_service }}">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add Image for: {{ $img->category }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <label>Upload New Image:</label>
                                                <input type="file" name="activity_photosbac" class="form-control"
                                                    id="imageInput{{ $img->id_service }}" accept="image/*" required
                                                    onchange="previewImage(event, {{ $img->id_service }})">
                                                <br>
                                                <img id="imagePreview{{ $img->id_service }}" src="#"
                                                    alt="Image Preview"
                                                    style="display:none; max-width: 100%; height: auto; border: 1px solid #ccc; padding: 5px;">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Save</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        function previewImage(event, id) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function() {
                const preview = document.getElementById('imagePreview' + id);
                preview.src = reader.result;
                preview.style.display = 'block';
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
