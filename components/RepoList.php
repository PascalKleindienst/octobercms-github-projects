<?php namespace PKleindienst\GithubProjects\Components;

use PKleindienst\GithubProjects\Classes\PaginationComponent;

/**
 * Item Component
 * @package PKleindienst\GithubProjects\Components
 */
class RepoList extends PaginationComponent
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
            'name'        => 'pkleindienst.githubprojects::lang.list.name',
            'description' => 'pkleindienst.githubprojects::lang.list.description'
        ];
    }

    /**
     * @return array
     */
    public function defineProperties()
    {
        return $this->paginationProperties([
            'user'      => [
                'title'       => 'pkleindienst.githubprojects::lang.list.user_title',
                'description' => 'pkleindienst.githubprojects::lang.list.user_desc'
            ],
            'type'      => [
                'title'       => 'pkleindienst.githubprojects::lang.list.type_title',
                'description' => 'pkleindienst.githubprojects::lang.list.type_desc',
                'type'        => 'dropdown',
                'options'     => [
                    'all'    => 'pkleindienst.githubprojects::lang.list.type_opt_all',
                    'owner'  => 'pkleindienst.githubprojects::lang.list.type_opt_owner',
                    'member' => 'pkleindienst.githubprojects::lang.list.type_opt_member'
                ]
            ],
            'sort'      => [
                'title'       => 'pkleindienst.githubprojects::lang.list.sort_title',
                'description' => 'pkleindienst.githubprojects::lang.list.sort_desc',
                'type'        => 'dropdown',
                'options'     => [
                    'created'   => 'pkleindienst.githubprojects::lang.list.sort_opt_created',
                    'updated'   => 'pkleindienst.githubprojects::lang.list.sort_opt_updated',
                    'pushed'    => 'pkleindienst.githubprojects::lang.list.sort_opt_pushed',
                    'full_name' => 'pkleindienst.githubprojects::lang.list.sort_opt_fullname'
                ]
            ],
            'direction' => [
                'title'       => 'pkleindienst.githubprojects::lang.list.direction_title',
                'description' => 'pkleindienst.githubprojects::lang.list.direction_desc',
                'type'        => 'dropdown',
                'options'     => [
                    'asc'  => 'pkleindienst.githubprojects::lang.list.direction_opt_asc',
                    'desc' => 'pkleindienst.githubprojects::lang.list.direction_opt_desc'
                ]
            ]
        ]);
    }

    /**
     * Prepare vars
     */
    public function onRun()
    {
        $this->list = $this->getGithub()->repos(
            $this->property('user'), $this->property('type'), $this->property('sort'), $this->property('direction'), $this->property('page'), $this->property('per_page')
        );
    }
}
