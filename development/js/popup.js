// Модуль работы со всплывашками
function PopupModule($popupWrap) {
	this.popupWrap = $popupWrap;
	var self = this;

	this.show = function(template, data) {
		$('body').addClass('body-shadow');
		this.popupWrap.html(_renderTemp(template, data)).fadeIn(500);
	};

	this.hide = function() {
		this.popupWrap.fadeOut(300, function() {
			$('body').removeClass('body-shadow');
			self.popupWrap.html('');
		});
	};

	function _renderTemp(template, data) {
		return template(data);
	};
}