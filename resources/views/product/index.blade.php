@extends('layouts.app')

@section('title', 'Company Profile')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAddModal">
                Add New Product
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Price</th>
                            <th scope="col">Product Description</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $pdct)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pdct->product_name }}</td>
                                <td>{{ $pdct->stock }}</td>
                                <td>{{ $pdct->price }}</td>
                                <td>{{ $pdct->product_description }}</td>
                                <td>
                                    <!-- Thumbnail-->
                                    <img src="{{ asset('product_bac/' . $pdct->product_image) }}" alt="Activity Photo"
                                        style="max-width: 100px; height: auto; cursor: pointer;" data-toggle="modal"
                                        data-target="#imageModal{{ $pdct->id_product }}">

                                    <!-- Modal gambar -->
                                    <div class="modal fade" id="imageModal{{ $pdct->id_product }}" tabindex="-1"
                                        role="dialog" aria-labelledby="imageModalLabel{{ $pdct->id_product }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel{{ $pdct->id_product }}">
                                                        Preview
                                                        Gambar</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset('product_bac/' . $pdct->product_image) }}"
                                                        alt="Full Image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $pdct->id_product }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $pdct->id_product }}">
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
                    <h5 class="modal-title" id="newAddModalLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('product.addproduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name"
                                placeholder="Product Name" required>
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" min="0" class="form-control" id="stock" name="stock"
                                placeholder="Stock" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" min="0" class="form-control" id="price" name="price"
                                placeholder="Price" required>
                        </div>

                        <div class="form-group">
                            <label for="decryption">Product Decryption</label>
                            <textarea class="form-control" id="product_description" name="product_description" placeholder="Product Decryption"
                                rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <input type="file" class="form-control-file" id="product_image" name="product_image"
                                accept=".jpg,.jpeg,.png,.svg,.gif" onchange="product_imagePreview(event)" required>
                            <div id="product_imagePreview" style="margin-top: 10px;"></div>
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
    @foreach ($products as $pdct)
        <div class="modal fade" id="edit{{ $pdct->id_product }}" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel{{ $pdct->id_product }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $pdct->id_product }}">Edit Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('product.editproduct_action', $pdct->id_product) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    value="{{ $pdct->product_name }}">
                            </div>

                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" min="0" class="form-control" id="stock" name="stock"
                                    value="{{ $pdct->stock }}">
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" min="0" class="form-control" id="price" name="price"
                                    value="{{ $pdct->price }}">
                            </div>

                            <div class="form-group">
                                <label for="decryption">Product Decryption</label>
                                <textarea class="form-control" id="product_description" name="product_description" rows="4">{{ $pdct->product_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="product_image">Product Image</label>
                                <input type="file" class="form-control-file"
                                    id="product_image{{ $pdct->id_product }}" name="product_image"
                                    accept=".jpg,.jpeg,.png,.svg,.gif"
                                    onchange="previewImage(event, {{ $pdct->id_product }})">
                                <div id="product_imagePreview{{ $pdct->id_product }}" style="margin-top: 10px;">
                                    @if ($pdct->product_image)
                                        <img src="{{ asset('product_bac/' . $pdct->product_image) }}" alt="Current Image"
                                            style="max-width: 100px;">
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
    @foreach ($products as $pdct)
        <div class="modal fade" id="delete{{ $pdct->id_product }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteModalLabel{{ $pdct->id_product }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $pdct->id_product }}">Delete
                            {{ $pdct->product_name }}
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
                        <a href="{{ route('product.deleteproduct', $pdct->id_product) }}"
                            class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function product_imagePreview(event) {
            const preview = document.getElementById('product_imagePreview');
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
                const output = document.getElementById('product_imagePreview' + id);
                output.innerHTML = '<img src="' + reader.result + '" style="max-width: 100px;">';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>


@endsection
