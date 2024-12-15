@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-6 col-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <span class="fw-semibold d-block mb-3">Total Judul Buku</span>
                    <h3 class="card-title mb-2">{{ $amount_book }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <span class="fw-semibold d-block mb-3">Total Siswa</span>
                    <h3 class="card-title mb-2">{{ $amount_student }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <span class="fw-semibold d-block mb-3">Total Buku Dipinjam</span>
                    <h3 class="card-title mb-2">{{ $book_request }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <span class="fw-semibold d-block mb-3">Total Buku Belum Kembali</span>
                    <h3 class="card-title mb-2">{{ $book_return }}</h3>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
           <div class="card">
                <div class="card-header">
                    <h5>Statistik Peminjam</h5>
                </div>
                <div class="card-body">
                    <canvas id="peminjamanChart" style="width:100%"></canvas>
                </div>
           </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Dummy Data
        const dataPeminjaman = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Jumlah Peminjaman Buku",
                data: [15, 20, 25, 30, 40, 35, 50, 45, 60, 55, 70, 65], 
                backgroundColor: "rgba(75, 192, 192, 0.6)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 1
            }]
        };

        // Configurasi Chart
        const config = {
            type: "bar",
            data: dataPeminjaman,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "top",
                    },
                    title: {
                        display: true,
                        text: "Jumlah Peminjaman Buku per Bulan (dummy data)"
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 10 // Jarak antar nilai di sumbu Y
                        }
                    }
                }
            }
        };

        // Render Chart
        const ctx = document.getElementById("peminjamanChart").getContext("2d");
        new Chart(ctx, config);
    </script>
@endsection
