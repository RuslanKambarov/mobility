<!-- BEGIN OFFCANVAS RIGHT EDITUSERS-->
<div id="form-edituniversities" class="offcanvas-pane width-10" style="">
    <div class="offcanvas-head style-primary">
        <header>{{ __('vocabulary.edit') }}</header>
        <div class="offcanvas-tools">
            <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                <i class="md md-close"></i>
            </a>
        </div>
    </div>
    <div class="nano has-scrollbar" style="height: 805px;">
        <div class="nano-content" tabindex="0" style="right: -17px;">
            <div class="offcanvas-body">
                <form id="edituniversities" class="form form-validate form-nostyle" novalidate="novalidate">

                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="name_edit" name="name" required="" data-rule-minlength="2" aria-required="true">
                        <label for="lastname">{{ __('vocabulary.univername') }}</label>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="description_edit" name="description" required="" data-rule-minlength="2" aria-required="true"></input>
                        <label for="firstname">{{ __('vocabulary.univerdescr') }}</label>
                    </div>

                </form>
            </div>
        </div>
        <div class="nano-pane" style="display: none;">
            <div class="nano-slider" style="height: 788px; transform: translate(0px, 0px);"></div>
        </div>
    </div>
    <div class="force-padding stick-bottom-right">
        <button class="btn btn-flat btn-primary ink-reaction cancel" data-dismiss="offcanvas">{{ __('vocabulary.cancel') }}</button>
        <button class="btn btn-flat btn-primary ink-reaction" data-action="edit" data-objects="universities">{{ __('vocabulary.save') }}</button>
    </div>
</div>
<!-- ENDOFFCANVAS RIGHT EDITUSERS -->