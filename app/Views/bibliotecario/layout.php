<?php
declare(strict_types=1);

use App\Core\View;

/** @var string $content */
/** @var string $titulo */
/** @var string $seccion */
/** @var array<string, mixed> $usuario */
/** @var string $csrf */
/** @var list<array{type: string, message: string}> $mensajes */

$menuLateral = [
    'libros' => ['Libros', '/bibliotecario/libros'],
    'reservas' => ['Reservas', '/bibliotecario/reservas'],
    'prestamos' => ['Préstamos', '/bibliotecario/prestamos'],
    'multas' => ['Multas', '/bibliotecario/multas'],
];
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#702459">
    <title><?= View::e($titulo) ?> | Bibliotecario BiblioTech</title>
    <link rel="stylesheet" href="<?= View::url('/assets/css/bibliotecario.css') ?>">
</head>
<body class="librarian">
<?php require __DIR__ . '/_header.php'; ?>

<div class="librarian-layout">
    <aside class="librarian-sidebar" aria-label="Panel biblioteca">
        <h2>Panel biblioteca</h2>
        <nav>
            <?php foreach ($menuLateral as $clave => [$etiqueta, $ruta]): ?>
                <a href="<?= View::url($ruta) ?>"<?= $seccion === $clave ? ' class="active" aria-current="page"' : '' ?>><?= View::e($etiqueta) ?></a>
            <?php endforeach; ?>
        </nav>
    </aside>

    <main class="librarian-main">
        <?php foreach ($mensajes as $mensaje): ?>
            <p class="librarian-alert <?= $mensaje['type'] === 'success' ? 'alert-success' : 'alert-error' ?>"
               role="<?= $mensaje['type'] === 'success' ? 'status' : 'alert' ?>"><?= View::e($mensaje['message']) ?></p>
        <?php endforeach; ?>
        <?= $content ?>
    </main>
</div>
</body>
</html>
