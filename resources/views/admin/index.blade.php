@extends('layouts.admin')
@section('content')

<div class="container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.WelcomeToAdminPanel')}}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{trans('home.index')}}</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->


    <!-- Row -->
    <div class="row">
						<div class="col-sm-6 col-md-6 col-xl-3">
							<div class="card custom-card">
								<div class="card-body">
									<div><i class="fas fa-chart-line mr-1 dash-icon"></i></div>
									<p class="mb-1 tx-inverse">Number Of Sales</p>
									<div>
										<h4 class="dash-25 mb-2">568</h4>
									</div>
									<div class="expansion-value d-flex tx-inverse">
										<strong><i class="fas fa-caret-down mr-1 text-danger"></i> 0.5%</strong>
										<strong class="ml-auto"><i class="fas fa-caret-up mr-1 text-success"></i>0.7%</strong>
									</div>
									<div class="progress">
										<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-70p" role="progressbar"></div>
									</div>
									<div class="expansion-label d-flex text-muted">
										<span>Target</span>
										<span class="ml-auto">Last Month</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-xl-3">
							<div class="card custom-card">
								<div class="card-body">
									<div><i class="fab fa-rev mr-1 dash-icon"></i></div>
									<p class="mb-1 tx-inverse">New Revenue</p>
									<div>
										<h4 class="dash-25 mb-2">$12,897</h4>
									</div>
									<div class="expansion-value d-flex tx-inverse">
										<strong><i class="fas fa-caret-up mr-1 text-success"></i> 0.72%</strong>
										<strong class="ml-auto"><i class="fas fa-caret-down mr-1 text-danger"></i>0.43%</strong>
									</div>
									<div class="progress">
										<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-60p bg-secondary" role="progressbar"></div>
									</div>
									<div class="expansion-label d-flex text-muted">
										<span>Target</span>
										<span class="ml-auto">Last Month</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-xl-3">
							<div class="card custom-card">
								<div class="card-body">
									<div><i class="fas fa-dollar-sign mr-1 dash-icon"></i></div>
									<p class="mb-1 tx-inverse">Total Cost</p>
									<div>
										<h4 class="dash-25 mb-2">$11,234</h4>
									</div>
									<div class="expansion-value d-flex tx-inverse">
										<strong><i class="fas fa-caret-down mr-1 text-danger"></i> 1.4%</strong>
										<strong class="ml-auto"><i class="fas fa-caret-down mr-1 text-danger"></i>1.44%</strong>
									</div>
									<div class="progress">
										<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-50p bg-success" role="progressbar"></div>
									</div>
									<div class="expansion-label d-flex text-muted">
										<span>Target</span>
										<span class="ml-auto">Last Month</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-xl-3">
							<div class="card custom-card">
								<div class="card-body">
									<div><i class="fas fa-signal mr-1 dash-icon"></i></div>
									<p class="mb-1 tx-inverse">Profit By Sale</p>
									<div>
										<h4 class="dash-25 mb-2">$789</h4>
									</div>
									<div class="expansion-value d-flex tx-inverse">
										<strong><i class="fas fa-caret-down mr-1 text-danger"></i> 0.4%</strong>
										<strong class="ml-auto"><i class="fas fa-caret-up mr-1 text-success"></i>0.9%</strong>
									</div>
									<div class="progress">
										<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-40p bg-info" role="progressbar"></div>
									</div>
									<div class="expansion-label d-flex text-muted">
										<span>Target</span>
										<span class="ml-auto">Last Month</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Row -->

					<!-- Row -->
					<div class="row">
						<div class="col-sm-6 col-md-6 col-xl-3">
							<div class="card custom-card">
								<div class="card-body text-center">
									<div class="icon-service bg-primary-transparent rounded-circle text-primary">
										<i class="fe fe-user"></i>
									</div>
									<p class="mb-1 text-muted">Total Users</p>
									<h3 class="mb-0">34,789</h3>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-xl-3">
							<div class="card custom-card">
								<div class="card-body text-center">
									<div class="icon-service bg-secondary-transparent rounded-circle text-secondary">
										<i class="fe fe-trending-up"></i>
									</div>
									<p class="mb-1 text-muted">Total Sales</p>
									<h3 class="mb-0">98,674</h3>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-xl-3">
							<div class="card custom-card">
								<div class="card-body text-center">
									<div class="icon-service bg-info-transparent rounded-circle text-info">
										<i class="fe fe-dollar-sign"></i>
									</div>
									<p class="mb-1 text-muted">Total Profits</p>
									<h3 class="mb-0"><span>$</span>45,078</h3>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-xl-3">
							<div class="card custom-card">
								<div class="card-body text-center">
									<div class="icon-service bg-success-transparent rounded-circle text-success">
										<i class="fe fe-shopping-cart"></i>
									</div>
									<p class="mb-1 text-muted">Total Orders</p>
									<h3 class="mb-0">35,897</h3>
								</div>
							</div>
						</div>
					</div>
					<!-- End Row -->

<!-- Row -->
<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="card custom-card">
								<div class="card-body">
									<div class="main-content-calendar">
										<div class="main-content-left-calendar">
											<a href="#" data-toggle="modal" data-target="#add-category" class="btn ripple btn-secondary btn-block mb-3">
												<i class="fa fa-plus"></i> Create New
											</a>
											<label class="main-content-label tx-13 tx-bold mg-b-10">Event List</label>
											<nav class="nav main-nav-column main-nav-calendar-event mb-4 border">
												<a class="nav-link p-2" href="">
													<i class="fe fe-calendar tx-primary"></i>
													<div>Calendar Events</div>
												</a>
												<a class="nav-link p-2" href="">
													<i class="fe fe-calendar tx-success"></i>
													<div>Birthday Events</div>
												</a>
												<a class="nav-link p-2" href="">
													<i class="fe fe-calendar tx-danger"></i>
													<div>Holiday Calendar</div>
												</a>
												<a class="nav-link p-2" href="">
													<i class="fe fe-calendar tx-warning"></i>
													<div>Other Calendar</div>
												</a>
												<a class="nav-link p-2" href="">
													<i class="fe fe-calendar tx-info"></i>
													<div>Discovered Events</div>
												</a>
											</nav>
											<div class="fc-datepicker main-datepicker mb-4 mb-lg-0"></div>
										</div>
										<div class="main-content-body main-content-body-calendar">
											<div class="main-calendar" id="calendar"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Row -->

				</div>
			</div>
			<!-- End Main Content-->

</div>
@endsection
