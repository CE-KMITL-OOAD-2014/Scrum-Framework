<?php

class RouteTest extends TestCase {

    // public function setUp()
    // {
    //     //
    // }
    public function testRouteMain()
    {
        $this->call('GET', '/');
        $this->assertResponseOk();
    }
   
    public function testRouteHome()
    {
        $this->call('GET', '/');
        $this->assertResponseOk();
    }

}
