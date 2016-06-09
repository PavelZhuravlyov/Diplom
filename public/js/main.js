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
$(document).ready(function(){
	var templates = {
		autor_reg: Handlebars.compile($('#autor_reg').html())
	},
	myPopup;

	$(document).on('click', '.js-auto_reg', function() {
		var data = $(this).data('button');
		// ajax запрос, получить JSON данные
		myPopup = new PopupModule($('.pop-ups'));
		myPopup.show(templates.autor_reg, popup);

		return false;
	});

	$(document).on('click', '.js-close_popup', function() {
		myPopup.hide();
		return false;
	});

	$(document).on('click', '.js-info_btn', function() {
		var 
			$this = $(this),
			dataInfo  = $(this).data('info') - 1,
			arrInfoBl = $('.company-about-info');

		if (!arrInfoBl.length) {		
			arrInfoBl = $('.user-profile-main_inform-bl');
		} 

		changeActiveInfo(arrInfoBl, $this, dataInfo);

		return false;
	});

	// Перекдючалки на userProfile и  companyProfile
	function changeActiveInfo(arrInfoBl, thisBtn, dataInfo) {
		thisBtn.siblings().removeClass('link-active');
		thisBtn.addClass('link-active');

		arrInfoBl.siblings().removeClass('info-active');
		arrInfoBl.eq(dataInfo).addClass('info-active');
	}
});
var popup = {
	name: "Авторизация",
	prefix: "Чтобы войти в личный кабинет введите логин и пароль",
	fields: [
		{
			name: 'Логин(e-mail)',
			typeField: 'text',
			nameField: 'Auto[login]',
		},
		{
			name: 'Пароль',
			typeField: 'password',
			nameField: 'Auto[pass]'
		},
		{
			name: 'Запомнить меня',
			typeField: 'checkbox',
			nameField: 'Auto[remember]',
			checkbox: true
		}
	]
};
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInBvcHVwLmpzIiwibWFpbi5qcyIsImRhdGEuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDcEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUMzQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoibWFpbi5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vINCc0L7QtNGD0LvRjCDRgNCw0LHQvtGC0Ysg0YHQviDQstGB0L/Qu9GL0LLQsNGI0LrQsNC80LhcclxuZnVuY3Rpb24gUG9wdXBNb2R1bGUoJHBvcHVwV3JhcCkge1xyXG5cdHRoaXMucG9wdXBXcmFwID0gJHBvcHVwV3JhcDtcclxuXHR2YXIgc2VsZiA9IHRoaXM7XHJcblxyXG5cdHRoaXMuc2hvdyA9IGZ1bmN0aW9uKHRlbXBsYXRlLCBkYXRhKSB7XHJcblx0XHQkKCdib2R5JykuYWRkQ2xhc3MoJ2JvZHktc2hhZG93Jyk7XHJcblx0XHR0aGlzLnBvcHVwV3JhcC5odG1sKF9yZW5kZXJUZW1wKHRlbXBsYXRlLCBkYXRhKSkuZmFkZUluKDUwMCk7XHJcblx0fTtcclxuXHJcblx0dGhpcy5oaWRlID0gZnVuY3Rpb24oKSB7XHJcblx0XHR0aGlzLnBvcHVwV3JhcC5mYWRlT3V0KDMwMCwgZnVuY3Rpb24oKSB7XHJcblx0XHRcdCQoJ2JvZHknKS5yZW1vdmVDbGFzcygnYm9keS1zaGFkb3cnKTtcclxuXHRcdFx0c2VsZi5wb3B1cFdyYXAuaHRtbCgnJyk7XHJcblx0XHR9KTtcclxuXHR9O1xyXG5cclxuXHRmdW5jdGlvbiBfcmVuZGVyVGVtcCh0ZW1wbGF0ZSwgZGF0YSkge1xyXG5cdFx0cmV0dXJuIHRlbXBsYXRlKGRhdGEpO1xyXG5cdH07XHJcbn0iLCIkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpe1xyXG5cdHZhciB0ZW1wbGF0ZXMgPSB7XHJcblx0XHRhdXRvcl9yZWc6IEhhbmRsZWJhcnMuY29tcGlsZSgkKCcjYXV0b3JfcmVnJykuaHRtbCgpKVxyXG5cdH0sXHJcblx0bXlQb3B1cDtcclxuXHJcblx0JChkb2N1bWVudCkub24oJ2NsaWNrJywgJy5qcy1hdXRvX3JlZycsIGZ1bmN0aW9uKCkge1xyXG5cdFx0dmFyIGRhdGEgPSAkKHRoaXMpLmRhdGEoJ2J1dHRvbicpO1xyXG5cdFx0Ly8gYWpheCDQt9Cw0L/RgNC+0YEsINC/0L7Qu9GD0YfQuNGC0YwgSlNPTiDQtNCw0L3QvdGL0LVcclxuXHRcdG15UG9wdXAgPSBuZXcgUG9wdXBNb2R1bGUoJCgnLnBvcC11cHMnKSk7XHJcblx0XHRteVBvcHVwLnNob3codGVtcGxhdGVzLmF1dG9yX3JlZywgcG9wdXApO1xyXG5cclxuXHRcdHJldHVybiBmYWxzZTtcclxuXHR9KTtcclxuXHJcblx0JChkb2N1bWVudCkub24oJ2NsaWNrJywgJy5qcy1jbG9zZV9wb3B1cCcsIGZ1bmN0aW9uKCkge1xyXG5cdFx0bXlQb3B1cC5oaWRlKCk7XHJcblx0XHRyZXR1cm4gZmFsc2U7XHJcblx0fSk7XHJcblxyXG5cdCQoZG9jdW1lbnQpLm9uKCdjbGljaycsICcuanMtaW5mb19idG4nLCBmdW5jdGlvbigpIHtcclxuXHRcdHZhciBcclxuXHRcdFx0JHRoaXMgPSAkKHRoaXMpLFxyXG5cdFx0XHRkYXRhSW5mbyAgPSAkKHRoaXMpLmRhdGEoJ2luZm8nKSAtIDEsXHJcblx0XHRcdGFyckluZm9CbCA9ICQoJy5jb21wYW55LWFib3V0LWluZm8nKTtcclxuXHJcblx0XHRpZiAoIWFyckluZm9CbC5sZW5ndGgpIHtcdFx0XHJcblx0XHRcdGFyckluZm9CbCA9ICQoJy51c2VyLXByb2ZpbGUtbWFpbl9pbmZvcm0tYmwnKTtcclxuXHRcdH0gXHJcblxyXG5cdFx0Y2hhbmdlQWN0aXZlSW5mbyhhcnJJbmZvQmwsICR0aGlzLCBkYXRhSW5mbyk7XHJcblxyXG5cdFx0cmV0dXJuIGZhbHNlO1xyXG5cdH0pO1xyXG5cclxuXHQvLyDQn9C10YDQtdC60LTRjtGH0LDQu9C60Lgg0L3QsCB1c2VyUHJvZmlsZSDQuCAgY29tcGFueVByb2ZpbGVcclxuXHRmdW5jdGlvbiBjaGFuZ2VBY3RpdmVJbmZvKGFyckluZm9CbCwgdGhpc0J0biwgZGF0YUluZm8pIHtcclxuXHRcdHRoaXNCdG4uc2libGluZ3MoKS5yZW1vdmVDbGFzcygnbGluay1hY3RpdmUnKTtcclxuXHRcdHRoaXNCdG4uYWRkQ2xhc3MoJ2xpbmstYWN0aXZlJyk7XHJcblxyXG5cdFx0YXJySW5mb0JsLnNpYmxpbmdzKCkucmVtb3ZlQ2xhc3MoJ2luZm8tYWN0aXZlJyk7XHJcblx0XHRhcnJJbmZvQmwuZXEoZGF0YUluZm8pLmFkZENsYXNzKCdpbmZvLWFjdGl2ZScpO1xyXG5cdH1cclxufSk7IiwidmFyIHBvcHVwID0ge1xyXG5cdG5hbWU6IFwi0JDQstGC0L7RgNC40LfQsNGG0LjRj1wiLFxyXG5cdHByZWZpeDogXCLQp9GC0L7QsdGLINCy0L7QudGC0Lgg0LIg0LvQuNGH0L3Ri9C5INC60LDQsdC40L3QtdGCINCy0LLQtdC00LjRgtC1INC70L7Qs9C40L0g0Lgg0L/QsNGA0L7Qu9GMXCIsXHJcblx0ZmllbGRzOiBbXHJcblx0XHR7XHJcblx0XHRcdG5hbWU6ICfQm9C+0LPQuNC9KGUtbWFpbCknLFxyXG5cdFx0XHR0eXBlRmllbGQ6ICd0ZXh0JyxcclxuXHRcdFx0bmFtZUZpZWxkOiAnQXV0b1tsb2dpbl0nLFxyXG5cdFx0fSxcclxuXHRcdHtcclxuXHRcdFx0bmFtZTogJ9Cf0LDRgNC+0LvRjCcsXHJcblx0XHRcdHR5cGVGaWVsZDogJ3Bhc3N3b3JkJyxcclxuXHRcdFx0bmFtZUZpZWxkOiAnQXV0b1twYXNzXSdcclxuXHRcdH0sXHJcblx0XHR7XHJcblx0XHRcdG5hbWU6ICfQl9Cw0L/QvtC80L3QuNGC0Ywg0LzQtdC90Y8nLFxyXG5cdFx0XHR0eXBlRmllbGQ6ICdjaGVja2JveCcsXHJcblx0XHRcdG5hbWVGaWVsZDogJ0F1dG9bcmVtZW1iZXJdJyxcclxuXHRcdFx0Y2hlY2tib3g6IHRydWVcclxuXHRcdH1cclxuXHRdXHJcbn07Il0sInNvdXJjZVJvb3QiOiIvc291cmNlLyJ9
