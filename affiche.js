// Объявляем переменную `page` и устанавливаем ее значение в 0.
// Эта переменная будет отслеживать текущую страницу комментариев.
let page = 0;

// Объявляем функцию `affiche()`, которая будет вызываться при нажатии кнопки "Показать еще комментарии".
function affiche() {
    // Создаем новый экземпляр объекта XMLHttpRequest, который позволяет делать HTTP-запросы без перезагрузки страницы.
    let xhr = new XMLHttpRequest();

    // Настраиваем обработчик события `onreadystatechange`, который будет вызываться при каждом изменении состояния запроса.
    // Мы хотим реагировать только на состояние 4 (запрос завершен).
    xhr.onreadystatechange = function() {
        // Проверяем, что статус запроса 200 (успешно).
        if (this.readyState === 4 && this.status === 200) {
            // Если текст ответа 'No more comments', выводим сообщение об этом.
            // Иначе добавляем текст ответа в элемент `main_section` и увеличиваем `page` на 1.
            if (this.responseText === 'No more comments') {
                alert('No more comments');
            } else {
                document.getElementById("main_section").innerHTML += this.responseText;
                document.getElementById("main_section").style.display="block";
                page++;
            }
        }
    };

    // Инициализируем новый запрос с методом HTTP `GET`, URL `load.php?page=` с текущим номером страницы и асинхронным режимом.
    xhr.open("GET", "load.php?page=" + page, true);

    // Отправляем запрос.
    xhr.send();
}


/*


*/

/*
для обычного отображения всех комментариев
function affiche() {
    let done = document.getElementById('plus_comments');
    if (done) {
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("main_section").innerHTML = this.responseText;
                document.getElementById("main_section").style.display="block";
            }
        };
        xhr.open("GET", "load.php", true);
        xhr.send();
    }
}
*/
