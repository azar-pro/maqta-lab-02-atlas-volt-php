<?php
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function text_length(string $value): int
{
    return function_exists('mb_strlen') ? mb_strlen($value, 'UTF-8') : strlen($value);
}

function active_nav(string $page, string $currentPage): string
{
    return $page === $currentPage ? ' active' : '';
}

function find_project(array $projects, string $slug): ?array
{
    foreach ($projects as $project) {
        if (($project['slug'] ?? '') === $slug) {
            return $project;
        }
    }

    return null;
}
