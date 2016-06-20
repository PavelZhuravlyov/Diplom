(function() {
	var questions = [
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Инженер-технолог" },
				{ count: 1, text: "Инженер-конструктор" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Вязальщик" },
				{ count: 1, text: "Санитарный врач" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Повар" },
				{ count: 1, text: "Наборщик" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Фотограф" },
				{ count: 1, text: "Заведующий магазином" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Чертёжник" },
				{ count: 1, text: "Дизайнер" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Филосов" },
				{ count: 1, text: "Психиатр" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Учёный-химик" },
				{ count: 1, text: "Бухгалтер" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Редактор научного журнала" },
				{ count: 1, text: "Адвокат" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Лингвист" },
				{ count: 1, text: "Переводчик" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Врач-психиатр" },
				{ count: 1, text: "Статистик" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Завуч" },
				{ count: 1, text: "Председатель профкома" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Спортивный врач" },
				{ count: 1, text: "Фельетонист" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Нотариус" },
				{ count: 1, text: "Снабженец" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Перфоратор" },
				{ count: 1, text: "Карикатурист" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Политический деятель" },
				{ count: 1, text: "Писатель" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Садовник" },
				{ count: 1, text: "Метеоролог" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Водитель троллейбуса" },
				{ count: 1, text: "Медбрат(Медсестра)" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Инженер-электронщик" },
				{ count: 1, text: "Секретарь-машинист" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Маляр" },
				{ count: 1, text: "Художник по металлу" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Биолог" },
				{ count: 1, text: "Глазной врач" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Телеоператор" },
				{ count: 1, text: "Режиссёр" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Гидролог" },
				{ count: 1, text: "Ревизор" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Гидролог" },
				{ count: 1, text: "Главный зоотехник" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Математик" },
				{ count: 1, text: "Архитектор" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Работник детской комнаты миллиции" },
				{ count: 1, text: "Счетовод" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Учитель" },
				{ count: 1, text: "Командир части" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Воспитатель" },
				{ count: 1, text: "Художник по керамике" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Экономист" },
				{ count: 1, text: "Заведующий отделом" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Корректор" },
				{ count: 1, text: "Критик" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Завхоз" },
				{ count: 1, text: "Дирижёр" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Радиооператор" },
				{ count: 1, text: "Специалист по ядерной физике" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Наладчик" },
				{ count: 1, text: "Монтажник" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Агроном-семеновод" },
				{ count: 1, text: "Председатель колхоза" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Закройщик-модельер" },
				{ count: 1, text: "Декоратор" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Археолог" },
				{ count: 1, text: "Адвокат" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Работник музея" },
				{ count: 1, text: "Консультант" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Учёный" },
				{ count: 1, text: "Актёр" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Логопед" },
				{ count: 1, text: "Стенографист" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Врач" },
				{ count: 1, text: "Дипломат" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Главный бухгалтер" },
				{ count: 1, text: "Директор" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Поэт" },
				{ count: 1, text: "Психолог" }
			]
		},
		{ 
			text: "Выберите между двумя профессиями более интереснуб на Ваш взгляд:",
			answers: [
				{ count: 0, text: "Архивариус" },
				{ count: 1, text: "Скульптор" }
			]
		}
	],
	questLength = questions.length - 1,
	i = 0;

	window.ee = new EventEmitter();
		
	var Question = React.createClass({
		getInitialState: function() {
			return {
				question: this.props.data[i]
			};
		},

		componentDidMount: function() {
	    var self = this;

	    window.ee.addListener('Next', function(i) {
	      self.setState({question: questions[i]});
	    });
	  },

	  componentWillUnmount: function() {
	    window.ee.removeListener('Next');
	  },

		render: function() {
			return (
				<div>
					<p className="kn-your-text-quest">{this.state.question.text}</p>
					<Answers data={questions}/>
					<NextQuestBtn/>
				</div>
			);
		}
	});

	var Answers = React.createClass({
		getInitialState() {
	    return {
	      answer: this.props.data[i].answers 
	    };
		},

		componentDidMount: function() {
	    var self = this;

	    window.ee.addListener('Next', function(i) {
	      self.setState({answer: self.props.data[i].answers});
	    });
	  },

	  componentWillUnmount: function() {
	    window.ee.removeListener('Next');
	  },

	  handlerChange: function(e) {
	  	var 
	  		count = parseInt(e.target.getAttribute('data-count')),
	  		arr = [];

	  	if (count > 0) {
	  		arr[1] = 1;
	  		arr[0] = 0;
	  	} else {
	  		arr[0] = 1;
	  		arr[1] = 0;
	  	}

	  	window.ee.emit('NextQuestBtn.addElem', arr, i);
	  },

		render: function() {
			var self = this;
			var answersNode = this.state.answer.map(function(item){
				return (
					<label className='kn-your-f-radio'>
	          <input 
	          	type='radio' 
	          	data-count={item.count}
	          	className='kn-your-f-r-btn' 
	          	defaultChecked={false} 
	          	ref='answer'  
	          	name="answer"
	          	value={item.count}
	          	onChange={self.handlerChange}
	          />
	        	<span className="kn-your-f-r-spn">{item.text}</span>
	        </label>
				);
			});

			$('.kn-your-f-r-btn').attr('checked', false);
			
			return (
				<form action="#">
					{answersNode}
				</form>
			);
		}
	});

	var NextQuestBtn = React.createClass({
		getInitialState: function() {
	    return {
	      answNumArray: []    
	    };
		},

		componentDidMount: function() {
	    var self = this;

	    window.ee.addListener('NextQuestBtn.addElem', function(count, i) {
	    	var 
	    		answNumArray = self.state.answNumArray,
	    		arr = [];

	    	answNumArray[i] = count;
	      self.setState({answNumArray: answNumArray});

	      for (var i = 0; i < answNumArray.length; i++) {
	      	for (var j = 0; j < answNumArray[i].length; j++) {
	      		arr.push(answNumArray[i][j]);
	      	}
	      }

	      if ((arr.length)/2 == questLength) {
	      	var answer = printRes(arr);
	      	$('#questions').html(answer);
	      	$.ajax({
	      		url: "../engine/setTestValue.php",
	      		type: "post",
	      		data: {
	      			"value": answer
	      		}
	      	});
	      }
	      console.log(arr, questLength);
	    });
	  },

	  componentWillUnmount: function() {
	    window.ee.removeListener('NextQuestBtn.addElem');
	  },

		nextQuestion: function() {
			if (i == questLength) {
				return false;
			} 

			i++;
			window.ee.emit('Next', i);
		},

		render: function() {
			return (
				<button
					className="btn kn-your-btn kn-your-btm-answer"
					onClick={this.nextQuestion}
				>
				Отправить
				</button>
			)
		}
	});

	ReactDOM.render(
	  <Question data={questions}/>,
	  document.getElementById('questions')
	);

	function printRes(arr) {
		var summ = arr.reduce(function(a, b) {
		  return a + b;
		});

		if ( (summ > 20) && (summ <= 30) ) {
			return "Реалистический тип (Механик, эллектрик, инженер, шофёр)";
		} else if ( (summ > 30) && (summ <= 40) ) {
			return "Интеллектуальный тип (Учёный, программист, преподаватель)";
		} else if ( (summ > 40) && (summ <= 50) ) {
			return "Социальный тип (Уреподаватель, мед.работник, соц. работник)";
		} else if ( (summ > 50) && (summ <= 60) ) {
			return "Конвенциальный тип (Бухгалтер, программист)";
		} else if ( (summ > 60) && (summ <= 70) ) {
			return "Предприимчивый тип тип (Предприниматель, директор, журналист)";
		} else if ( (summ > 70) && (summ <= 80) ) {
			return "Артистичный тип (Актёр, художник, фотограф)";
		} else {
			return "Предприимчивый тип (Предприниматель, директор, журналист)";
		}

		return summ;
	}
})();