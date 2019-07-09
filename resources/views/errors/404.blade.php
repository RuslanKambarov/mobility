@extends('layouts.appnav')

@section('content')
				<!-- BEGIN 404 MESSAGE -->
				<section>
					
					<div class="section-body contain-lg">
						<div class="row">
							<div class="col-lg-12 text-center">
								<h1><span class="text-xxxl text-light">404</i></span></h1>
								<h2 class="text-light">This page does not exist</h2>
								<div class="section-header">
									<ol class="breadcrumb">
										<li><a href="/home">{{ __( 'vocabulary.home') }}</a></li>
										<li class="active">404</li>
									</ol>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
				<!-- END 404 MESSAGE -->
@endsection
