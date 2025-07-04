@extends('core::layouts.guest')
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('assets/back/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ route('dashboard.index') }}"><img src="{{URL::asset('assets/back/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>Welcome back!</h2>
												<h5 class="font-weight-semibold mb-4">{{ __('Please sign in to continue.') }}</h5>
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
													<div class="form-group">
														<x-core::form.fields.input-label-error type="email"  name="email" placeholder="Enter Email"  label="{{ __('Email') }}" value="username@domain.com{{old('email')}}" required autofocus autocomplete="username"/>
													</div>
													<div class="form-group">
														<x-core::form.fields.input-label-error type="password"  name="password" placeholder="Enter Password"  label="{{ __('Password') }}" value="Pa$$w0rd!{{old('password')}}" required autocomplete="current-password"/>
													</div>
													<button class="btn btn-main-primary btn-block">{{ __('Sign In') }}</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<button class="btn btn-block"><i class="fab fa-facebook-f"></i> {{ __('Signup with Facebook') }}</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> {{ __('Signup with Twitter') }}</button>
														</div>
													</div>
												</form>
												<div class="main-signin-footer mt-5">
													<p><a href="{{ route('password.email') }}">{{ __('Forgot password') }}?</a></p>
													<p>{{ __("Don't have an account?") }} <a href="{{ route('register') }}">{{ __('Create an Account') }}</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection

