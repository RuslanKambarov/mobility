<div class="card" data-id="{{$user->id}}">
    <div class="card-body no-padding">
        <ul class="list">
            <li class="tile">
                <a class="tile-content ink-reaction">
                    <div class="tile-text"">
                        {{$user->lastname}} {{$user->firstname}} {{$user->patronymic}}
                        <small>
                            {{ __('vocabulary.login_lbl') }}: {{$user->Login}}
                        </small>
                    </div>
                </a>
                @if ( ($role->id ?? $user->role_id) != 3)
                <a class="btn btn-flat ink-reaction" data-id="{{$user->id}}" href="#form-editusers" data-action="fetch" data-toggle="offcanvas">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-flat ink-reaction" data-id="{{$user->id}}" href="#confirm" data-action="delete" data-objects="users" data-toggle="offcanvas">
                    <i class="fa fa-trash"></i>
                </a>
                @endif
            </li>
        </ul>
    </div><!--end .card-body -->
</div>