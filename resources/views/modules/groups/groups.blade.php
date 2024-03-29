@extends('layouts.appnav')

@section('content')
<div id="content_of_module" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Groups</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }} 
                        </div>
                    @endif

                    users
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
