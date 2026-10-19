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
    <title>Crear cuenta | BiblioTech</title>
    <link rel="stylesheet" href="<?= $escape(Url::to('/assets/css/app.css')) ?>">
</head>
<body>
<header class="site-header">
    <div class="header-inner">
        <a class="brand" href="<?= $escape(Url::to('/')) ?>">BiblioTech</a>
        <nav class="main-nav" aria-label="Navegación principal">
            <a class="nav-link" href="<?= $escape(Url::to('/')) ?>">Inicio</a>
            <a class="nav-link" href="<?= $escape(Url::to('/catalogo')) ?>">Catálogo</a>
            <a class="nav-link" href="<?= $escape(Url::to('/login')) ?>">Login</a>
            <a class="nav-link nav-cta active" href="<?= $escape(Url::to('/register')) ?>" aria-current="page">Registro</a>
        </nav>
    </div>
</header>

<div class="auth-shell">
    <div>
        <div class="notice-shell">
            <?php if (!empty($error)): ?>
                <p class="notice notice-error" role="alert"><?= $escape((string) $error) ?></p>
            <?php endif; ?>
        </div>

        <section class="auth-card" aria-labelledby="page-title">
            <a class="brand" href="<?= $escape(Url::to('/')) ?>">Biblio<span>Tech</span></a>
            <p class="eyebrow">Un mundo de lecturas te espera</p>
            <h1 id="page-title">Crear una cuenta</h1>
            <p class="muted">Regístrate para explorar el catálogo de BiblioTech.</p>

            <form action="<?= $escape(Url::to('/register')) ?>" method="post">
                <input type="hidden" name="_csrf_token" value="<?= $escape($csrfToken) ?>">
                <label for="nombre">Nombre completo</label>
                <input id="nombre" name="nombre" type="text" autocomplete="name" maxlength="120"
                       placeholder="Ingresa tu nombre completo"
                       value="<?= $escape((string) $nombre) ?>" required>

                <label for="email">Correo electrónico</label>
                <input id="email" name="email" type="email" autocomplete="email" maxlength="254"
                       placeholder="Ingresa tu correo electrónico"
                       value="<?= $escape((string) $email) ?>" required>

                <label for="password">Contraseña</label>
                <input id="password" name="password" type="password" autocomplete="new-password"
                       placeholder="Mínimo 8 caracteres" minlength="8" required>

                <label for="password_confirmation">Confirma tu contraseña</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                       autocomplete="new-password" placeholder="Repite tu contraseña" minlength="8" required>

                <p class="field-hint">Usa al menos 8 caracteres. Tu cuenta tendrá el rol de estudiante.</p>
                <button class="button" type="submit">Crear cuenta</button>
            </form>
            <p class="form-footer">¿Ya tienes cuenta? <a href="<?= $escape(Url::to('/login')) ?>">Inicia sesión</a></p>
        </section>
    </div>
</div>

<footer class="site-footer">
    <p>© <?= date('Y') ?> BiblioTech <span aria-hidden="true">—</span> Gestión de Bibliotecas</p>
    <span class="footer-note">Desarrollado sobre entorno LAMP</span>
</footer>
</body>
</html>
