(function ($) {
    $.noty.defaults.layout = 'inline';
    $.noty.defaults.theme  = 'studipTheme';
    $.noty.defaults.maxVisible = 64;
    $.noty.defaults.closeWith  = ['button'];
    $.noty.defaults.template = '<div class="noty_message"><div class="noty_text"></div><div class="noty_close"></div></div>';
    
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
}(jQuery));

jQuery(function ($) {
    $('#spawn').submit(function () {
        if (!$('#js').prop('checked')) {
            return;
        }
        
        var type = $('#type').val(),
            text = $('#text').val(),
            details = $('#details').prop('checked') ? ['foo', 'bar'] : null;
        
        STUDIP.MessageBox[type](text, details);
        
        return false;
    });
});