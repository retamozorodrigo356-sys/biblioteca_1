<?php
declare(strict_types=1);

use App\Core\Url;

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#702459">
    <title>Iniciar sesión | BiblioTech</title>
    <link rel="stylesheet" href="<?= $escape(Url::to('/assets/css/app.css')) ?>">
</head>
<body>
<header class="site-header">
    <div class="header-inner">
        <a class="brand" href="<?= $escape(Url::to('/')) ?>">BiblioTech</a>
        <nav class="main-nav" aria-label="Navegación principal">
            <a class="nav-link" href="<?= $escape(Url::to('/')) ?>">Inicio</a>
            <a class="nav-link" href="<?= $escape(Url::to('/catalogo')) ?>">Catálogo</a>
            <a class="nav-link active" href="<?= $escape(Url::to('/login')) ?>" aria-current="page">Login</a>
            <a class="nav-link nav-cta" href="<?= $escape(Url::to('/register')) ?>">Registro</a>
        </nav>
    </div>
</header>

<div class="auth-shell">
    <div>
        <div class="notice-shell">
            <?php if (!empty($error)): ?>
                <p class="notice notice-error" role="alert"><?= $escape((string) $error) ?></p>
            <?php endif; ?>
            <?php if (!empty($success)): ?>
                <p class="notice notice-success" role="status"><?= $escape((string) $success) ?></p>
            <?php endif; ?>
        </div>

        <section class="auth-card" aria-labelledby="page-title">
            <a class="brand" href="<?= $escape(Url::to('/')) ?>">Biblio<span>Tech</span></a>
            <p class="eyebrow">Tu biblioteca, en un solo lugar</p>
            <h1 id="page-title">Bienvenido de nuevo</h1>
            <p class="muted">Ingresa tus datos para continuar.</p>

            <form action="<?= $escape(Url::to('/login')) ?>" method="post">
                <input type="hidden" name="_csrf_token" value="<?= $escape($csrfToken) ?>">
                <label for="email">Correo electrónico</label>
                <input id="email" name="email" type="email" autocomplete="email" maxlength="254"
                       placeholder="Ingresa tu correo electrónico"
                       value="<?= $escape((string) $email) ?>" required>

                <label for="password">Contraseña</label>
                <input id="password" name="password" type="password" autocomplete="current-password"
                       placeholder="Ingresa tu contraseña" required>

                <button class="button" type="submit">Ingresar</button>
            </form>
            <p class="form-footer">¿No tienes cuenta? <a href="<?= $escape(Url::to('/register')) ?>">Regístrate</a></p>
            <p class="form-footer">¿Solo quieres explorar? <a href="<?= $escape(Url::to('/catalogo')) ?>">Consulta el catálogo público</a></p>
        </section>
    </div>
</div>

<footer class="site-footer">
    <p>© <?= date('Y') ?> BiblioTech <span aria-hidden="true">—</span> Gestión de Bibliotecas</p>
    <span class="footer-note">Desarrollado sobre entorno LAMP</span>
</footer>
</body>
</html>
