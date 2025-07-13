@extends('core::layouts.master')

@section('title-header', __('Accounts'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        <select name="" id="" class="nice-select custom-select select2" style="margin-top: -40px;border: none;">
            <a href="{{ route('journalentries.index')}}"><option value="" selected>{{ __('Journal Entries') }} </option><i class="angle fe fe-chevron-down" style="display: block"></i></a>
        </select>
    </li>
@endsection
@section('side-header')
    <div class="pr-1 mb-3 mb-xl-0">
    </div>
@endsection
@section('content')
				<!-- row -->
				<div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('New Manual Journal Entry') }}</h3>
                            </div>
                            <div class="card-body">


                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>


                </div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
