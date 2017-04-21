<?php namespace PKleindienst\GithubProjects\Tests\Classes;

use PKleindienst\GithubProjects\Classes\Github;
use PluginTestCase;

class GitHubTest extends PluginTestCase
{
    protected $gh;

    public function setUp()
    {
        parent::setUp();
        $this->gh = new Github();
    }

    public function testRepos()
    {
        $repos = $this->gh->repos('octobercms', null, null, null);
        $this->assertTrue(is_array($repos));
        $this->assertGreaterThanOrEqual(1, count($repos));
    }

    /**
     * @dependsOn testRepos
     */
    public function testReposProps()
    {
        $repos = $this->gh->repos('octobercms', null, null, null);
        $this->assertObjectHasAttribute('owner', $repos[0]);
        $this->assertObjectHasAttribute('html_url', $repos[0]);
        $this->assertObjectHasAttribute('stargazers_count', $repos[0]);
        $this->assertObjectHasAttribute('watchers_count', $repos[0]);
        $this->assertObjectHasAttribute('forks', $repos[0]);
        $this->assertObjectHasAttribute('language', $repos[0]);
        $this->assertObjectHasAttribute('description', $repos[0]);
        $this->assertObjectHasAttribute('homepage', $repos[0]);
        $this->assertObjectHasAttribute('pushed_at', $repos[0]);
    }

    public function testGet()
    {
        $repo = $this->gh->get('octobercms', 'october');
        $this->assertInstanceOf(\stdClass::class, $repo);
    }

    /**
     * @dependsOn testGet
     */
    public function testGetProps()
    {
        $repo = $this->gh->get('octobercms', 'october');
        $this->assertObjectHasAttribute('owner', $repo);
        $this->assertObjectHasAttribute('html_url', $repo);
        $this->assertObjectHasAttribute('stargazers_count', $repo);
        $this->assertObjectHasAttribute('watchers_count', $repo);
        $this->assertObjectHasAttribute('forks', $repo);
        $this->assertObjectHasAttribute('language', $repo);
        $this->assertObjectHasAttribute('description', $repo);
        $this->assertObjectHasAttribute('homepage', $repo);
        $this->assertObjectHasAttribute('pushed_at', $repo);
    }
}
