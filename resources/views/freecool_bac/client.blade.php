@extends('layouts.app')

@section('title', 'Company Profile')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAddModal">
            Add New Client
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
                    @foreach ($clients as $c)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $c->client_name }}</td>
                        <td>{{ $c->address_client }}</td>
                        <td>
                            <!-- Thumbnail-->
                            <img src="{{ asset('logo_client/' . $c->client_logo) }}" 
                                alt="Activity Photo" 
                                style="max-width: 100px; height: auto; cursor: pointer;" 
                                data-toggle="modal" data-target="#imageModal{{ $c->id_client }}">

                            <!-- Modal gambar -->
                            <div class="modal fade" id="imageModal{{ $c->id_client }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel{{ $c->id_client }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel{{ $c->id_client }}">Preview Gambar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('logo_client/' . $c->client_logo) }}" 
                                                alt="Full Image" 
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $c->id_client }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $c->id_client }}">
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
                <h5 class="modal-title" id="newAddModalLabel">Add New Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

           <form action="{{ route('freecool_bac.addclient') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body"> 

                    <div class="form-group">
                        <label for="client_name">Client Name</label>
                        <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Client Name" required>
                    </div>

                    <div class="form-group"> 
                        <label for="address_client">Address Client</label>
                        <textarea class="form-control" id="address_client" name="address_client" placeholder="Address Client" rows="4" required></textarea>
                    </div>                    

                    <div class="form-group">
                        <label for="client_logo">Client Logo</label>
                        <input type="file" class="form-control-file" id="client_logo" name="client_logo" accept=".jpg,.jpeg,.png,.svg,.gif" onchange="client_logoPreview(event)" required>
                        <div id="client_logoPreview" style="margin-top: 10px;"></div>
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
@foreach ($clients as $c)
<div class="modal fade" id="edit{{ $c->id_client }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $c->id_client }}" aria-hidden="true">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $c->id_client }}">Edit Superiority</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('freecool_bac.editclient_action', $c->id_client) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="modal-body"> 
                    <div class="form-group">
                        <label for="client_name">Client Name</label>
                        <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $c->client_name }}">
                    </div>

                    <div class="form-group"> 
                        <label for="address_client">Address Client</label>
                        <textarea class="form-control" id="address_client" name="address_client" rows="4" required>{{ $c->address_client }}</textarea>
                    </div>


                    <div class="form-group"> 
                        <label for="client_logo">Client Logo</label>
                        <input type="file" class="form-control-file" id="client_logo{{ $c->id_client }}" name="client_logo" accept=".jpg,.jpeg,.png,.svg,.gif" onchange="previewImage(event, {{ $c->id_client }})">
                        
                        <div id="client_logoPreview{{ $c->id_client }}" style="margin-top: 10px;">
                            @if ($c->client_logo) 
                                <img src="{{ asset('logo_client/' . $c->client_logo) }}" alt="Current Image" style="max-width: 100px;"> 
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
@foreach ($clients as $c)
<div class="modal fade" id="delete{{ $c->id_client }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $c->id_client }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $c->id_client }}">Delete {{ $c->client_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Are you sure you want to delete this data...?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ route('freecool_bac.deleteclient', $c->id_client) }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    function client_logoPreview(event) {
        const preview = document.getElementById('client_logoPreview');
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
        const output = document.getElementById('client_logoPreview' + id);
        output.innerHTML = '<img src="' + reader.result + '" style="max-width: 100px;">';
    };
    if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
}
</script>

@endsection


