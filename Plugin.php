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
            'name'        => 'Github Projects',
            'description' => '',
            'author'      => 'Pascal Kleindienst',
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
