<?php

class RouteTest extends TestCase {

    // public function setUp()
    // {
    //     //
    // }
    public function testRouteMeaning()
    {
        $this->call('GET', '/meaning');
        $this->assertResponseOk();
    }
    public function testRouteAbout()
    {
        $this->call('GET', '/about');
        $this->assertResponseOk();
    }
    public function testRouteHome()
    {
        $this->call('GET', '/');
        $this->assertResponseOk();
    }

}
