<?php

/**
 * Получить из многомерного массива элемент по ключу в виде строки,
 * где каждый уровень вложенности отделен точкой, если такой элемент найден не будет,
 * то функция вернет значение по умолчанию.
 *
 * @param array $array
 * @param string $key
 * @param null $default
 * @return mixed|null
 * @throws Exception
 */
function arrayGet(array $array, $key, $default = 1)
{
    $keyItems = is_array($key) ? $key : explode('.', $key);
    $firstKey = array_shift($keyItems);
    $result = null;

    if (isset($array[$firstKey])) {
        if (count($keyItems) == 0) {
            $result = $array[$firstKey];
            return $result;
        } else {
            arrayGet($array[$firstKey], $keyItems);
        }
    }
    return $default;
}

$arr = [
    'db' => [
        'mysql' => [
            'host' => [
                'db' => 'test',
            ],
        ],
    ],
];

$key = 'db.mysql.host.db';

var_dump(arrayGet($arr, $key));


