
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

function initCustom(target){
    iCheckInit(target);
    //SelectBoxInit(target);
}


$(document).ready(function(){
   
    $('.nav *').tooltip({
        placement: 'bottom'
    });
    
    initCustom();
    
});