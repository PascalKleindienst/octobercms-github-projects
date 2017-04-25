<?php namespace PKleindienst\GithubProjects;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'pkleindienst.githubprojects::lang.plugin.name',
            'description' => 'pkleindienst.githubprojects::lang.plugin.description',
            'author'      => 'Pascal Kleindienst',
            'icon'        => 'icon-github',
            'homepage'    => 'https://github.com/PascalKleindienst/octobercms-github-projects'
        ];
    }

    /**
     * @return array
     */
    public function registerComponents()
    {
        return [
            'PKleindienst\GithubProjects\Components\Item'     => 'ghItem',
            'PKleindienst\GithubProjects\Components\RepoList' => 'ghList'
        ];
    }

    /**
     * Register new Twig variables
     * @return array
     */
    public function registerMarkupTags()
    {
        // Check the translate plugin is installed
        if (class_exists('RainLab\Translate\Behaviors\TranslatableModel')) {
            return [];
        }

        return [
            'filters' => [
                '_'  => ['Lang', 'get'],
                '__' => ['Lang', 'choice'],
            ]
        ];
    }
}
