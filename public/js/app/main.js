var data_action;//текущее действие редактирование/удаление
var data_id;//текущий редактируемый объект при редактировании/удалении
var _;//словарь локализации с сервера

function async(url, successfunc, data, statusCode)
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

$(document).ready(function () {
    async('sys/lang', function(json){
        _ = json;//сохранение словаря локализации с сервера
    } );
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
    data_id = $(this).data('id');
    let target = $(this).attr('href');
    let object = $(this).attr('href').replace('#form-edit', '');

    async('fetch/' + object, function(json)
    {

        console.log(target);
        DataToForm(json, target);

    }, { id : data_id });
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
    let action = $(this).data('action') + "/" + $(this).data('objects');

    async(action, 
        function(json)
        {
            ajax.success(action, json);
            materialadmin.AppOffcanvas._handleOffcanvasClose();

        }, 
        formData(action),
        {//statusCode
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
        } 
        );
});

$("[data-action='edit']").on('click', function(e){
    let action = $(this).data('action') + "/" + $(this).data('objects');

    extend_action = formData(action);
    extend_action['id'] = data_id;

    async(action, function(json)
        {
            ajax.success(action, json);
            materialadmin.AppOffcanvas._handleOffcanvasClose();

        }, 
        extend_action, 
        {//statusCode
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
        }
        );
});

$('body').on('click', "[data-action='delete']", function(e){//делегируется от body так как объект может быть создан динамически
    data_action = $(this).data('action') + "/" + $(this).data('objects');
    data_id = $(this).data('id');

    $('#confirm-title').html(_['areyousure']);
    $('#confirm-message').html(_['datadelete']);

});

$("[data-action='confirmOK']").on('click', function(e){
    async(data_action, function(json)
    {
        json.id = data_id;
        ajax.success(data_action, json);

        materialadmin.AppOffcanvas._handleOffcanvasClose();

    }, { id : data_id });
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
    
    p.initialize = function() {};

    p.success = function(method, json)
    {
        method = method.replace('/', '');

        this[method](method, json);
    }

    //-----------------------------------------
    p.addusers = function (action, json)
    {
        let user = formData(action);

        toastr.success(_[action] + ': ' + user.Login, '');

        let lastpage = $('#collapse'+ user.role_id +' .pagination').children().length - 1;

        if( $('#collapse'+ user.role_id +' .pagination li:nth-child('+ lastpage +')').hasClass('active') || $('#collapse'+ user.role_id +' .pagination').length == 0 )
        {
            //$('#collapse'+ user.role_id+' > .card-body').append(json.view);
            $('#collapse' + user.role_id).load(document.URL + ' #collapse' + user.role_id);
        }
    }

    p.deleteusers = function (action, json)
    {
        toastr.info(_[action] + ': ' + json.Login, '');

        $("[data-id='"+ json.id +"']").remove();
    }

    p.editusers = function (action, json)
    {
        toastr.success(_[action] , '');

        $('#collapse' + json.role_id).load(document.URL + ' #collapse' + json.role_id);
    }
    //-----------------------------------------------

    window.ajax = new ajax;
}(jQuery));