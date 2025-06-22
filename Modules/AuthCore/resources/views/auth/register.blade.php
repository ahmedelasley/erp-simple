@extends('core::layouts.guest')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/back/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
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
										<div class="mb-5 d-flex"> <a href="{{-- route('home') --}}"><img src="{{URL::asset('assets/back/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="main-signup-header">
											<h2 class="text-primary">Get Started</h2>
											<h5 class="font-weight-normal mb-4">It's free to signup and only takes a minute.</h5>
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
												<div class="form-group">
													{{-- <label>{{ __('Full Name') }}</label> --}}
                                                    {{-- <input class="form-control" placeholder="Enter your Full Name" type="text" name="name" value="{{old('name')}}"  autofocus autocomplete="name"> --}}
                                                    <x-core::form.fields.input-label-error name="name" placeholder="Enter Full Name"  label="{{ __('Full Name') }}"/>
                                                    <x-core::form.fields.input-error :messages="$errors->get('name')" class=""/>
												</div>
												<div class="form-group">
													<label>{{ __('Email') }}</label>
                                                    <input class="form-control" placeholder="Enter your email" type="email"  name="email" value="{{old('email')}}" autocomplete="username" >
                                                    <x-core::form.fields.input-error :messages="$errors->get('email')" class="mt-2" />
												</div>
												<div class="form-group">
													<label>{{ __('Password') }}</label>
                                                    <input class="form-control" placeholder="Enter your password" type="password" name="password"  autocomplete="new-password">
                                                    <x-core::form.fields.input-error :messages="$errors->get('password')" class="mt-2" />
												</div>
                                                <div class="form-group">
													<label>{{ __('Confirm Password') }}</label>
                                                    <input class="form-control" placeholder="Enter your password confirmation" type="password" name="password_confirmation"  autocomplete="new-password" >
                                                    <x-core::form.fields.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
												</div>
                                                <button class="btn btn-main-primary btn-block">{{ __('Create Account') }}</button>
												<div class="row row-xs">
													<div class="col-sm-6">
														<button class="btn btn-block"><i class="fab fa-facebook-f"></i> {{ __('Signup with Facebook') }}</button>
													</div>
													<div class="col-sm-6 mg-t-10 mg-sm-t-0">
														<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> {{ __('Signup with Twitter') }}</button>
													</div>
												</div>
											</form>
											<div class="main-signup-footer mt-5">
												<p>{{ __('Already have an account?') }} <a href="{{ route('login') }}">{{ __('Sign In') }}</a></p>
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
