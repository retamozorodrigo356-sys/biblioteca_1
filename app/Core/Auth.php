<?php
declare(strict_types=1);

namespace App\Core;

final class Auth
{
    /** @return array<string, mixed>|null */
    public static function user(): ?array
    {
        $user = $_SESSION['user'] ?? null;

        return is_array($user) ? $user : null;
    }

    /**
     * Exige sesión iniciada y uno de los roles indicados.
     * Si no cumple, redirige (login si no hay sesión, /home si el rol no alcanza).
     *
     * @param list<string> $roles
     * @return array<string, mixed>
     */
    public static function requireRole(array $roles): array
    {
        $user = self::user();
        if ($user === null || !isset($user['rol'])) {
            self::redirect('/login');
        }

        if (!in_array((string) $user['rol'], $roles, true)) {
            self::redirect('/home');
        }

        return $user;
    }

    /** @return never|void Return type `never` requires PHP 8.1; this project runs on PHP 8.0. */
    public static function redirect(string $path): void
    {
        header('Location: ' . Url::to($path));
        exit;
    }
}
