@extends('layouts.app')

@section('title', 'Company Profile')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAddModal">
                Add New Service
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">Decryption</th>
                            <th scope="col">Address</th>
                            <th scope="col">Activity Date</th>
                            <th scope="col">Activity Photos</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $sv)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sv->category }}</td>
                                <td>{{ $sv->decryption }}</td>
                                <td>{{ $sv->address }}</td>
                                <td>{{ $sv->activity_date }}</td>
                                <td>
                                    <!-- Thumbnail-->
                                    <img src="{{ asset('activityphotos_bac/' . $sv->activity_photos) }}"
                                        alt="Activity Photo" style="max-width: 100px; height: auto; cursor: pointer;"
                                        data-toggle="modal" data-target="#imageModal{{ $sv->id_service }}">

                                    <!-- Modal gambar -->
                                    <div class="modal fade" id="imageModal{{ $sv->id_service }}" tabindex="-1"
                                        role="dialog" aria-labelledby="imageModalLabel{{ $sv->id_service }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel{{ $sv->id_service }}">
                                                        Preview Gambar</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset('activityphotos_bac/' . $sv->activity_photos) }}"
                                                        alt="Full Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $sv->id_service }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $sv->id_service }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newAddModal" tabindex="-1" role="dialog" aria-labelledby="newAddModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newAddModalLabel">Add New Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('service.addservice') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category" required>
                                <option> -- Category -- </option>
                                <option value="Air Condition Section">Air Condition Section</option>
                                <option value="Refrigerator Section">Refrigerator Section</option>
                                <option value="Civil">Civil</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="decryption">Decryption</label>
                            <textarea class="form-control" id="decryption" name="decryption" placeholder="Decryption" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Address" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="activity_date">Activity Date</label>
                            <input type="date" class="form-control" id="activity_date" name="activity_date"
                                placeholder="Activity Date" required>
                        </div>

                        <div class="form-group">
                            <label for="activity_photos">Activity Photos</label>
                            <input type="file" class="form-control-file" id="activity_photos" name="activity_photos"
                                accept=".jpg,.jpeg,.png,.svg,.gif" onchange="activity_photosPreview(event)" required>
                            <div id="activity_photosPreview" style="margin-top: 10px;"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    @foreach ($services as $sv)
        <div class="modal fade" id="edit{{ $sv->id_service }}" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel{{ $sv->id_service }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $sv->id_service }}">Edit Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('service.editservice_action', $sv->id_service) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option> -- Category -- </option>
                                    <option value="Air Condition Section"
                                        {{ $sv->category == 'Air Condition Section' ? 'selected' : '' }}>Air Condition
                                        Section</option>
                                    <option value="Refrigerator Section"
                                        {{ $sv->category == 'Refrigerator Section' ? 'selected' : '' }}>Refrigerator
                                        Section</option>
                                    <option value="Civil" {{ $sv->category == 'Civil' ? 'selected' : '' }}>Civil</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="decryption">Decryption</label>
                                <textarea class="form-control" id="decryption" name="decryption" rows="4" required>{{ $sv->decryption }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required>{{ $sv->address }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="activity_date">Activity Date</label>
                                <input type="date" class="form-control" id="activity_date" name="activity_date"
                                    value="{{ $sv->activity_date }}" required>
                            </div>

                            <div class="form-group">
                                <label for="activity_photos">Activity Photos</label>
                                <input type="file" class="form-control-file"
                                    id="activity_photos{{ $sv->id_service }}" name="activity_photos"
                                    accept=".jpg,.jpeg,.png,.svg,.gif"
                                    onchange="previewImage(event, {{ $sv->id_service }})">
                                <div id="activity_photosPreview{{ $sv->id_service }}" style="margin-top: 10px;">
                                    @if ($sv->activity_photos)
                                        <img src="{{ asset('activityphotos_bac/' . $sv->activity_photos) }}"
                                            alt="Current Image" style="max-width: 100px;">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Modal Delete -->
    @foreach ($services as $sv)
        <div class="modal fade" id="delete{{ $sv->id_service }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteModalLabel{{ $sv->id_service }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $sv->id_service }}">Delete {{ $sv->category }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Are you sure you want to delete this data...?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="{{ route('service.deleteservice', $sv->id_service) }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function activity_photosPreview(event) {
            const preview = document.getElementById('activity_photosPreview');
            const file = event.target.files[0];

            if (!file) return;

            const isImage = file.type.startsWith('image/');
            preview.innerHTML = '';

            if (isImage) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.maxHeight = '150px';
                preview.appendChild(img);
            } else {
                const span = document.createElement('span');
                span.textContent = `Selected file: ${file.name}`;
                preview.appendChild(span);
            }
        }
    </script>


    <script>
        // Mengatur nilai default input date ke tanggal hari ini
        document.addEventListener("DOMContentLoaded", function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById("activity_date").value = today;
        });
    </script>


    <script>
        function previewImage(event, id) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('activity_photosPreview' + id);
                output.innerHTML = '<img src="' + reader.result + '" style="max-width: 100px;">';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>


@endsection
