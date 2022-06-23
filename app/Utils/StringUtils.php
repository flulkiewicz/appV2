<?php

namespace App\Utils;

class StringUtils
{
    /**
     * @param string $value
     * @return string
     */
    public function uppercase(string $value): string {
        return strtoupper($value);
    }
}
