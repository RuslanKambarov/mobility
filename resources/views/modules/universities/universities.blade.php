@extends('layouts.appnav')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="card col-md-12" id = "universities">
            <div class="row">
                <div class="col-md-11">
                    <div class="card-header" id="heading">
                        <h3>Университеты</h3>
                    </div>
                </div>
                <div class="col-sm-1 pl-2">
                    <a type="button" class="btn ink-reaction btn-icon-toggle btn-primary" href="#form-adduniversities" data-action="formadd" data-toggle="offcanvas"><i class="md md-add"></i></a>
                </div>
            </div>
            <div class="section_content_of_module">    
                @foreach (App\University::all() as $university)
                    @include('modules.universities.card')
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('offcanvas')

    @include('modules.universities.add')

    @include('modules.universities.edit')

@endsection
