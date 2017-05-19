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

    public function testGist()
    {
        $gist = $this->gh->gist('22ea758ce864ef1d7127');
        $this->assertInstanceOf(\stdClass::class, $gist);
    }

    public function testGistWithSha()
    {
        $gist = $this->gh->gist('22ea758ce864ef1d7127', '877e78b5e4bd20c579195c6ad87a34eb851f1708');
        $this->assertInstanceOf(\stdClass::class, $gist);
    }

    /**
     * @dependsOn testGist
     */
    public function testGistProps()
    {
        $gist = $this->gh->gist('22ea758ce864ef1d7127');
        $this->assertObjectHasAttribute('owner', $gist);
        $this->assertObjectHasAttribute('html_url', $gist);
        $this->assertObjectHasAttribute('description', $gist);
        $this->assertObjectHasAttribute('files', $gist);
        $this->assertObjectHasAttribute('updated_at', $gist);
        $this->assertObjectHasAttribute('truncated', $gist);
    }
}
