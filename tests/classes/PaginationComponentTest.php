<?php namespace PKleindienst\GithubProjects\Tests\Classes;

use PKleindienst\GithubProjects\Classes\PaginationComponent;
use PKleindienst\GithubProjects\Classes\Component;
use PKleindienst\GitHubProjects\Tests\PHPUnitUtil;
use PluginTestCase;

class PaginationComponentTest extends PluginTestCase
{    
    public function testPaginationProperties()
    {
        $stub = $this->getMockForAbstractClass(PaginationComponent::class);
        $props = PHPUnitUtil::callMethod($stub, 'paginationProperties', ['props' => ['foo' => 'bar']]);
        
        $this->assertInstanceOf(Component::class, $stub);
        $this->assertTrue(is_array($props));
        $this->assertArrayHasKey('foo', $props);
        $this->assertArrayHasKey('page', $props);
        $this->assertArrayHasKey('per_page', $props);
    }
}
