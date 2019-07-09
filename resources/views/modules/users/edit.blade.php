<!-- BEGIN OFFCANVAS RIGHT EDITUSERS-->
<div id="form-editusers" class="offcanvas-pane width-10" style="">
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
                <form id="editusers" class="form form-validate form-nostyle" novalidate="novalidate">

                    {{ csrf_field() }}
                    
                    <div class="mb-1">
                        <input type="text" id="role_id_edit" name="role_id" value="{{$_GET['role'] ?? 0}}" hidden>
                        <label for="lastname">{{ Lang::choice('vocabulary.'.(isset($_GET['role']) ? (new App\Roles)->getName($_GET['role']) : '__'), 1) }}</label>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="lastname_edit" name="lastname" required="" data-rule-minlength="2" aria-required="true">
                        <label for="lastname">{{ __('vocabulary.lastname') }}</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="firstname_edit" name="firstname" required="" data-rule-minlength="2" aria-required="true">
                        <label for="firstname">{{ __('vocabulary.firstname') }}</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="patronymic_edit" name="patronymic" data-rule-minlength="2">
                        <label for="patronymic">{{ __('vocabulary.patronymic') }}</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="Login_edit" name="Login" data-rule-minlength="4" required="" aria-required="true">
                        <label for="Login">{{ __('vocabulary.login_lbl') }}</label>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="Password_edit" name="Password"  required="" data-rule-minlength="8" aria-required="true" autocomplete="new-password" placeholder="*********">
                        <label for="Password">{{ __('vocabulary.password_lbl') }}</label>
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
        <button class="btn btn-flat btn-primary ink-reaction" data-action="edit" data-objects="users">{{ __('vocabulary.save') }}</button>
    </div>
</div>
<!-- ENDOFFCANVAS RIGHT EDITUSERS -->