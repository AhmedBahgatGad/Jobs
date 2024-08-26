<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row">
                        <!-- Card for Jobs -->
                        <div class="col-md-4">
                            <div class="card text-white bg-info mb-3">
                                <div class="card-header">Jobs</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $jobsCount }}</h5>
                                    <p class="card-text">Total number of jobs available.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card for Employers -->
                        <div class="col-md-4">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-header">Employers</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $employersCount }}</h5>
                                    <p class="card-text">Total number of employers registered.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card for Candidates -->
                        <div class="col-md-4">
                            <div class="card text-white bg-warning mb-3">
                                <div class="card-header">Candidates</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $candidatesCount }}</h5>
                                    <p class="card-text">Total number of candidates applied.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add any additional features you want here -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">Additional Feature</div>
                                <div class="card-body">
                                    <h5 class="card-title">Feature Name</h5>
                                    <p class="card-text">Description of the additional feature.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
