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
function arrayGet(array $array, string $key, $default = null)
{
    $keyItems = is_array($key) ? $key : explode('.', $key);
    if (!count($keyItems))
    {
        throw new Exception('Invalid key "' . $key . '"');
    }

    $lastKey = $keyItems[array_key_last($keyItems)];
    foreach ($array as $k => $v) {
        if (isset($v[$lastKey])){
            return $v[$lastKey];
        } else {
            return arrayGet($v, $lastKey);
        }
    }
    return $default;
}
