(function ($) {

    $.noty.layouts.inline = {
        name: 'inline',
        options: {},
        container: {
            object: '<ul class="noty_studip_layout_container" />',
            selector: 'ul.noty_studip_layout_container',
            style: function () {}
        },
        parent: {
            object: '<li />',
            selector: 'li',
            css: {}
        },
        css: {
            display: 'none'
        },
        addClass: ''
    };
    
}(jQuery));