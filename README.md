<p align="center">
    <h1 align="center">Тестовое задание</h1>
    <br>
</p>

Чтобы сформировать файл автозагрузки, выполните команду

~~~
composer install
~~~

Функционал позволяет скачивать страницы по URL введенному в поле input.

Мысли о расширении:
<p>1). Регулярные выражения могут иметь погрешность. На текущем этапе добавлены методы проверки 
контента и результата (в классе PregMathParser). Для устранения этих погрешностей, можно или уточнить все
HTML теги (что не является оптималным решением) или проверять результат и при неверном ответе - удалять
лишние "теги".</p>
<p>2). Можно сделать сохранение загруженных страниц в файлы (это позволит при разборе сравнивать исходный контент)
с полученным результатом.</p>
<p>3). Если делать более сложный загрузчик (банально с авторизацией и тд) то конфиг удобнее сделать через Билдер.</p>

