<div class="card university-card" data-id="{{$university->id}}" id = "content_of_module">
        <div class="card-body no-padding">
            <ul class="list">
                <li class="tile">
                    <a class="tile-content ink-reaction">
                        <div class="tile-text">
                            <span>{{$university->name}}</span>
                            <div>
                                {{$university->description}}
                            </div> 
                        </div>
                    </a>
                    @if ( Auth::user()->role_id != 3)
                    <a class="btn btn-flat ink-reaction" data-id="{{$university->id}}" href="#form-edituniversities" data-action="fetch" data-toggle="offcanvas">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a class="btn btn-flat ink-reaction" data-id="{{$university->id}}" href="#confirm" data-action="delete" data-objects="universities" data-toggle="offcanvas">
                        <i class="fa fa-trash"></i>
                    </a>
                    @endif
                </li>
            </ul>
        </div><!--end .card-body -->
    </div>