<?php

declare(strict_types=1);

namespace App\Core;

final class Paginator
{
    public int $page;
    public int $pages;
    public int $offset;
    public int $total;
    public int $perPage;

    public function __construct(int $total, int $perPage = 10, $requestedPage = 1)
    {
        $this->total = $total;
        $this->perPage = $perPage;
        $this->pages = max(1, (int) ceil($total / $perPage));
        $this->page = min(max(1, (int) $requestedPage), $this->pages);
        $this->offset = ($this->page - 1) * $perPage;
    }
}
