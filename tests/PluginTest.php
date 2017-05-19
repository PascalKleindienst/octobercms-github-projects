<?php namespace PKleindienst\GithubProjects\Tests;

use PKleindienst\GithubProjects\Plugin;
use PluginTestCase;

class PluginTest extends PluginTestCase
{
    protected $plugin;

    public function setUp()
    {
        parent::setUp();
        $this->plugin = new Plugin($this->app);
    }

    public function testPluginDetails()
    {
        $details = $this->plugin->pluginDetails();
        $this->assertTrue(is_array($details));
        $this->assertGreaterThanOrEqual(3, $details);
    }

    /**
     * @dependsOn testPluginDetails
     */
    public function testPluginDetailsKeys()
    {
        $details = $this->plugin->pluginDetails();
        $this->assertArrayHasKey('name', $details);
        $this->assertArrayHasKey('description', $details);
        $this->assertArrayHasKey('author', $details);
    }

    public function testRegisterComponents()
    {
        $components = $this->plugin->registerComponents();
        $this->assertTrue(is_array($components));
        $this->assertArrayHasKey('PKleindienst\GithubProjects\Components\Item', $components);
        $this->assertArrayHasKey('PKleindienst\GithubProjects\Components\RepoList', $components);
        $this->assertArrayHasKey('PKleindienst\GithubProjects\Components\Gist', $components);
    }

    public function testRegisterSettings()
    {
        $settings = $this->plugin->registerSettings();
        $this->assertTrue(is_array($settings));
        $this->assertArrayHasKey('githubprojects', $settings);
    }

    public function testCastToArray()
    {
        $obj = new \stdClass();
        $obj->foo = 'bar';

        $this->assertTrue(is_array($this->plugin->castToArray($obj)));
    }
    
    public function testRegisterMarkupTagsNotEmpty()
    {
        $tags = $this->plugin->registerMarkupTags();
        $this->assertTrue(is_array($tags));

        if (!class_exists('RainLab\Translate\Behaviors\TranslatableModel')) {
            $this->assertArrayHasKey('filters', $tags);
            $this->assertArrayHasKey('_', $tags['filters']);
            $this->assertArrayHasKey('__', $tags['filters']);
            $this->assertArrayHasKey('cast_to_array', $tags['filters']);
        }
    }
}
