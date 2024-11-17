@extends('backend.v_layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <h3 class="text-center">{{ $judul }}</h3>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('backend.user.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">User List</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($index as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>
                                        @if ($row->role == 1)
                                            <span class="badge badge-primary">Super Admin</span>
                                        @elseif ($row->role == 0)
                                            <span class="badge badge-info">Admin</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->status == 1)
                                            <span class="badge badge-success">Aktif</span>
                                        @elseif ($row->status == 0)
                                            <span class="badge badge-danger">Non-Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('backend.user.edit', $row->id) }}" class="btn btn-warning btn-sm">
                                            <i class="far fa-edit"></i> Ubah
                                        </a>
                                        <form action="{{ route('backend.user.destroy', $row->id) }}" method="POST" 
                                            style="display:inline;">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#zero_config').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ entries",
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            },
            "processing": true,
            "pageLength": 10,
            "responsive": true,
            "dom": '<"top"lf>rt<"bottom"ip><"clear">'
        });
    });
</script>
@endpush