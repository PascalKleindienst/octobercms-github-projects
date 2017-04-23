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
            'name'        => 'pkleindienst.githubprojects::lang.item.name',
            'description' => 'pkleindienst.githubprojects::lang.item.description'
        ];
    }

    /**
     * @return array
     */
    public function defineProperties()
    {
        return [
            'user' => [
                'title'       => 'pkleindienst.githubprojects::lang.item.user_title',
                'description' => 'pkleindienst.githubprojects::lang.item.user_desc'
            ],
            'repo' => [
                'title'       => 'pkleindienst.githubprojects::lang.item.repo_title',
                'description' => 'pkleindienst.githubprojects::lang.item.repo_desc'
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
