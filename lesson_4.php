<? $title = 'Суперглобальные переменные';
	include 'functions.php';
	include 'header.php';
		debug($test);
?>
    <header><?= $title; ?></header>
    <div class="container">
        <h2> Встроенные переменные, которые всегда доступны во всех областях, что означает, что они доступны в любом
            месте скрипта</h2>
        <h3>Ссылка на доки <a href="https://www.php.net/manual/ru/language.variables.superglobals.php">php.net</a>
            , где можно почитать подробнее
        </h3>


        <ol>
            <li><b>$GLOBALS</b> — Ссылки на все переменные глобальной области видимости.
                <p>$GLOBALS содержит в себе все нижеописаные супергдобальные массивы</p>
                <p> Ассоциативный массив (array), содержащий ссылки на все переменные, определённые в данный момент в
                    глобальной области видимости скрипта.</p>
                <p>Имена переменных являются ключами массива.
                    Это значит, что в эту переменную можно сохранить нужную информацию, например данные пользователя
                    <b>$GLOBALS['user]=[тут какие то данные]</b> и они будут видны на всех страницах сайта.
                </p>
            </li>
            <li>
                <b>$_SERVER</b> — Информация о сервере и среде исполнения.
                <p>Переменная $_SERVER - это массив (array), содержащий такую информацию, как заголовки, пути и
                    местоположения
                    скриптов. Записи в этом массиве создаются веб-сервером, поэтому нет гарантии, что каждый веб-сервер
                    будет
                    предоставлять любую из этих переменных; серверы могут опускать некоторые из них или предоставлять
                    другие, не
                    указанные здесь. Однако большинство из этих переменных учтены в спецификации » CGI/1.1 и, скорее
                    всего,
                    будут определены.
                    <a href="https://www.php.net/manual/ru/reserved.variables.server.php">Информация по элементам
                        массива</a>
                </p></li>
            <li>
                <b> $_GET</b> — Переменные HTTP GET/Ассоциативный массив переменных, переданных скрипту через параметры
                URL
                (известные также как строка запроса). Обратите внимание, что массив не только заполняется для
                GET-запросов,
                а скорее для всех запросов со строкой запроса.
                Пример GET запроса: https://yandex.ru/search/?text=php&lr=142(все что после знака вопроса
                <b>?text=php&lr=142</b> является GET параметрами и будет доступно в масиве $_GET : <b>$_GET['text],$_GET['lr]</b>)
            </li>
            <li>
                <b> $_POST</b> — Переменные HTTP POST. Ассоциативный массив данных, переданных скрипту через HTTP
                методом
                POST.
                Работает также как и $_GET, за исключением того ,ч то в урле ничего не будет https://yandex.ru/search/
            </li>
            <li><b>ВАЖНО!!! GET для безопасных действий, POST для опасных</b>
                <h4>GET</h4>
                <ol>
                    <li>Используйте GET для получения данных (форма поиска, вывод какого-либо контента без
                        каких-либо изменений на сервере)
                    </li>
                    <li>Фильтры в интернет-магазинах</li>
                    <li>Передача параметров через ссылку</li>
                    <li>Другие безопасные запросы</li>
                </ol>
                <h4>POST</h4>
                <ol>
                    <li> используйте для отправки запроса, изменяющего данные на сервере,
                        также для сокрытия отправляемых данных и для отправки больших объёмов. Только при использовании
                        POST
                        всегда
                        делайте редирект после его обработки.
                    </li>
                    <li>Любые формы с паролями или банковскими картами</li>
                    <li>Формы заявок с персональными данными</li>
                    <li>Отправка файлов</li>
                </ol>
            </li>

            <li><b>$_COOKIE</b> — HTTP Cookies.Ассоциативный массив (array) значений, переданных скрипту через HTTP
                Cookies.
                <p>Куки (cookie) – это файлы с информацией, полученной при посещении веб-ресурса. Информация хранится на
                    жестком диске вашего компьютера, а в ней отображаются ваши предпочтения, наиболее часто посещаемые
                    тематики,
                    логины и пароли. Каждый раз, когда вы посещаете сайт, который использует куки, то устройство
                    отправляет
                    эти
                    данные на сервер для того, чтобы правильно опознать вас среди других пользователей. Куки бывают
                    временными и
                    постоянными.</p>
            </li>

            <li><b>$_REQUEST</b> — Переменные HTTP-запроса.Ассоциативный массив (array), который по умолчанию содержит
                данные переменных $_GET, $_POST и $_COOKIE.
                Используй, если не знаешь каким методом к тебе приходит информация на сервер
            </li>
            <li><b>$_FILES</b> — Переменные файлов, загруженных по HTTP.Ассоциативный массив (array) элементов,
                загруженных
                в текущий скрипт через метод HTTP POST.Структура этого массива описана в разделе
                <a href="https://www.php.net/manual/ru/features.file-upload.post-method.php">Загрузка файлов методом
                    POST. </a>
            </li>

            <li>
                <b>$_SESSION</b> — Переменные сессии.Ассоциативный массив, содержащий переменные сессии, которые
                доступны
                для текущего скрипта. Смотрите <a href="https://www.php.net/manual/ru/ref.session.php">документацию по
                    функциям сессии</a> для получения дополнительной информации.
                <p> Сессия - это механизм PHP, который позволяет хранить данные для конкретного пользователя между
                    запусками
                    скрипта.</p>
                <p>Мы можем записывать какую-либо информацию в сессию и считывать ее оттуда в следующем запуске этого
                    или
                    другого скрипта сайта.
                </p>
                <p> С помощью сессии можно реализовать авторизацию пользователей, корзину интернет-магазина и другое.
                </p></li>

            <li><b>$_ENV</b> — Переменные окружения.Ассоциативный массив (array) значений, переданных скрипту через
                переменные окружения.
            </li>
        </ol>
        <h3>Это переменная $GLOBALS</h3>
		<?

            $a=145;
            if($_POST['name']){
                if($_REQUEST['name']==$a){
                    echo 'Ты супер';
                }
            }
            global $test;
            debug($GLOBALS); ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="name"><br>
            <input type="text" name="surname"><br>
            <input type="number" name="age"><br>
            <input type="file" name="upload[]" multiple><br>
            <input type="submit" value="отправить">
        </form>
    </div>
<? include 'footer.php' ?>