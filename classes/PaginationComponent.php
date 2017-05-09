<?php namespace PKleindienst\GithubProjects\Classes;

use PKleindienst\GithubProjects\Classes\Component;
use PKleindienst\GithubProjects\Classes\Github;

/**
 * Pagination Component
 * @package PKleindienst\GithubProjects\Classes
 */
abstract class PaginationComponent extends Component
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
}
