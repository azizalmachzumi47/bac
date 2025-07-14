@extends('layouts.app')

@section('title', 'Company Profile')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAddModal">
            Add New Company Profile
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered first">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company</th>
                        <th scope="col">About Us</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aboutus as $abs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $abs->company }}</td>
                        <td>{{ $abs->about_us }}</td>
                        <td>{{ $abs->email }}</td>
                        <td>{{ $abs->phone }}</td>
                        <td>{{ $abs->address }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $abs->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $abs->id }}">
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
                <h5 class="modal-title" id="newAddModalLabel">Add New About</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

           <form action="{{ route('company_profile.addabout') }}" method="POST">
                @csrf
                <div class="modal-body"> 
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" name="company" placeholder="Company" required>
                    </div>

                    <div class="form-group"> 
                        <label for="about_us">About Us</label>
                        <textarea class="form-control" id="about_us" name="about_us" placeholder="About Us" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Address" rows="3" required></textarea>
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
@foreach ($aboutus as $abs)
<div class="modal fade" id="edit{{ $abs->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $abs->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $abs->id }}">Edit Company Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('company_profile.editabout_action', $abs->id) }}" method="POST">
                    @csrf
                    @method('POST')  <!-- Menggunakan POST untuk update, bisa gunakan PUT atau PATCH jika ingin -->
                    
                    <div class="form-group">
                        <label>Company</label>
                        <input type="text" name="company" value="{{ $abs->company }}" class="form-control">
                    </div>

                    <div class="form-group"> 
                        <label for="about_us">About Us</label>
                        <textarea class="form-control" id="about_us" name="about_us" rows="4">{{ $abs->about_us }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $abs->email }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $abs->phone }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3">{{ $abs->address }}</textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Delete -->
@foreach ($aboutus as $abs)
<div class="modal fade" id="delete{{ $abs->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $abs->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $abs->id }}">Delete {{ $abs->company }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Are you sure you want to delete this data...?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ route('company_profile.deleteabout', $abs->id) }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection


