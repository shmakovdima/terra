<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
ddefine('DB_NAME', 'fb7903js_terra');

/** Имя пользователя MySQL */
define('DB_USER', 'fb7903js_terra');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'as210100');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ZKq<-2G#]OhJ]D?f1<8H)7vWw9-|*&+e{WK+z;1zdi{|;_+aB7+j6[M,MP[9Oa6^');
define('SECURE_AUTH_KEY',  'MI)>>EY-ey6|0{9HB`,<WhgCt&#+/M6TqOh.D4M#AN>;4[{Sof[>~)I[FS=?1-a`');
define('LOGGED_IN_KEY',    'i:eES)SIH8sgbrbsDZO+*{5 mc=Yn|[>jBN+q1jWOna^qJR/t$|B*jNsl/{y,qWn');
define('NONCE_KEY',        '-73.e$+YwA.vR=@gH|tsD&)0V p>Bc-K*VHkOK},L;|!8)}S7 wE06/]Z+,<;M&H');
define('AUTH_SALT',        'x!^G:N_0i[Sje,BD{m>~r`LKYX](~|!xMvpjU}:+rRg CfkO-P`T?BblI+B{7Dsb');
define('SECURE_AUTH_SALT', 'M:]K$P={%+)@60HIgPtQ]K@jriis%auTa/E^NBAb+H-w#/t8|3ckyCu)|KJ+I)p ');
define('LOGGED_IN_SALT',   '>ql|:}Iro8_m;k_~v)cBd1dy<as8RM 9uLo+g|zd-gGmS=,+qV$7SI;m3AX*c#|/');
define('NONCE_SALT',       'X?#]xn1^;ip#].tX+0e;&s-~Qg+E>43v0y1h(HK6TOersN0Z-guX}${J361oA#Bi');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'en_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');

?>
