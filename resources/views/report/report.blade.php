@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-custom text-white text-center">
            <h2 class="mb-0">Laporan Pengajuan #{{ $pengajuan->id }}</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Judul</th>
                    <td>{{ $pengajuan->judul }}</td>
                </tr>
                <tr>
                    <th>Dasar</th>
                    <td>{{ $pengajuan->dasar }}</td>
                </tr>
                <tr>
                    <th>Urgensi</th>
                    <td>{{ $pengajuan->urgensi }}</td>
                </tr>
                <tr>
                    <th>Perubahan</th>
                    <td>{{ $pengajuan->perubahan }}</td>
                </tr>
                <tr>
                    <th>Instalasi</th>
                    <td>{{ $pengajuan->instalasi }}</td>
                </tr>
                <tr>
                    <th>Pemohon</th>
                    <td>{{ $pengajuan->pemohon }}</td>
                </tr>
                <tr>
                    <th>Kepala Instalasi</th>
                    <td>{{ $pengajuan->kepala_instalasi }}</td>
                </tr>
                <tr>
                    <th>Kontak</th>
                    <td>{{ $pengajuan->kontak }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <span class="badge 
                            @if($pengajuan->status == 'diajukan') bg-warning 
                            @elseif($pengajuan->status == 'ditolak') bg-danger 
                            @elseif($pengajuan->status == 'selesai') bg-success 
                            @elseif($pengajuan->status == 'sedang dikerjakan') bg-orange 
                            @endif">
                            {{ ucfirst($pengajuan->status) }}
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
