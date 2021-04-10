<?php

/**
 * @param string|null $param
 * @return string
 */
function site(string $param = null): string
{
    if ($param && !empty(SITE[$param])) {
        return SITE[$param];
    }
    return SITE["root"];
}

/**
 * @param string $path
 * @param bool $time
 * @return string
 */
function asset(string $path, $time = true): string
{
    $file = SITE['root'] . "/views/assets/{$path}";
    $fileOnDir = dirname(__DIR__, 1) . "/views/assets/{$path}";
    if ($time && file_exists($fileOnDir)) {
        $file .= "?time=" . filemtime($fileOnDir);
    }
    return $file;
}

/**
 * @param string|null $type
 * @param string $message
 * @return string|null
 */
function flash(string $type = null, string $message = null): ?string
{
    if ($type && $message) {
        $_SESSION['flash'] = [
            "type" => $type,
            "message" => $message
        ];
        return null;
    }
    if (!empty($_SESSION['flash']) && $flash = $_SESSION['flash']) {
        unset($_SESSION['flash']);
        return "<div class=\"message {$flash["type"]}\">{$flash["message"]}</div>";
    }
    return null;
}

function paginate($pages)
{
    $html = '<ul class="pagination d-flex justify-content-center">';
    $i = 0;
    foreach ($pages as $p) :
        $active = ($i == 0 && !isset($_GET['page']) || @$_GET['page'] == $p['text']) ? 'active' : '';
        $html .= '<li class="page-item ' . $active . '">
            <a class="page-link" href="' . $p['href'] . '">' . $p['text'] . ' 
            </a></li>';
    $i++;
    endforeach;
    $html .= '</ul>';
    return $html;
}
