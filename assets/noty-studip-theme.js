(function($) {

	$.noty.themes.studipTheme = {
		name: 'studipTheme',
		modal: {
			css: {
				position: 'fixed',
				width: '100%',
				height: '100%',
				backgroundColor: '#000',
				zIndex: 10000,
				opacity: 0.6,
				display: 'none',
				left: 0,
				top: 0
			}
		},
		style: function() {
			this.$buttons.css({
				padding: 5,
				textAlign: 'right',
				borderTop: '1px solid #ccc',
				backgroundColor: '#fff'
			});

			this.$buttons.find('button').css({
				marginLeft: 5
			});

			this.$buttons.find('button:first').css({
				marginLeft: 0
			});
		},
		callback: {
			onShow: function() { },
			onClose: function() { }
		}
	};

})(jQuery);
