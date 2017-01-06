$(function(){
    $('a[data-toggle="popin-help"],btn[data-toggle="popin-help"]').click(function(){
        alert('popin aide à venir...');
    });

    //USER_DESIGN
    $('[data-skin]').click(function(){
        $('#preview-skin').html($(this).html());
        $('body').removeClass('skin-blue skin-black skin-purple skin-green skin-red skin-yellow skin-blue-light skin-black-light skin-purple-light skin-green-light skin-red-light skin-yellow-light');
        $('body').addClass($(this).attr('data-skin'));
    });

    $('[data-background]').click(function(){
        $('#preview-background').html($(this).html());
        $('body').removeClass('bg-lightgray bg-gray bg-darkgray');
        $('body').addClass($(this).attr('data-background'));
    });

    $('[data-layout]').click(function(){
        $('body').removeClass('fixed layout-boxed sidebar-collapse');
        $('body').addClass($(this).attr('data-layout'));
    });

    $('[data-widget="mgc-hideRulesInactive"]').click(function(){
        var iconShow = 'fa-eye';
        var iconHide = 'fa-eye-slash';

        console.log($(this).parents('.mgc-rules-container').children('[data-active="false"]'));

        if( $(this).children('i').hasClass(iconShow) ){
            $(this).children('i').removeClass(iconShow);
            $(this).children('i').addClass(iconHide);

            $(this).parents('.mgc-rules-container').children('[data-active="false"]').hide();
        }else{
            $(this).children('i').removeClass(iconHide);
            $(this).children('i').addClass(iconShow);

            $(this).parents('.mgc-rules-container').children('[data-active="false"]').hide();
        }

        console.log('coucou2');
    });
    //data-widget="mgc-display"
    //data-active
});
