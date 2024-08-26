<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- إضافة روابط Bootstrap في الرأس -->
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <div class="container my-5">
        <div class="row g-4">
            <!-- Card for Jobs -->
            <div class="col-md-4">
                <div class="card text-dark bg-info mb-3 shadow-lg">
                    <div class="card-header">Jobs</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $jobsCount }}</h5>
                        <p class="card-text">Total number of jobs available.</p>
                        <a href="" class="btn btn-light">View Jobs</a>
                    </div>
                </div>
            </div>

            <!-- Card for Employers -->
            <div class="col-md-4">
                <div class="card text-dark bg-success mb-3 shadow-lg">
                    <div class="card-header">Employers</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $employersCount }}</h5>
                        <p class="card-text">Total number of employers registered.</p>
                        <a href="" class="btn btn-light">View Employers</a>
                    </div>
                </div>
            </div>

            <!-- Card for Candidates -->
            <div class="col-md-4">
                <div class="card text-dark bg-warning mb-3 shadow-lg">
                    <div class="card-header">Candidates</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $candidatesCount }}</h5>
                        <p class="card-text">Total number of candidates applied.</p>
                        <a href="" class="btn btn-light">View Candidates</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Section: Charts or Tables -->
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        Overview
                    </div>
                    <div class="card-body">
                        <!-- Smaller Canvas for Chart -->
                        <canvas id="myChart" style="max-width: 400px; max-height: 200px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts for Bootstrap and Charts.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Example Script for Charts.js -->
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jobs', 'Employers', 'Candidates'],
                datasets: [{
                    label: 'Overview',
                    data: [{{ $jobsCount }}, {{ $employersCount }}, {{ $candidatesCount }}],
                    backgroundColor: ['#17a2b8', '#28a745', '#ffc107'],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
