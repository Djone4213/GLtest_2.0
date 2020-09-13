<p>Выполнить команду: git clone https://github.com/Djone4213/GlTest.git</p>
<p>Выполнить команду: composer install (php ../composer.phar install)</p>
<p>Скопировать файл ".env.example" в папку проекта с именем ".env"</p>
<p>Выполнить команду: "php artisan key:generate"</p>
<p>Создать mysql базу с любым именем: "GlTest" (кодировка utf8_general_ci)</p>
<p>Выполнить настройку параметров в файле ".env":
    <ul>
		<li>DB_CONNECTION=mysql</li>
		<li>DB_HOST=хостСервераСУБД</li>
		<li>DB_PORT=портСервераСУБД</li>
		<li>DB_DATABASE=имяСозданнойБд</li>
		<li>DB_USERNAME=имяПользователя</li>
		<li>DB_PASSWORD=парольПОльзователя</li>
    </ul>
Сохранить файл ".env"</p>
<p>Выполнить команду: "php artisan migrate"</p>
<p>Выполнить команду: php artisan serve</p>
<p>Открыть в браузере ссылку (http://localhost:8000) !!!ссылка может отличаться, при выполнении команды php artisan serve генерируется ссылка для браузера</p>
