<?php namespace PKleindienst\GithubProjects\Classes;

use Cms\Classes\ComponentBase;
use PKleindienst\GithubProjects\Classes\Github;

/**
 * Pagination Component
 * @package PKleindienst\GithubProjects\Classes
 */
abstract class PaginationComponent extends ComponentBase
{
    /**
     * Return Pagination Property array
     * @return array
     */
    protected function paginationProperties($props)
    {
        return $props + [
            'page' => [
                'title' => 'pkleindienst.githubprojects::lang.pagination.page',
                'type'  => 'string',
                'group' => 'pkleindienst.githubprojects::lang.pagination.group'
            ],
            'per_page' => [
                'title' => 'pkleindienst.githubprojects::lang.pagination.per_page',
                'type'  => 'string',
                'group' => 'pkleindienst.githubprojects::lang.pagination.group'
            ]
        ];
    }

    /**
     * Get new Github Instance
     * @return \PKleindienst\GithubProjects\Classes\Github
     */
    protected function getGithub()
    {
        return new Github();
    }
}