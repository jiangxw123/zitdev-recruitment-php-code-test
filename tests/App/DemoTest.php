<?php
/*
 * @Date         : 2022-03-02 14:49:25
 * @LastEditors  : Jack Zhou <jack@ks-it.co>
 * @LastEditTime : 2022-03-02 17:22:16
 * @Description  : 
 * @FilePath     : /recruitment-php-code-test/tests/App/DemoTest.php
 */

namespace Test\App;

use App\App\Demo;
use App\Service\AppLogger;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;


class DemoTest extends TestCase {
    private $demo;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->demo = new Demo(new AppLogger('log4php'), new HttpRequest());
    }

    public function test_foo() {
        $this->assertEquals("bar", $this->demo->foo());
    }

    public function test_get_user_info() {
        $userInfo = $this->demo->get_user_info();
        $this->assertNotNull($userInfo);
        $this->assertArrayHasKey("id", $userInfo);
        $this->assertArrayHasKey("username", $userInfo);
    }
}