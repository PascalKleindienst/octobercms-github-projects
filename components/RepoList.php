<?php namespace PKleindienst\GithubProjects\Components;

use Cms\Classes\ComponentBase;
use PKleindienst\GithubProjects\Classes\Github;

/**
 * Item Component
 * @package PKleindienst\GithubProjects\Components
 */
class RepoList extends ComponentBase
{
    /**
     * @var stdObj[]
     */
    public $list;

    /**
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name'        => 'Github Repository List',
            'description' => 'List public repositories for the specified user.'
        ];
    }

    /**
     * @return array
     */
    public function defineProperties()
    {
        return [
            'user'      => [
                'title' => 'User',
            ],
            'type'      => [
                'title'       => 'Type',
                'type'        => 'dropdown',
                'options'     => ['all' => 'All', 'owner' => 'Owner', 'member' => 'Member']
            ],
            'sort'      => [
                'title'       => 'Sorting',
                'type'        => 'dropdown',
                'options'     => ['created' => 'Created', 'updated' => 'Updated', 'pushed' => 'Pushed', 'full_name' => 'Full-Name']
            ],
            'direction' => [
                'title'       => 'Sort Direction',
                'type'        => 'dropdown',
                'options'     => ['asc' => 'Ascending', 'desc' => 'Descending']
            ]
        ];
    }

    /**
     * Prepare vars
     */
    public function onRun()
    {
        $this->list = $this->getGithub()->repos($this->property('user'), $this->property('type'), $this->property('sort'), $this->property('direction'));
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
