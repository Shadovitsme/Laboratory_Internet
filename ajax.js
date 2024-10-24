
// Создание пользователя;
$('.registrate').on('click', () => {
    if (($('#userAdd').children('.login')).val() === '' && ($('#userAdd').children('.password')).val() === ''){
        alert('Не все поля заполнены');
    }
    else{
    $.ajax(
        {
            url: 'act.php',         /* Куда пойдет запрос */
            method: 'post',             /* Метод передачи (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: { 'login': $('.loginAdd').val(),
                'password' : $('.passwordAdd').val(),
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

// Обновление информации пользователя;
$('.update').on('click', () => {
    if (($('.loginUpdate').val() === '' || $('.passwordUpdate').val() === '') && $('.idUpdate').val() === ''){
        alert('Не все поля заполнены');
    }
    else{
        $.ajax(
            {
                url: 'act.php',         /* Куда пойдет запрос */
                method: 'post',             /* Метод передачи (post или get) */
                dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
                data: { 'id' : $('.idUpdate').val(),
                    'login': $('.loginUpdate').val(),
                    'password' : $('.passwordUpdate').val(),
                    'function' : 'update'
    
                },   /* Параметры передаваемые в запросе. */
                success: function(data){ 
                    alert(data)  /* функция которая будет выполнена после успешного запроса.  */
                }
            }
        )
    }
})
// Удаление пользователя;
// Авторизация пользователя;
// Получить информацию о пользователе.