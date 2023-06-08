<?php
function text_limit($str, $limit, $endText)
{
    if (strlen($str) > $limit) {
        return substr($str, 0, $limit) . $endText;
    }
    return $str;
}

function prettyPrint($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}
