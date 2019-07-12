<li class="dropdown-header">{{ __('vocabulary.notifications') }}</li>
@foreach( App\Notifications::getMessagesTake(Auth::user()->id, 3) as $notification)
<li>
    <a class="alert alert-callout alert-{{strtolower($notification->level_name)}} notification" href="javascript:void(0);" data-id="{{$notification->notify_id}}">
        <strong>{{ __('vocabulary.'.$notification->message) }}</strong><br/>
        <small>{{ App\Logs::getContext($notification->log_id)['text'] }}</small>
    </a>
</li>
@endforeach

@if (App\Notifications::getMessagesCount(Auth::user()->id) == 0)
<li>
    <a class="alert alert-callout" href="javascript:void(0);"">
        <strong>{{ __('vocabulary.absence_notify') }}</strong><br/>
    </a>
</li>
@endif
<li class="dropdown-header">{{ __('vocabulary.option') }}</li>
<li><a href="/notifications">{{ __('vocabulary.allmessages') }}<span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>