
function iCheckInit(target, options){
    if (target) target = target.trim();
    else target = '';
    
    if (target && target != '') target += ' ';
    
    var opt = $.extend(options, {
        checkboxClass: 'icheckbox_square-blue',
        radioClass:    'iradio_square-blue'
    });
    
    $(target + 'input').iCheck(opt); 
}


function SelectBoxInit(target, options){
    if (target) target = target.trim();
    else target = '';
    
    if (target && target != '') target += ' ';
    
    var opt = $.extend(options, {
        //autoWidth: true
    });
    
    $(target + 'select').selectBoxIt(opt);
    //$(target + 'select').chosen();
}

function datepicker(target, options){
    if (target) target = target.trim();
    else target = '';
    
    if (target && target != '') target += ' ';
    
    var opt = $.extend(options, {
        dateFormat: 'dd.mm.yy'
    });
    
    $(target + '.datepicker').datepicker(opt);
}

function spinner(target, options){
    if (target) target = target.trim();
    else target = '';
    
    if (target && target != '') target += ' ';
    
    var opt = $.extend(options, {
        min: 0
    });
    
    $(target + 'input.spinner').spinner(opt);
}

function mask(target, options){
    if (target) target = target.trim();
    else target = '';
    
    if (target && target != '') target += ' ';
    
    var opt = $.extend(options, {
        reverse: true
    });
    
    $(target + '.mask-money').mask('000 000', opt);
}

function required(target, options){
    if (target) target = target.trim();
    else target = '';
    
    if (target && target != '') target += ' ';
    
    var opt = $.extend(options, {
        reverse: true
    });
    
    $(target + ':input[required="required"]').after('<i class="requi" title="Поле обязательно для заполнения"></i>');
    $(target + 'i.requi').tooltip({placement:'top'});
}

function initCustom(target){
    iCheckInit(target);
    SelectBoxInit(target);
    datepicker(target);
    spinner(target);
    mask(target);
    required(target);
}


$(document).ready(function(){
   
    $('.nav *').tooltip({
        placement: 'bottom'
    });
    
    initCustom();
    
});