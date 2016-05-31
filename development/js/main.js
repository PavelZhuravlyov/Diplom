$(document).ready(function(){

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
			nameField: 'Auto[remember]'
		}
	]
};

console.log(popup);

// Модуль работы со всплывашками
function PopupModule($popup) {
	this.popup = $popup;
}

PopupModule.prototype.show = function() {

};