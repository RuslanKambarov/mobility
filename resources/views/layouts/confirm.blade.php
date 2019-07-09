<!-- BEGIN OFFCANVAS RIGHT CONFIRM-->
<div id="confirm" class="offcanvas-pane width-7" style="">
    <div class="offcanvas-head">
        <header id="confirm-title">title</header>
        <div class="offcanvas-tools">
            <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                <i class="md md-close"></i>
            </a>
        </div>
    </div>
    <div class="nano has-scrollbar" style="height: 805px;">
        <div class="nano-content" tabindex="0" style="right: -17px;">
            <div class="offcanvas-body">
               <span id="confirm-message">message</span>
            </div>
        </div>
        <div class="nano-pane" style="display: none;">
            <div class="nano-slider" style="height: 788px; transform: translate(0px, 0px);"></div>
        </div>
    </div>
    <div class="force-padding stick-bottom-right">
        <button class="btn btn-flat btn-primary ink-reaction cancel" data-dismiss="offcanvas">{{ __('vocabulary.cancel') }}</button>
        <button class="btn btn-flat btn-primary ink-reaction" data-action="confirmOK">{{ __('vocabulary.yes') }}</button>
    </div>
</div>
<!-- ENDOFFCANVAS RIGHT CONFIRM -->