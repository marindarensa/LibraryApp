@extends('layouts.app')
@section('title', $title)
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card" style="min-height:500px;">
                <h5 class="card-header d-flex justify-content-between">
                    <a href="{{ route('dashboard.transaction.create') }}">
                        <button type="button" class="btn btn-primary ">Pinjam Buku</button>
                    </a>
                    <a href="{{ route('dashboard.report') }}" target="_blank">
                        <button type="button" class="btn btn-primary">Download Laporan</button>
                    </a>
                </h5>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Pinjam</th>
                                <th scope="col">Nama Peminjam</th>
                                <th scope="col">Jumlah Buku</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal Dibuat</th>
                                <th scope="col" colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="text-transform: uppercase">{{ $transaction->code }}</td>
                                    <td>{{ $transaction->student_name }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->status == 1 ? "Kembali" : "Belum Kembali" }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td></td>
                                    <td style="display:flex;gap:12px">
                                        <form action="{{ route('dashboard.transaction.return', $transaction->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            <button type="submit" class="btn btn-success return-book">Kembalikan</button>
                                        </form>

                                        <form action="{{ route('dashboard.transaction.destroy', $transaction->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-item">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.return-book').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Buku yang dipinjam akan dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#435ebe',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Kembalikan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {

                    $(this).parent().submit();
                }
            })
        })
    </script>
@endsection
