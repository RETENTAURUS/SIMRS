@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-custom text-white text-center">
            <h2 class="mb-0">Pengajuan Penghapusan</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Instalasi</th>
                            <th>Pemohon</th>
                            <th>Kepala Instalasi</th>
                            <th>Kontak</th>
                            <th style="width: 20px">Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($pengajuans as $pengajuan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengajuan->instalasi }}</td>
                            <td>{{ $pengajuan->pemohon }}</td>
                            <td>{{ $pengajuan->kepala_instalasi }}</td>
                            <td>{{ $pengajuan->kontak }}</td>
                            <td>
                                <span class="badge px-3 py-2 
                                    @if($pengajuan->status == 'diajukan') bg-warning 
                                    @elseif($pengajuan->status == 'ditolak') bg-danger 
                                    @elseif($pengajuan->status == 'selesai') bg-success 
                                    @elseif($pengajuan->status == 'sedang dikerjakan') bg-orange 
                                    @endif">
                                    {{ ucfirst($pengajuan->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <!-- Form untuk update status -->
                                    <form action="{{ route('update.status', $pengajuan->id) }}" method="POST" class="d-flex gap-2">
                                        @csrf
                                        <select name="status" class="form-select form-select-sm w-auto">
                                            <option value="sedang dikerjakan" {{ $pengajuan->status == 'sedang dikerjakan' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                                            <option value="diajukan" {{ $pengajuan->status == 'diajukan' ? 'selected' : '' }}>Diajukan</option>
                                            <option value="ditolak" {{ $pengajuan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                            <option value="selesai" {{ $pengajuan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                        <!-- Tombol View Report dengan margin kanan -->
                                            <button class="btn btn-info btn-sm ms-2" onclick="viewReport('{{ route('view.report', $pengajuan->id) }}')">
                                                <i class="fas fa-eye"></i> <!-- Ikon "eye" untuk View -->
                                            </button>
                                        <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fas fa-check"></i> <!-- Ikon "check" untuk Selesai -->
                                            </button>
                                        </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function viewReport(url) {
        window.open(url, '_blank');
    }
</script>

@endsection
