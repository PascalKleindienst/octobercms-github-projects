<?php namespace PKleindienst\GithubProjects\Tests\Components;

use PKleindienst\GithubProjects\Components\RepoList;
use PKleindienst\GithubProjects\Classes\Github;
use PKleindienst\GithubProjects\Classes\PaginationComponent;
use PluginTestCase;

class RepoListTest extends PluginTestCase
{
    /**
     * @var \PKleindienst\GithubProjects\Components\RepoList
     */
    protected $repoList;

    /**
     * Setup
     */
    public function setUp()
    {
        parent::setUp();
        $this->repoList = new RepoList();
    }

    /**
     * Tests
     */
     public function testIsInstanceOfPaginationComponent()
    {
        $this->assertInstanceOf(PaginationComponent::class, $this->repoList);
    }
    
    public function testComponentsDetails()
    {
        $details = $this->repoList->componentDetails();
        $this->assertTrue(is_array($details));
        $this->assertCount(2, $details);
    }

    /**
     * @dependsOn testComponentsDetails
     */
    public function testComponentsDetailsKeys()
    {
        $details = $this->repoList->componentDetails();
        $this->assertArrayHasKey('name', $details);
        $this->assertArrayHasKey('description', $details);
    }

    public function testDefineProperties()
    {
        $props = $this->repoList->defineProperties();
        $this->assertTrue(is_array($props));
        $this->assertArrayHasKey('user', $props);
        $this->assertArrayHasKey('type', $props);
        $this->assertArrayHasKey('sort', $props);
        $this->assertArrayHasKey('direction', $props);
        $this->assertArrayHasKey('page', $props);
        $this->assertArrayHasKey('per_page', $props);
    }

    /**
     * @dependsOn testDefineProperties
     */
    public function testDefinePropertiesKeys()
    {
        $props = $this->repoList->defineProperties();
        $this->assertArrayHasKey('title', $props['user']);
        $this->assertArrayHasKey('title', $props['type']);
        $this->assertArrayHasKey('title', $props['sort']);
        $this->assertArrayHasKey('title', $props['direction']);
    }

    public function testOnRun()
    {
        // mock github dependency
        $mock = $this->getMock(RepoList::class, ['getGithub'], [], '', false);
        $mock->expects($this->once())
            ->method('getGithub')
            ->will($this->returnCallback(function () {
                $ghMock =  $this->getMock(Github::class, ['repos'], [], '', false);
                $ghMock->expects($this->once())
                    ->method('repos')
                    ->will($this->returnCallback(function () {
                        return [new \stdClass()];
                    }));

                return $ghMock;
            }));

        // run Method
        $mock->onRun();
        $this->assertNotEmpty($mock->list);
    }
}
