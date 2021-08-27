@extends('layouts.layout')

@section('content')
<div class="container-lg my-3">
	<div class="row justify-content-center">
		<!-- NGO info display -->
		<div class="col-md-4 my-3">
			<div class="card">
				<div class="card-body p-4">
					<h4 class="card-title font-weight-bold">{{ $ngo->name }}</h4>
					<h6 class="card-subtitle pb-3 text-muted">NGO</h6>
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group row">
							<label class="col-4 col-form-label">{{ __('Contact Name') }}</label>
							<label class="col-8 col-form-label">{{ Auth::user()->name }}</label>
						</div>

						<div class="form-group row">
							<label class="col-4 col-form-label">{{ __('Contact Email') }}</label>
							<label class="col-8 col-form-label">{{ Auth::user()->email }}</label>
						</div>

						<div class="form-group row">
							<label class="col-4 col-form-label">{{ __('NGO Name') }}</label>
							<label class="col-8 col-form-label">{{ $ngo->name }}</label>
						</div>

						<div class="form-group row">
							<label class="col-4 col-form-label">{{ __('NGO Website') }}</label>
							<label class="col-8 col-form-label">{{ $ngo->website }}</label>
						</div>

						<div class="form-group row">
							<label class="col-4 col-form-label">{{ __('Causes') }}</label>
							<label class="col-8 col-form-label">{{ $ngo->cause }}</label>
						</div>

						<div class="form-group row">
							<label class="col-4 col-form-label">{{ __('Password') }}</label>
							<a href="{{ route('password.request') }}" class="col-8 col-form-label link">Change Password</a>
						</div>

						<div class="form-group row mb-0 justify-content-center pt-4">
							<div>
								<a href="{{ route('logout') }}" class="btn btn-primary w-100">
									{{ __('Logout') }}
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Project display -->
		<div class="col-md-8 my-3">
			<div class="card">
				<div class="card-body p-4">
					<div class="card-title pb-3 d-flex justify-content-between flex-md-nowrap flex-wrap" style="margin-top:-.3125rem">
						<span class="d-md-inline d-flex justify-content-between mb-3 w-100 w-md-auto">
							<h4 class="navbar-brand font-weight-bold mr-5 w-auto pb-0 my-0">Projects</h4>
							<input id="searchBox" class="form-control mr-sm-2 search w-auto" type="search" placeholder="Search..." aria-label="Search">
						</span>
						<a href="/projects/create" class="btn btn-primary mb-3 w-100 w-md-auto">
							{{ __('Create a Project') }}
						</a>

					</div>
					<div class="card-text">
						<section class="">
    <div class="row justify-content-center">
        
        <div id="shuffleEntryPoint" class="pt-4 d-flex col-sm-12 flex-row flex-md-nowrap flex-wrap justify-content-between">

			@foreach($projects as $project)
			<div class="card p-0 shadow mb-sm-5 col-lg-custom col-md-5 col-10">
				<a href="{{ $project->ngo->website }}" target="_blank"><img class="card-img-top" src="/images/technify_cover_card.png" alt=""></a>
				<div class="card-body p-2 m-4">
					@if ($project->status == 'finished')
					<div style="margin-left: -0.45rem;" class="mb-2">
						<button class="btn btn-primary btn-sm project-button">Completed</button>
					</div>
					@endif
					<h5 class="card-title"><a href="projects/{{ $project->id }}" target="_blank" style="color:#26484A;">{{ $project->name }}</a></h5>
					<p class="card-text">
						{{ $project->goal }}
					</p>
					<div class="d-flex justify-content-between align-items-center flex-wrap">
						<span style="margin-left: -0.45rem;" class="btns-talent">
							@if ($project->swe_needed)
							<button class="btn btn-sm project-button btn-swe">Software Engineer</button>
							@endif
							@if ($project->pm_needed)
							<button class="btn btn-sm project-button btn-pm">Project Manager</button>
							@endif
							@if ($project->d_needed)
							<button class="btn btn-sm project-button btn-d">Designer</button>
							@endif
						</span>
					</div>
					<a class="text-right project-button float-right see-details mt-2" href="/projects/{{ $project->id }}" target="_blank" data-toggle="modal" data-target="#project{{ $project->id }}">See Details -></a>
				</div>
			</div>
			@endforeach

		</div>
    </div>
</section>
</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection


@section('scripts')
<link href="{{ asset('css/ngo_dashboard_style.css') }}" rel="stylesheet" type="text/css">
<style>
	* {
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

	body {
		font-family: sans-serif;
	}

	@media only screen and (min-width: 1200px) {
		.col-lg-custom {
			width: 48%;
			max-width: 48%;

		}
	}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/5.2.3/shuffle.min.js"></script>
<script src="/assets/js/search.js"></script>
@endsection