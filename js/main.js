/**
 * Created by Manriel on 07.03.2015.
 */
jQuery(function(){

    scheduler = {
        alert: {
            instanse: [],
            show: function(name, msg, type, autoclose) {
                type = type || 'info';
                autoclose = autoclose || false;
                oAlert = $('<div class="alert alert-' + type + ' alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + msg + '</div>');
                $('#alerts').append(oAlert);
                scheduler.alert.instanse[name] = oAlert;
                if (autoclose) {
                    setTimeout(scheduler.alert.hide(name), 1500);
                }
            },
            hide: function(name) {
                var oAlert = $(scheduler.alert.instanse[name]);
                if (oAlert.length) {
                    oAlert.alert('close');
                    scheduler.alert.instanse[name] = null;
                }
            }
        },

        functions: {

        }

    };

    $('.alert.autohide').each(function(index, elem){
        setTimeout(function(){ $(elem).alert('close') }, 1000 + (200*index) );
    });


    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
        // Avoid following the href location when clicking
        event.preventDefault();
        // Avoid having the menu to close when clicking
        event.stopPropagation();
        // If a menu is already open we close it
        //$('ul.dropdown-menu [data-toggle=dropdown]').parent().removeClass('open');
        // opening the one you clicked on
        $(this).parent().addClass('open');

        var menu = $(this).parent().find("ul");
        var menupos = menu.offset();

        if ((menupos.left + menu.width()) + 30 > $(window).width()) {
            var newpos = - menu.width();
        } else {
            var newpos = $(this).parent().width();
        }
        menu.css({ left:newpos });

    });

});