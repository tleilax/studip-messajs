(function ($) {
    $.noty.defaults.layout = 'inline';
    $.noty.defaults.theme  = 'studipTheme';
    $.noty.defaults.maxVisible = 64;
    $.noty.defaults.closeWith  = ['button'];
    $.noty.defaults.template = '<div class="noty_message"><div class="noty_text"></div><div class="noty_close"></div></div>';
    $.noty.defaults.animation.speed = 'fast';
    
    var container = '#barBottomContainer';

    function postMessage (type) {
        return function (message, details) {
            var content = $('<strong>').html(message);
            content.append('<br>');
            if ($.isArray(details)) {
                var list = $('<ul>');
                for (var i = 0; i < details.length; i++) {
                    $('<li>').html(details[i]).appendTo(list);
                }
                content.after(list);
            }
            $(container).noty({type: type, text: content});
        }
    }

    STUDIP.MessageBox = {
        success:   postMessage('success'),
        info:      postMessage('info'),
        warning:   postMessage('warning'),
        error:     postMessage('error'),
        exception: postMessage('exception')
    }

    $(document).bind('ajaxComplete', function (event, xhr) {
        var header = xhr.getResponseHeader('X-STUDIP-Messages'),
            messages;
        if (header) {
            messages = $.parseJSON(header);
            $.each(messages, function (index, message) {
                STUDIP.MessageBox[message.class](message.message, message.details);
            });
        }
    });
}(jQuery));


jQuery(function ($) {
    $('#spawn').submit(function () {
        var via = $('input[name=via]:checked').val()
        if (via === 'php') {
            return;
        }
        
        if (via === 'js') {
            var type = $('#type').val(),
                text = $('#text').val(),
                details = $('#details').prop('checked') ? ['foo', 'bar'] : null;

            STUDIP.MessageBox[type](text, details);
        }
        
        if (via === 'ajax') {
            var url  = $(this).attr('action'),
                data = $(this).serialize();
            $.post(url, data, function (html) {
                $('#ajax').html(html);
                $('#ajax_output').show();
            });
            
        }
        
        return false;
    });
});