<?php namespace PKleindienst\GithubProjects\Tests\Components;

use PKleindienst\GithubProjects\Components\Item;
use PKleindienst\GithubProjects\Classes\Component;
use PKleindienst\GithubProjects\Classes\Github;
use PluginTestCase;

class ItemTest extends PluginTestCase
{
    protected $item;

    public function setUp()
    {
        parent::setUp();
        $this->item = new Item();
    }

    public function testComponentsDetails()
    {
        $details = $this->item->componentDetails();
        $this->assertTrue(is_array($details));
        $this->assertCount(2, $details);
    }

    /**
     * @dependsOn testComponentsDetails
     */
    public function testComponentsDetailsKeys()
    {
        $details = $this->item->componentDetails();
        $this->assertArrayHasKey('name', $details);
        $this->assertArrayHasKey('description', $details);
    }

    public function testDefineProperties()
    {
        $props = $this->item->defineProperties();
        $this->assertTrue(is_array($props));
        $this->assertCount(2, $props);
        $this->assertArrayHasKey('user', $props);
        $this->assertArrayHasKey('repo', $props);
    }

    /**
     * @dependsOn testDefineProperties
     */
    public function testDefinePropertiesKeys()
    {
        $props = $this->item->defineProperties();
        $this->assertArrayHasKey('title', $props['user']);
        $this->assertArrayHasKey('title', $props['repo']);
    }

    public function testOnRun()
    {
        // mock github dependency
        $mock = $this->getMock(Item::class, ['getGithub'], [], '', false);
        $mock->expects($this->once())
            ->method('getGithub')
            ->will($this->returnCallback(function () {
                $ghMock =  $this->getMock(Github::class, ['get'], [], '', false);
                $ghMock->expects($this->once())
                    ->method('get')
                    ->will($this->returnCallback(function () {
                        return new \stdClass();
                    }));
                return $ghMock;
            }));

        // run Method
        $mock->onRun();
        $this->assertInstanceOf(\stdClass::class, $mock->repo);
    }

    public function testParentClass()
    {
        $this->assertInstanceOf(Component::class, $this->item);
    }
}
