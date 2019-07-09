@extends('layouts.appnav')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12">

        <div class="accordion" id="accordionUsers">
        @foreach(App\Roles::get() as $role)
            <div class="card">
                <div class="card-header row" id="heading{{$role->id}}">
                <div class="col-sm-11">
                    <h5 class="mb-0">
                        <button class="btn btn-link p-0 ml-2 l-h-0 {{$role->id == ($_GET['role'] ?? 0) ? '' : 'collapsed'}}" type="button" data-toggle="collapse" data-target="#collapse{{$role->id}}" aria-expanded="true" aria-controls="collapse{{$role->id}}">
                            <a href='?role={{$role->id}}' >{{ Lang::choice('vocabulary.'.$role->name, 2) }}</a>
                        </button>
                        
                    </h5>
                </div>
                <div class="col-sm-1 pl-2">
                    <a type="button" class="btn ink-reaction btn-icon-toggle btn-primary {{($role->id == ($_GET['role'] ?? 0) && ($_GET['role'] ?? null) != 3) ? '' : 'disabled'}}"" href="#form-addusers" data-action="formadd" data-toggle="offcanvas"><i class="md md-person-add"></i></a>
                </div>
                </div>

                <div id="collapse{{$role->id}}" class="collapse {{$role->id == ($_GET['role'] ?? 0) ? 'in' : ''}} show" aria-labelledby="heading{{$role->id}}" data-parent="#accordionUsers" style="{{$role->id == ($_GET['role'] ?? 0) ? '' : 'height: 0px;'}}">
                    <div class="card-body">
                    @if ($role->id != 3)
                        {{App\User::where('role_id', '=', $role->id)->where('id', '!=', Auth::user()->id)->paginate(15)->links()}}
                        @foreach(App\User::where('role_id', '=', $role->id)->where('id', '!=', Auth::user()->id)->paginate(15) as $user)

                            @include('modules.users.card')

                        @endforeach
                    @else

                        {{App\PlatonusUser::where('isStudent', '=', 1)->paginate(15)->links()}}

                        @foreach(App\PlatonusUser::where('isStudent', '=', 1)->paginate(15) as $user)

                            @include('modules.users.card')
                            
                        @endforeach                 
                    @endif 
                    </div>
                </div>
                
                
            </div>
        @endforeach
        </div>

        </div>
    </div>
</div>
@endsection


@section('offcanvas')

    @include('modules.users.add')

    @include('modules.users.edit')

@endsection
