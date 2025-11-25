<?php

declare(strict_types=1);

namespace App\Services;

final class CvContentService
{
    private array $config;

    public function __construct()
    {
        $this->config = config('cv', []);
    }

    public function hero(): array
    {
        return $this->config['hero'] ?? [];
    }

    public function about(): array
    {
        return $this->config['about'] ?? [];
    }

    public function projects(?int $limit = null): array
    {
        $projects = $this->config['projects'] ?? [];

        if ($limit === null) {
            return $projects;
        }

        return array_slice($projects, 0, $limit);
    }

    public function experiences(): array
    {
        return $this->config['experiences'] ?? [];
    }

    public function education(): array
    {
        return $this->config['education'] ?? [];
    }

    public function skills(): array
    {
        return $this->config['skills'] ?? [];
    }

    public function languages(): array
    {
        return $this->config['languages'] ?? [];
    }

    public function resume(): array
    {
        return $this->config['resume'] ?? [];
    }

    public function contact(): array
    {
        return $this->config['contact'] ?? [];
    }

    public function socials(): array
    {
        return $this->config['socials'] ?? [];
    }
}

