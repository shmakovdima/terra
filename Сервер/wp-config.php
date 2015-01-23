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
define('DB_NAME', 'a6980670_terra');

/** Имя пользователя MySQL */
define('DB_USER', 'a6980670_terra');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'as210100');

/** Имя сервера MySQL */
define('DB_HOST', 'mysql7.000webhost.com');

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
define('AUTH_KEY',         'HAI;k`xnoZQ*QgD?SrXr-+Y}[Cw6r*RTq:TuFf.9Lz+8xd28NE MC>T-Yo;<R~]>');
define('SECURE_AUTH_KEY',  'v7#t,I(1TfZE[L% a$*u-!cW@[9Z-0,a2UL+8KV!]n-QF7:+WOZ3E#4xl9EGR,OJ');
define('LOGGED_IN_KEY',    '!M90Jh_@KiJZn8}*76(Hxg%zbmQfS{%mdFGx]-18RP0$t5;(A.VH.(vX#%i=w.q&');
define('NONCE_KEY',        '~FEm3;gH!SH<qz/<Ef3|$48d7~8~g8oe](`+/mu(:t%:im0 #y#lBH^]k(D+J7o7');
define('AUTH_SALT',        ']W$|%M`U3{{F%~z|WjvS-3XW:SdQ]?S;y{@a(AC/8D^YwqfJu$HE(qTAa=| D]-r');
define('SECURE_AUTH_SALT', 'Ty5.VXb?,A NgPel4.~q+]$0O-q0RWeENh#I-ngB65s-cVG9zF]wWI/HqMIUw28:');
define('LOGGED_IN_SALT',   'bQ#x@tQS8lDye0~+cOY|gp0|FE)s4uLxpy/ksK~|l-=:6>w3|Spxz1M*&p~}Alb<');
define('NONCE_SALT',       'Cz3FvK&Gg-dbn$w-9i}T&LmwbM2-e8!)p;W.Qc}`i|+$BcqYW2~E{HQ-_RlI[By+');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'ru_';

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
