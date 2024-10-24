
// Создание пользователя;
$('#registrate').on('click', () => {
    if ($('.login').val() === '' || $('.password').val() === ''){
        alert('Не все поля заполнены');
    }
    else{
    $.ajax(
        {
            url: 'act.php',         /* Куда пойдет запрос */
            method: 'post',             /* Метод передачи (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: { 'login': $('.login').val(),
                'password' : $('.password').val(),
                'function' : 'registrate'

            },   /* Параметры передаваемые в запросе. */
            success: function(data){ 
                alert('success')  /* функция которая будет выполнена после успешного запроса.  */
            }
        }
    )
    }
}
)
// }});
// Обновление информации пользователя;
// Удаление ользователя;
// Авторизация пользователя;
// Получить информацию о пользователе.