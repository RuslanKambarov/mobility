@extends('layouts.app')

@section('content')
<!-- BEGIN LOGIN SECTION -->
<section class="section-account h-100">
    
    <div class="card contain-sm style-transparent card-center">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <br/>
                    <img src="data:image/png;base64, {{ base64_encode( App\Institution::logo() ) }} " alt="">
                    <span class="text-lg text-bold text-primary">{{ App\Institution::name() }}</span>
                    <br/><br/>
                    <form class="form floating-label" method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="form-group">                                                        
                            <input id="login" type="login" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus placeholder="{{ __('vocabulary.login_lbl') }}">
                            <label class="form-control_label" for="login">{{ __('vocabulary.login_lbl') }}</label>
                            
                        </div>
                        @error('login')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                                                        
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('vocabulary.password_lbl') }}">
                            <label class="form-control_label" for="password">{{ __('vocabulary.password_lbl') }}</label>
                             
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br/>
                        <div class="row">
                            <div class="col-xs-6 text-left">
                
                                <div class="btn-group">
                                    <button type="button" class="btn ink-reaction btn-flat dropdown-toggle font-12" data-toggle="dropdown" aria-expanded="false">
                                    {{ __('vocabulary.language') }} <i class="fa fa-caret-down text-default-light"></i>
                                    </button>
                                    <ul class="dropdown-menu animation-expand" role="menu">                                        
                                        @foreach($locales as $locale)
                                        <li><a href="setlocale/{{$locale}}"></i>{{__('vocabulary.'.$locale)}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div><!--end .col -->
                            
                            <div class="col-xs-6 text-right">
                                <button class="btn btn-primary btn-raised" type="submit">{{ __('vocabulary.login_btn') }}</button>
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </form>
                </div><!--end .col -->
                
            </div><!--end .row -->
        </div><!--end .card-body -->
    </div><!--end .card -->
</section>
@endsection
