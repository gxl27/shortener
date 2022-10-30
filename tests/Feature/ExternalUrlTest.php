<?php

namespace Tests\Feature;

use App\Services\ExternalUrl\CheckExternalUrl;
use App\Services\ExternalUrl\ExternalUrlHost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckExternalUrlTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_url_is_valid()
    {
        $isValid = CheckExternalUrl::check('https://emag.ro');

        $this->assertEquals(1, $isValid);
    }

    public function test_get_external_host()
    {
        $host = ExternalUrlHost::getHost('https://bit.ly/3DFbra');
        $expected = "www.company.lucianturlea.ro";

        $this->assertEquals($expected, $host);
    }
}
