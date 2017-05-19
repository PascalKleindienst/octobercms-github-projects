<?php namespace PKleindienst\GithubProjects\Tests\Components;

use PKleindienst\GithubProjects\Components\Gist;
use PKleindienst\GithubProjects\Classes\Component;
use PKleindienst\GithubProjects\Classes\Github;
use PluginTestCase;

class GistTest extends PluginTestCase
{
    protected $gist;

    public function setUp()
    {
        parent::setUp();
        $this->gist = new Gist();
    }

    public function testComponentsDetails()
    {
        $details = $this->gist->componentDetails();
        $this->assertTrue(is_array($details));
        $this->assertCount(2, $details);
    }

    /**
     * @dependsOn testComponentsDetails
     */
    public function testComponentsDetailsKeys()
    {
        $details = $this->gist->componentDetails();
        $this->assertArrayHasKey('name', $details);
        $this->assertArrayHasKey('description', $details);
    }

    public function testDefineProperties()
    {
        $props = $this->gist->defineProperties();
        $this->assertTrue(is_array($props));
        $this->assertCount(2, $props);
        $this->assertArrayHasKey('id', $props);
        $this->assertArrayHasKey('sha', $props);
    }

    /**
     * @dependsOn testDefineProperties
     */
    public function testDefinePropertiesKeys()
    {
        $props = $this->gist->defineProperties();
        $this->assertArrayHasKey('title', $props['id']);
        $this->assertArrayHasKey('title', $props['sha']);
        $this->assertArrayHasKey('description', $props['id']);
        $this->assertArrayHasKey('description', $props['sha']);
    }

    public function testOnRun()
    {
         // mock github dependency
        $mock = $this->getMock(Gist::class, ['getGithub'], [], '', false);
        $mock->expects($this->once())
            ->method('getGithub')
            ->will($this->returnCallback(function () {
                $ghMock =  $this->getMock(Github::class, ['gist'], [], '', false);
                $ghMock->expects($this->once())
                    ->method('gist')
                    ->will($this->returnCallback(function () {
                        return new \stdClass();
                    }));

                return $ghMock;
            }));


        $mock->onRun();
        $this->assertInstanceOf(\stdClass::class, $mock->gist);
    }

    public function testParentClass()
    {
        $this->assertInstanceOf(Component::class, $this->gist);
    }
}
