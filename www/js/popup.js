// Модуль работы со всплывашками
function PopupModule($popup) {
	this.popup = $popup;

	var cachedPopup;

	console.log($popup);

	function _renderTemp(template, data) {
		return template(data);
	};
	
	this.show = function(template, data) {
		$('body').addClass('body-shadow');
		$('body').append(_renderTemp(template, data)).fadeIn(300);
	};

	this.hide = function() {
		$('body').removeClass('body-shadow');
	};
}