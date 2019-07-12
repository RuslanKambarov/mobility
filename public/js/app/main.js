var data_action;//текущее действие редактирование/удаление
var data_id;//текущий редактируемый объект при редактировании/удалении
var _;//словарь локализации с сервера

$(document).ready(function () {
    ajax.data_action = 'sys/lang';

    ajax.load(function(json){
        _ = json;//сохранение словаря локализации с сервера
    });
});

$('body').on('click', '.notification', function(){
    ajax.updateNotifications($(this).data('id'));//обновление уведомлений
});

materialadmin.DemoUIMessages._toastrStateConfig();

$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('body').on('click', "[data-action='formadd']", function(e){//делегируется от body так как объект может быть создан динамически
    resetForm();
});

$('body').on('click', "[data-action='fetch']", function(e){//делегируется от body так как объект может быть создан динамически
    resetForm()
    //ajax.data_id = $(this).data('id');
    let target = $(this).attr('href');
    let object = $(this).attr('href').replace('#form-edit', '');

    ajax.data_action = 'fetch/' + object;
    ajax.data_id = $(this).data('id');
    ajax.data = { id : ajax.data_id};

    ajax.load(function(json){
        console.log(target);
        DataToForm(json, target);
    });
});

function DataToForm(data, form)
{
    $(form + ' input').each(function(element) {
        if(this.name != "_token" && this.name != "Password")
        $(this).val(data[this.name]);
    });
}

function formData(name)
{
    let data = {};

    name = name.replace('/', '');

    $('#'+name+' input').each(function(){
        data[this.name] = $(this).val();
    })

    return data;
}

function resetForm(){
    $('.form-validate').each(function(){
        this.reset();
        $('#'+this.id+' div').each(function(){$(this).removeClass('has-error')});
        $('.help-block').each(function(){$(this).remove()});
    })
}

$("[data-action='add']").on('click', function(){
    
    ajax.data_action = $(this).data('action') + "/" + $(this).data('objects');  
    ajax.data = formData(ajax.data_action);

    ajax.statusCode = {//statusCode
                            422: function (data) {             
                                    $.each(data.responseJSON.errors, function (key, value) {
                                        $("input[name='"+key+"']").parent().addClass('has-error');

                                        if(document.getElementById(key+"-error'"))
                                        {
                                            $("#"+key+"-error'").html(value);
                                            $("#"+key+"-error'").css("display: block");
                                        }
                                        
                                        $("input[name='"+key+"']").prop('aria-invalid', 'false')                           
                                        console.log(key+" "+value);
                                        toastr.error(key+" "+value, '');
                                    })
                            }
                        };

    ajax.crud();
});

$("[data-action='edit']").on('click', function(e){
    
    ajax.data_action = $(this).data('action') + "/" + $(this).data('objects');   

    extend_action = formData(ajax.data_action);
    extend_action['id'] = ajax.data_id;

    ajax.data = extend_action;
     
    ajax.statusCode = {
                            422: function (data) {             
                                    $.each(data.responseJSON.errors, function (key, value) {
                                        $("input[name='"+key+"']").parent().addClass('has-error');

                                        if(document.getElementById(key+"-error'"))
                                        {
                                            $("#"+key+"-error'").html(value);
                                            $("#"+key+"-error'").css("display: block");
                                        }
                                        
                                        $("input[name='"+key+"']").prop('aria-invalid', 'false')                           
                                        console.log(key+" "+value);
                                        toastr.error(key+" "+value, '');
                                    })
                            }
                        };
    ajax.crud();

});

$('body').on('click', "[data-action='delete']", function(e){//делегируется от body так как объект может быть создан динамически
    ajax.data_action = $(this).data('action') + "/" + $(this).data('objects');
    ajax.data_id = $(this).data('id');

    $('#confirm-title').html(_['areyousure']);
    $('#confirm-message').html(_['datadelete']);

});

$("[data-action='confirmOK']").on('click', function(e){
   
    ajax.data = { id : ajax.data_id };
    ajax.crud();

});

/*********************************************************************************************/
/*                             Section success AJAX queries                                  */
/*********************************************************************************************/
(function ($) {
    "use strict";

    var ajax = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
    var p = ajax.prototype;
    p.data = {};
    p.data_action = "";
    p.data_id = 0;
    p.statusCode = {};
    p._ = {};
    
    p.initialize = function() {};

    p.async = function(url, successfunc, data, statusCode)
    {
        $.ajax(
            {
                url: url, 
                type: 'POST', 
                dataType: 'json', 
                data: data,
                cache: true,
                statusCode: statusCode,                              
                error: function(req, text, error)
                {
                    console.log(text + " | " + error);
                    toastr.error(text+" "+error, '');
                },
                success: function(json)
                {    
                    successfunc(json);
                }
            });
    }

    p.load = function(successfunc)
    {
        this.async(this.data_action, successfunc, this.data, this.statusCode);    
    }

    p.crud = function()
    {
        /*let method = this.data_action.split('/')[0];
        this[method]();*/
        this.async(this.data_action, (json) => {

            let action = this.data_action.replace('/', '');
            toastr[json.typeMsg](_[action] + ': ' + json.text, '');

            materialadmin.AppOffcanvas._handleOffcanvasClose();

            $('#section_content_of_module').load(document.URL + ' #content_of_module');

            p.updateNotifications();

        }, this.data, this.statusCode);   
    }

    p.updateNotifications = function(id)
    {
        $('#notifications_count').load(document.URL + ' #notifications_count');

        this.async('sys/notification', function(json)
        {
            $('#notifications_count').load(document.URL + ' #notifications_count');

            $('#notification_list').empty();

            $('#notification_list').append(json.view);

        }, { id : id });

        setTimeout(function(){
            $('#notifications').load(document.URL + ' #notifications');
        }, 300);
    }

    window.ajax = new ajax;
}(jQuery));