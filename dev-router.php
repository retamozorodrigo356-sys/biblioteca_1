<?php
declare(strict_types=1);

// Router para `php -S` que replica las reglas de .htaccess:
// bloquea /app y /database, sirve archivos reales y enruta el resto a index.php.

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$uri = rawurldecode($uri);

// RewriteRule ^(app|database)/ - [F,L]
if (preg_match('#^/(app|database)(/|$)#', $uri)) {
    http_response_code(403);
    echo 'Forbidden';
    return true;
}

$file = __DIR__ . $uri;
if ($uri !== '/' && is_file($file)) {
    return false; // Deja que el servidor sirva css, js, img, etc.
}

// Con `php -S` SCRIPT_NAME es la URI pedida (p. ej. /bibliotecario/libros), lo que
// haría que index.php calculara un basePath erróneo. En Apache con .htaccess el
// front controller es index.php, así que replicamos ese valor aquí.
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['PHP_SELF'] = '/index.php';

require __DIR__ . '/index.php';
