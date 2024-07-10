'use strict';
document.addEventListener("DOMContentLoaded", function () {
    const regExpEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const thanksMsg = document.querySelector('.feedback-msg');

    // const test = document.querySelector('.test');
    // console.log(test, new FormData(test));

    /**
     * Объект с правилами валидации и сообщениями об ошибках для каждого поля формы
     * @type {Object}
     * @function validate: функция для проверки корректности значения.
     * messages: объект с сообщениями об ошибках (required и invalid).
     */
    const validationRules = {
        name: {
            validate: (value) => value.length > 0,
            messages: {
                required: "Имя не может быть пустым",
                // invalid: "Ошибка в имени"
            }
        },
        email: {
            validate: (value) => regExpEmail.test(value),
            messages: {
                required: "Email не может быть пустым",
                invalid: "Некорректный email"
            }
        },
        message: {
            validate: (value) => value.length <= 10,
            messages: {
                invalid: "Длина сообщения не может превышать 10 символов"
            }
        }
    };

    document.querySelector('.feedback-form__submit').addEventListener('click', function (e) {
        e.preventDefault();
        checkForm();
    });

    /**
     * Проверяет форму и отображает ошибки или сообщение об успешной отправке
     */
    function checkForm() {
        const formFields = [{
                name: 'name',
                element: document.querySelector('.feedback-form__name')
            },
            {
                name: 'email',
                element: document.querySelector('.feedback-form__email')
            },
            {
                name: 'message',
                element: document.querySelector('.feedback-form__text')
            }
        ];

        let formIsValid = true;

        formFields.forEach(field => {
            // Правила валидации для текущего поля
            const rule = validationRules[field.name];
            // Проверяем значение поля по правилам валидации
            const isValid = rule.validate(field.element.value.trim());
            // Обрабатываем валидацию для текущего поля
            handleValidation(field.element, rule, isValid);

            //проверка на всю форму
            if (!isValid) {
                formIsValid = false;
            }
        });

        if (formIsValid) {
            thanksMsg.classList.remove('not-visible');


             //Отправка данных на сервер
    const form = document.querySelector('form');
    console.log(form, new FormData(form));
    fetch('form.php', {
    method: 'POST',
    body: new FormData(form),
    });

    
            document.querySelector('.feedback-form').remove();


   
    
        }
    }

    /**
     * Обрабатывает валидацию поля формы, добавляет или удаляет ошибки
     * @param {HTMLElement} element - Элемент формы
     * @param {Object} rule - Правила валидации для элемента
     * @param {boolean} isValid - Флаг валидности элемента
     */
    function handleValidation(element, rule, isValid) {
        const value = element.value.trim();
        const parent = element.parentElement;

        // Удаляем предыдущие сообщения об ошибках
        const existingErrorMessages = parent.querySelectorAll('.error-msg');
        existingErrorMessages.forEach(msg => msg.remove());

        // Проверяем, если значение поля пустое и есть сообщение required
        if (value.length < 1 && rule.messages.required) {
            addErrorMessage(parent, rule.messages.required);
            element.classList.add('error');
        }
        // Проверяем, если значение поля не пустое, но не прошло валидацию
        else if (value.length > 0 && !isValid) {
            addErrorMessage(parent, rule.messages.invalid);
            element.classList.add('error');
        } 
        // Если поле прошло валидацию
        else {
            element.classList.remove('error');
        }
    }

    /**
     * Создает и добавляет элемент сообщения об ошибке к родителю
     * @param {HTMLElement} parent - Родительский элемент
     * @param {string} message - Сообщение об ошибке
     */
    function addErrorMessage(parent, message) {
        const errorMsg = document.createElement('p');
        errorMsg.className = 'error-msg';
        errorMsg.textContent = message;
        parent.appendChild(errorMsg);
    }




    
    // .then(response => response.json())
    // .then(data => console.log(data))
    // .catch(error => console.error(error));
    ////////////1 метод
    // const response = fetch("https://jsonplaceholder.typicode.com/todos/1")
    // .then((response) => {
    //   if (response.status !== 200) {
    //     throw new Error(`HTTP error! status: ${response.status}`);
    //   }
    //   return response.json();
    // })
    // .then((res) => {
    //   console.log(res);
    // })
    // .catch((error) => {
    //   console.error('Error:', error);
    // });
    // console.log(response);

    //2 метод
    // async function fetchData() {
    //     try {
    //       const response = await fetch("https://jsonplaceholder.typicode.com/todos/1");
    //       if (response.status !== 200) {
    //         throw new Error(`HTTP error! status: ${response.status}`);
    //       }
    //       const res = await response.json();
    //       console.log(res);
    //     } catch (error) {
    //       console.error('Error:', error);
    //     }
    //   }
      
    //   fetchData();



// console.log(postData());
// function getData(url = 'https://jsonplaceholder.typicode.com/todos/1') {
//     fetch(url, {
//         method: 'GET',
//         headers: {
//             'Content-Type': 'application/json',
//         }
    // }).then(function(res) {
    //     if(res.status!==200){
    //         console.log("ERROR");
    //         throw new Error();
    //     }else{
    //         console.log(res.text);
    //         return res.text();
    //     }
    // })
// }
// console.log(getData());


// 3 метод



// function test(){
//     return new Promise((resolve, rejects)=>{
//        setTimeout(() => {
//         resolve("Ура");
//        }, 1000);
//     }).then(function(res) {
//         console.log(res);
//     })
// };

// console.log(test());

});