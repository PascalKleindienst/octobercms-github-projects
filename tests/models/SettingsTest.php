<?php namespace PKleindienst\GithubProjects\Tests\Models;

use PKleindienst\GithubProjects\Models\Settings;
use PluginTestCase;
use Model;

class SettingsTest extends PluginTestCase
{
    protected $settings;

    public function setUp()
    {
        parent::setUp();
        $this->settings = new Settings();
    }

    public function testImplement()
    {
        $this->assertObjectHasAttribute('implement', $this->settings);
        $this->assertTrue(is_array($this->settings->implement));
    }

    public function testCode()
    {
        $this->assertObjectHasAttribute('settingsCode', $this->settings);
        $this->assertTrue(is_string($this->settings->settingsCode));
    }

    public function testFields()
    {
        $this->assertObjectHasAttribute('settingsFields', $this->settings);
        $this->assertTrue(is_string($this->settings->settingsFields));
    }

    public function testParentClass()
    {
        $this->assertInstanceOf(Model::class, $this->settings);
    }
}
