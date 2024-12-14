$('.password_hidder').click(function () {
    if($(this).hasClass('active')){
        $('.password_hidder').removeClass('active').attr('src','img/hide2.svg');
        $('.password_field').attr('type','text');
    }else{
        $('.password_hidder').addClass('active').attr('src','img/hide.svg');
        $('.password_field').attr('type','password');
    }
})