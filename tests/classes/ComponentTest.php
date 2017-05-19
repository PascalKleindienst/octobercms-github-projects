<?php namespace PKleindienst\GithubProjects\Tests\Classes;

use PKleindienst\GithubProjects\Classes\Component;
use PKleindienst\GithubProjects\Classes\Github;
use PKleindienst\GitHubProjects\Tests\PHPUnitUtil;
use PluginTestCase;

class ComponentTest extends PluginTestCase
{    
    public function testGetGithub()
    {
        $this->assertInstanceOf(
            Github::class,
            PHPUnitUtil::callMethod($this->getMockForAbstractClass(Component::class), 'getGithub')
        );
    }
}
