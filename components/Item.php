<?php namespace PKleindienst\GithubProjects\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use PKleindienst\GithubProjects\Classes\Github;

/**
 * Item Component
 * @package PKleindienst\GithubProjects\Components
 */
class Item extends ComponentBase
{
    /**
     * @var stdObj
     */
    public $repo;

    /**
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name'        => 'Github Repository Item',
            'description' => 'Outputs information about a github repository.'
        ];
    }

    /**
     * @return array
     */
    public function defineProperties()
    {
        return [
            'user' => [
                'title'   => 'User',
            ],
            'repo' => [
                'title'   => 'Repository',
            ]
        ];
    }

    /**
     * Prepare vars
     */
    public function onRun()
    {
        $this->repo = $this->getGithub()->get($this->property('user'), $this->property('repo'));
    }

    /**
     * Get new Github Instance
     * @return \PKleindienst\GithubProjects\Classes\Github
     */
    public function getGithub()
    {
        return new Github();
    }
}
