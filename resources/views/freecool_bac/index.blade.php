@extends('layouts.app')

@section('title', 'Company Profile')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAddModal">
            Add New Superiority
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered first">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Decryption</th>
                        <th scope="col">image_superiority</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($superioritys as $sy)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sy->title }}</td>
                        <td>{{ $sy->decryption }}</td>
                        <td>
                            <!-- Thumbnail-->
                            <img src="{{ asset('imagesuperiority/' . $sy->image_superiority) }}" 
                                alt="Activity Photo" 
                                style="max-width: 100px; height: auto; cursor: pointer;" 
                                data-toggle="modal" data-target="#imageModal{{ $sy->id_superiority }}">

                            <!-- Modal gambar -->
                            <div class="modal fade" id="imageModal{{ $sy->id_superiority }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel{{ $sy->id_superiority }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel{{ $sy->id_superiority }}">Preview Gambar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('imagesuperiority/' . $sy->image_superiority) }}" 
                                                alt="Full Image" 
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $sy->id_superiority }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $sy->id_superiority }}">
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
                <h5 class="modal-title" id="newAddModalLabel">Add New Superioritys</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

           <form action="{{ route('freecool_bac.addsuperiority') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body"> 

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                    </div>

                    <div class="form-group"> 
                        <label for="decryption">Decryption</label>
                        <textarea class="form-control" id="decryption" name="decryption" placeholder="Decryption" rows="4" required></textarea>
                    </div>                    

                    <div class="form-group">
                        <label for="image_superiority">Image Superiority</label>
                        <input type="file" class="form-control-file" id="image_superiority" name="image_superiority" accept=".jpg,.jpeg,.png,.svg,.gif" onchange="image_superiorityPreview(event)" required>
                        <div id="image_superiorityPreview" style="margin-top: 10px;"></div>
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
@foreach ($superioritys as $sy)
<div class="modal fade" id="edit{{ $sy->id_superiority }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $sy->id_superiority }}" aria-hidden="true">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $sy->id_superiority }}">Edit Superiority</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('freecool_bac.editsuperiority_action', $sy->id_superiority) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="modal-body"> 
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $sy->title }}">
                    </div>

                    <div class="form-group"> 
                        <label for="decryption">Decryption</label>
                        <textarea class="form-control" id="decryption" name="decryption" rows="4" required>{{ $sy->decryption }}</textarea>
                    </div>


                    <div class="form-group"> 
                        <label for="image_superiority">Image Superiority</label>
                        <input type="file" class="form-control-file" id="image_superiority{{ $sy->id_superiority }}" name="image_superiority" accept=".jpg,.jpeg,.png,.svg,.gif" onchange="previewImage(event, {{ $sy->id_superiority }})">
                        
                        <div id="image_superiorityPreview{{ $sy->id_superiority }}" style="margin-top: 10px;">
                            @if ($sy->image_superiority) 
                                <img src="{{ asset('imagesuperiority/' . $sy->image_superiority) }}" alt="Current Image" style="max-width: 100px;"> 
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
@foreach ($superioritys as $sy)
<div class="modal fade" id="delete{{ $sy->id_superiority }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $sy->id_superiority }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $sy->id_superiority }}">Delete {{ $sy->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Are you sure you want to delete this data...?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ route('freecool_bac.deletesuperiority', $sy->id_superiority) }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    function image_superiorityPreview(event) {
        const preview = document.getElementById('image_superiorityPreview');
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
function previewImage(event, id) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('image_superiorityPreview' + id);
        output.innerHTML = '<img src="' + reader.result + '" style="max-width: 100px;">';
    };
    if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
}
</script>

@endsection


