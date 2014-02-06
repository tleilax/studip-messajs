(function () {
    $.noty.defaults.layout = 'inline';
    $.noty.defaults.theme  = 'studipTheme';
//    $.noty.defaults.closeWith  = ['button'];
    
    var container = '#barBottomContainer';

    function postMessage (type) {
        return function (message) {
            $(container).noty({type: type, text: message});
        }
    }

    STUDIP.MessageBox = {
        success:   postMessage('success'),
        info:      postMessage('info'),
        warning:   postMessage('warning'),
        error:     postMessage('error'),
        exception: postMessage('exception')
    }
}());

jQuery(function ($) {
    STUDIP.MessageBox.success('Success!');
    STUDIP.MessageBox.info('Info!');
    STUDIP.MessageBox.warning('Warning!');
    STUDIP.MessageBox.error('Error!');
    STUDIP.MessageBox.exception('Exception!');
});