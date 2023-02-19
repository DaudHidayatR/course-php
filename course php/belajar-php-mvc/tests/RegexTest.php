<?php

namespace Daudhidayatramadhan\BelajarPhpMvc\tests;

use PHPUnit\Framework\TestCase;

class RegexTest extends TestCase
{
    public function  testRegex()
    {
        $path = "/products/12345/categories/abcde";

        $pattern = "#^/products/([0-9a-zA-z]*)/categories/([0-9a-zA-z]*)$#";

        $result = preg_match($pattern, $path, $variables);
        self::assertEquals(1, $result);
        var_dump($variables);

        array_shift($variables);
        var_dump($variables);
    }
}