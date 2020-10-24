<?php
function obfuscate(string $email) {
    $always_encode = ['.', ':', '@'];
    $percent_of_encoding = 25;
    $result = '';

    for ($i = 0; $i < strlen($email); $i++) {
        if (in_array($email[$i], $always_encode) || mt_rand(1, 100) < $percent_of_encoding) {
            $result .= '&#';
            $result .= mt_rand(0, 1) ? ord($email[$i]) : 'x' . dechex(ord($email[$i]));
            $result .= ';';
        } else {
            $result .= $email[$i];
        }
    }

    return $result;
}
