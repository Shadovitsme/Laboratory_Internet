import './bootstrap';

const api_pref = '/api/v1/';

// Создание пользователя;
$('.registrate').on('click', () => {
    if (($('.loginAdd').val() === '') || ($('.passwordAdd').val() === '')){
        alert('Не все поля заполнены');
    }
    else{
    $.ajax(
        {
            url: api_pref + 'users',         /* Куда пойдет запрос */
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
    if (($('.loginUpdate').val() == '' && $('.passwordUpdate').val() == '') || $('.idUpdate').val() === ''){
        alert('Не все поля заполнены');
    }
    else{
        $.ajax(
            {
                url: api_pref + `users/${$('.idUpdate').val()}}`,         /* Куда пойдет запрос */
                method: 'post',             /* Метод передачи (post или get) */
                dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
                data: {
                    'login': $('.loginUpdate').val(),
                    'password' : $('.passwordUpdate').val(),
                },   /* Параметры передаваемые в запросе. */
                success: function(data){ 
                    alert('success')  /* функция которая будет выполнена после успешного запроса.  */
                }
            }
        )
    }
})
// Удаление пользователя;
$('.delete').on('click', () => {
    if ($('.idUpdate').val() === '' ){
        alert('Не все поля заполнены');
    }
    else{
        $.ajax(
            {
                url: api_pref + `user/${$('.idUpdate').val()}`,         /* Куда пойдет запрос */
                method: 'post',             /* Метод передачи (post или get) */
                dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
                success: function(data){ 
                    alert('deleted: ', data)  /* функция которая будет выполнена после успешного запроса.  */
                }
            }
        )
    }
})
// Авторизация пользователя;
// Получить информацию о пользователе.