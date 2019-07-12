@extends('layouts.appnav')

@section('content')
<div id="content_of_module" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12">

        <ul id="notifications">
        @foreach( App\Notifications::getMessages(Auth::user()->id) as $notification)
        <div class="alert alert-callout alert-{{strtolower($notification->level_name)}}" role="alert" data-id="{{$notification->notify_id}}">
            <strong>{{ __('vocabulary.'.$notification->message) }}</strong> {{ App\Logs::getContext($notification->log_id)['text'] }}
            <a class="btn btn-icon-toggle btn-close pull-right mt--06 notification" data-id="{{$notification->notify_id}}"><i class="md md-close"></i></a>
        </div>
        @endforeach
        
        @if (App\Notifications::getMessagesCount(Auth::user()->id) == 0)
        <div class="alert alert-callout" role="alert">
            <strong>{{ __('vocabulary.absence_notify') }}</strong>
        </div>
		@endif
        </ul>
        
        </div>
    </div>
</div>
@endsection