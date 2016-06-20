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