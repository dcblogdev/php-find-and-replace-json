<?php

use Dcblogdev\FindAndReplaceJson\FindAndReplaceJson;
use PHPUnit\Framework\TestCase;

class FindAndReplaceJsonTest extends TestCase
{

    public function testReplaceWithJsonPayload()
    {
        $payload = json_encode(
            [
                'name' => 'Joe Bloggs',
                'age' => 23,
                'location' => 'London',
            ]
        );

        $replaces = [
            'age' => 45,
            'location' => "Manchester",
        ];

        $expected = json_encode(
            [
                'name' => 'Joe Bloggs',
                'age' => 45,
                'location' => "Manchester",
            ]
        );

        self::assertSame($expected, (new FindAndReplaceJson())->replace($payload, $replaces));
    }

    public function testReplaceWithArrayPayload()
    {
        $payload = [
            'name' => 'Joe Bloggs',
            'age' => 23,
            'location' => 'London',
        ];

        $replaces = [
            'age' => 45,
            'location' => "Manchester",
        ];

        $expected = [
            'name' => 'Joe Bloggs',
            'age' => 45,
            'location' => "Manchester",
        ];

        self::assertSame($expected, (new FindAndReplaceJson())->replace($payload, $replaces, false));
    }
}

