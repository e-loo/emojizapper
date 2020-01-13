<?php

require_once 'vendor/autoload.php';

$filename = 'full-emoji-list.html';
if (!file_exists($filename)) {
    file_put_contents($filename, file_get_contents('https://unicode.org/emoji/charts/full-emoji-list.html'));
}

$elements = qp(file_get_contents($filename), 'td.code a');

$codes = [];

foreach ($elements as $element) {
    $parts = explode(' ', $element->text());

    $parts = array_map(static function ($code) {
        $matches = [];

        preg_match('/U\+(.*)/', $code, $matches);

        if (!isset($matches[1]) || $matches[1] === '') {
            return null;
        }

        return sprintf('\x{%s}', $matches[1]);
    }, $parts);

    $code = implode('', $parts);

    $codes[] = $code;
}

echo sprintf('/(%s)/u', implode('|', $codes));
