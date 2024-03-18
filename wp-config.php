<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', '585-22_74640' );

/** Имя пользователя базы данных */
define( 'DB_USER', '585-22_74640' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '9e66d9132eb50730a83e' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'J27c6Dz5j g??)o{.9g|Wzh-$$s,=u/;Tyw}[$6,/L5bo=ZvI*d%89 [ }j]J7/=' );
define( 'SECURE_AUTH_KEY',  '}0&>JSF/p#hv9WC+ha}9DPRv~vHMsqvo^AnEt[U5N!4VqA[]XtsAA_:CfB4`*E,X' );
define( 'LOGGED_IN_KEY',    '-u2W|RZo:+h/ pND$Wag9VO[A_GkN2.1WvS~-r9*gVs.%7k/K47F5kiTtrp@Q.mk' );
define( 'NONCE_KEY',        'z.)T9k)tAt&jJ%,N$0R+GlTj(TrX.p9Ei**pp) n#`Dk+ARq+i]|`NiR[AB,EnqQ' );
define( 'AUTH_SALT',        'dY0jb*3|o#*]z+7@:,~)zY:nSzap|cCq%g?[z@IfY)<G)6>0h@,o*#]EIpyKwm}4' );
define( 'SECURE_AUTH_SALT', '1vE@b|cEnF@_m|0PPalm9jf`)>>g@o=m;/-|PKuZIOH;SejH7YLj^MY@!+!9|&-g' );
define( 'LOGGED_IN_SALT',   'Wwy#h%isN0<`];lkV=}&_!x>f(#bn/1?.IeY3(;NYaca3akd@+)GUG4(g-:lRQl[' );
define( 'NONCE_SALT',       'P%1c>P yZIWe1l.|ve,o2{@qbezI+X`Fx=|/myPBxI>}LdkE([OmWvJ;zj5d1h*#' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'Djd8l_';


/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';