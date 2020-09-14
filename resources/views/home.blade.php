@extends('dashboard.index')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Reported Accidents</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $accidents->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-hospital-alt fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $tasks_percent }}%</div>
                    </div>
                    <div class="col">
                      <div class="progress progress-sm mr-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ $tasks_percent }}%" aria-valuenow="{{ $tasks_percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Training Conducted</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{  $events->count() }}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
