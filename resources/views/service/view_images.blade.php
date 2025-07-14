@extends('layouts.app')

@section('content')
<div class="container">  
    <h3>Image for Service: {{ $service->category }}</h3>  
  
    <a href="{{ route('service.image_activity') }}" class="btn btn-secondary mb-3">Back to List</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Image</th>
                <th>ID Service</th>
                <th>Activity Photos BAC</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($images as $img)
            <tr>
                <td>{{ $img->id_imageactivity }}</td>
                <td>{{ $img->id_service }}</td>
                <td>
                    @if ($img->activity_photosbac)
                        <img src="{{ asset('activityphotos_bac/' . $img->activity_photosbac) }}" alt="Activity Photos BAC" style="max-width: 150px;">
                    @else
                        <span>Tidak ada gambar</span>
                    @endif
                </td>
                <td>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $img->id_imageactivity }}">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            </tr>

            <!-- Modal Delete -->
            <div class="modal fade" id="deleteModal{{ $img->id_imageactivity }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $img->id_imageactivity }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('service.deleteimageactivity', $img->id_imageactivity) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $img->id_imageactivity }}">Konfirmasi Hapus Gambar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <p>Apakah Anda yakin ingin menghapus gambar ini?</p>
                                @if ($img->activity_photosbac)
                                    <img src="{{ asset('activityphotos_bac/' . $img->activity_photosbac) }}" alt="Preview" class="img-fluid" style="max-width: 100%;">
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @empty
            <tr>
                <td colspan="4">Tidak ada gambar yang ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
