<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

final class HelpersTest extends TestCase
{
    //test array_dot helpers function
    public function testArrayDot1()
    {
        $this->assertTrue(true);
    }

    //test array_dot_get helpers function
    public function testArrayDotGet1()
    {
        $this->assertEquals(array_dot_get(), null);
    }

    //test array_dot_get helpers function
    public function testArrayDotGet2()
    {
        $array = require __DIR__.'/dummies/test.en.php';
        $this->assertEquals(array_dot_get($array), $array);
    }

    //test array_dot_get helpers function
    public function testArrayDotGet3()
    {
        $array = require __DIR__.'/dummies/test.en.php';
        $this->assertEquals(array_dot_get($array, 'foo'), 'bar');
    }

    //test array_dot_get helpers function
    public function testArrayDotGet4()
    {
        $array = array_dot(require __DIR__.'/dummies/test.en.php');
        $this->assertEquals(array_dot_get($array, 'foos.foo'), 'bar');
    }

    //test array_dot_get helpers function
    public function testArrayDotGet5()
    {
        $array = [
          'toaster.Sam'  => 'CoD',
          'toaster.test' => 'Toast',
          'Mathieu'      => 'Patate',
        ];
        $final = [
          'Sam'  => 'CoD',
          'test' => 'Toast',
        ];
        $this->assertEquals(array_dot_get($array, 'toaster'), $final);
    }

    //test array_dot_get helpers function
    public function testArrayDotGet6()
    {
        $array = [
          'toaster.cod.sam'   => 'juggernaut',
          'toaster.cod.steve' => 'headshot',
          'mathieu'           => 'patate',
        ];
        $final = [
          'sam'   => 'juggernaut',
          'steve' => 'headshot',
        ];
        $this->assertEquals(array_dot_get($array, 'toaster.cod'), $final);
    }

    //test array_dot_get helpers function
    public function testArrayDotGet7()
    {
        $array = [
          'toaster.cod.sam.juggernaut' => 'op',
          'mathieu'                    => 'patate',
        ];
        $final = [
          'sam' => [
            'juggernaut' => 'op',
          ],
        ];
        $this->assertEquals(array_dot_get($array, 'toaster.cod'), $final);
    }

    //test array_dot_expand helpers function
    public function testArrayDotExpand1()
    {
        $array = [
          'Toaster.me.k' => 'string.a',
          'patate'       => 'three',
        ];
        $final = [
          'Toaster' => [
            'me' => [
              'k' => 'string.a',
            ],
          ],
          'patate' => 'three',
        ];

        $this->assertEquals(array_dot_expand($array), $final);
    }

    //test array_dot_expand helpers function
    public function testArrayDotExpand2()
    {
        $this->assertFalse(array_dot_expand(''));
    }

    //test array_dot_expand helpers function
    public function testArrayDotExpand3()
    {
        $array = ['hello' => 'string', 'hello.world' => ['hey' => 'hello']];
        $final = ['hello' => ['world' => ['hey' => 'hello']]];
        $this->assertEquals(array_dot_expand($array), $final);
    }

    //test html_style_tag helpers function
    public function testHtmlStyleTag1()
    {
        $this->assertEquals(html_style_tag('/test'), '<link rel="stylesheet" href="/test" media="all" />');
    }

    //test html_style_tag helpers function
    public function testHtmlStyleTag2()
    {
        $this->assertEquals(html_style_tag('/test', ['media' => 'screen']), '<link rel="stylesheet" href="/test" media="screen" />');
    }

    //test html_style_tag helpers function
    public function testHtmlStyleTag3()
    {
        $this->assertEquals(html_style_tag('/test', ['media' => 'screen', 'async' => 'true']), '<link rel="stylesheet" href="/test" media="screen" async="true" />');
    }

    //test html_script_tag helpers function
    public function testHtmlScriptTag1()
    {
        $this->assertEquals(html_script_tag('/test'), '<script src="/test" type="text/javascript"></script>');
    }

    //test html_script_tag helpers function
    public function testHtmlScriptTag2()
    {
        $this->assertEquals(html_script_tag('/test', ['async' => null]), '<script src="/test" type="text/javascript" async=""></script>');
    }

    //test str_contains helpers function
    public function testStrContains1()
    {
        $this->assertTrue(str_contains('foo', 'oo'));
    }

    //test str_contains helpers function
    public function testStrContains2()
    {
        $this->assertFalse(str_contains('foo', 'y'));
    }

    //test starts_with helpers function
    public function testStartsWith1()
    {
        $this->assertTrue(starts_with('foo', 'f'));
    }

    //test starts_with helpers function
    public function testStartsWith2()
    {
        $this->assertFalse(starts_with('foo', 'y'));
    }

    //test studly_case helpers function
    public function testStudlyCase1()
    {
        $this->assertEquals(studly_case('foo'), 'Foo');
    }

    //test studly_case helpers function
    public function testStudlyCase2()
    {
        $this->assertEquals(studly_case('foo bar'), 'FooBar');
    }

    //test snake_case helpers function
    public function testSnakeCase1()
    {
        $this->assertEquals(snake_case('foo'), 'foo');
    }

    //test snake_case helpers function
    public function testSnakeCase2()
    {
        $this->assertEquals(snake_case('foo bar'), 'foo_bar');
    }

    //test camel_case helpers function
    public function testCamelCase1()
    {
        $this->assertEquals(camel_case('foo'), 'foo');
    }

    //test camel_case helpers function
    public function testCamelCase2()
    {
        $this->assertEquals(camel_case('foo bar'), 'fooBar');
    }

    //test str_plural helpers function
    public function testStrPlural1()
    {
        $this->assertEquals(str_plural('foo'), 'foos');
    }

    //test str_slug helpers function
    public function testSlug1()
    {
        $this->assertEquals(str_slug('foo'), 'foo');
    }

    //test str_slug helpers function
    public function testSlug2()
    {
        $this->assertEquals(str_slug('foo bar'), 'foo-bar');
    }

    //test str_slug helpers function
    public function testSlug3()
    {
        $this->assertEquals(str_slug('fôô bar'), 'foo-bar');
    }

    //test between helpers function
    public function testBetween1()
    {
        $this->assertTrue(between(5, 1, 10));
    }

    //test between helpers function
    public function testBetween2()
    {
        $this->assertFalse(between(11, 1, 10));
    }

    //test get_gravatar helpers function
    public function testGravatar1()
    {
        $this->assertTrue(get_gravatar('mathieu.gosselin@anekdotes.com') != '');
    }

    //test get_gravatar helpers function
    public function testGravatar2()
    {
        $gravatar = get_gravatar('mathieu.gosselin@anekdotes.com', 80, 'identicon', 'r', true);
        $this->assertTrue(str_contains($gravatar, '<img'));
    }

    //test get_gravatar helpers function
    public function testGravatar3()
    {
        $gravatar = get_gravatar('mathieu.gosselin@anekdotes.com', 80, 'identicon', 'r', true, ['id' => 'gravatar']);
        $this->assertTrue(str_contains($gravatar, '<img') && str_contains($gravatar, 'id="gravatar"'));
    }

    //test array_column helpers function
    public function testArrayColumn1()
    {
        $this->assertEquals(array_column([['id' => 1], ['id' => 2], ['id' => 3]], 'id'), [1, 2, 3]);
    }

    //test array_column helpers function
    public function testArrayColumn2()
    {
        try {
            array_column();
        } catch (\Exception $e) {
            $this->assertTrue(true);

            return;
        }
    }

    //test array_column helpers function
    public function testArrayColumn3()
    {
        try {
            array_column([]);
        } catch (\Exception $e) {
            $this->assertTrue(true);

            return;
        }
    }

    //test array_column helpers function
    public function testArrayColumn4()
    {
        try {
            array_column(1);
        } catch (\Exception $e) {
            $this->assertTrue(true);

            return;
        }
    }

    //test array_column helpers function
    public function testArrayColumn5()
    {
        try {
            array_column([], []);
        } catch (\Exception $e) {
            $this->assertTrue(true);

            return;
        }
    }

    //test array_column helpers function
    public function testArrayColumn6()
    {
        try {
            array_column([], [], []);
        } catch (\Exception $e) {
            $this->assertTrue(true);

            return;
        }
    }

    //test array_column helpers function
    public function testArrayColumn7()
    {
        $array = [
          [
            'id'   => 1,
            'name' => 'steve',
          ],
          [
            'id'   => 2,
            'name' => 'sam',
          ],
        ];
        $this->assertEquals(array_column($array, 'name', 'id'), [1 => 'steve', 2 => 'sam']);
    }

    //test array_column helpers function
    public function testArrayColumn8()
    {
        $array = [
          [
            'id'   => 1,
            'name' => 'steve',
          ],
          [
            'id'   => 2,
            'name' => 'sam',
          ],
        ];
        $this->assertEquals(array_column($array, 'name', 2), [0 => 'steve', 1 => 'sam']);
    }

    //test getallheaders helpers function
    public function testGetallheaders1()
    {
        $this->assertEquals(getallheaders(), []);
    }

    //test getallheaders helpers function
    public function testGetallheaders2()
    {
        $_SERVER['HTTP_COOKIE'] = 'sb_session=f392508bf781ecc507e90587d34ab9e7403f6061; gsScrollPos=';
        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'en-US,en;q=0.8,fr;q=0.6';
        $_SERVER['HTTP_ACCEPT_ENCODING'] = 'gzip, deflate, sdch';
        $_SERVER['HTTP_REFERER'] = 'localhost';
        $_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS'] = '1';
        $_SERVER['HTTP_CACHE_CONTROL'] = 'max-age=0';
        $_SERVER['HTTP_CONNECTION'] = 'keep-alive';
        $_SERVER['HTTP_HOST'] = 'localhost';
        $this->assertEquals(count(getallheaders()), 8);
    }

    //test date formater helpers function 1
    public function testDateFormater1()
    {
        $this->assertEquals(date_formater('2016-10-28 00:00:00', '%A, %d %B %Y %H:%M', 'fr'), 'Vendredi, 28 octobre 2016 00:00');
    }

    //test date formater helpers function 2
    public function testDateFormater2()
    {
        $this->assertEquals(date_formater('2016-10-28 00:00:00', '%B', 'en'), 'October');
    }

    //test price helpers function 1
    public function testPrice1()
    {
        $this->assertEquals(price(10.12, 2, 'fr'), '10,12 $');
    }

    //test price helpers function 2
    public function testPrice2()
    {
        $this->assertEquals(price(10.12, 2, 'en'), '10.12$');
    }

    //test price helpers function 3
    public function testPrice3()
    {
        $this->assertEquals(price(10.123, 2, 'fr'), '10,12 $');
    }

    //test price helpers function 4
    public function testPrice4()
    {
        $this->assertEquals(price(10.123, 2, 'en'), '10.12$');
    }

    //test price helpers function 5
    public function testPrice5()
    {
        $this->assertEquals(price(10.123, 1, 'fr'), '10,1 $');
    }

    //test price helpers function 6
    public function testPrice6()
    {
        $this->assertEquals(price(10.123, 1, 'en'), '10.1$');
    }

    //test price helpers function 7
    public function testPrice7()
    {
        $this->assertEquals(price(10.123, 0, 'fr'), '10 $');
    }

    //test price helpers function 8
    public function testPrice8()
    {
        $this->assertEquals(price(10.123, 0, 'en'), '10$');
    }
}
