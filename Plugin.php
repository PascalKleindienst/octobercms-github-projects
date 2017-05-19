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
            'PKleindienst\GithubProjects\Components\RepoList' => 'ghList',
            'PKleindienst\GithubProjects\Components\Gist'     => 'ghGist'
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
            return ['filters' => [
                'cast_to_array' => [$this, 'castToArray']
            ]];
        }

        return [
            'filters' => [
                '_'             => ['Lang', 'get'],
                '__'            => ['Lang', 'choice'],
                'cast_to_array' => [$this, 'castToArray']
            ]
        ];
    }

    /**
     * Register settings
     * @return array
     */
    public function registerSettings()
    {
        return [
            'githubprojects' => [
                'label'       => 'pkleindienst.githubprojects::lang.plugin.name',
                'description' => 'pkleindienst.githubprojects::lang.settings.description',
                'icon'        => 'icon-github',
                'class'       => 'PKleindienst\GithubProjects\Models\Settings',
                'order'       => 500,
                'keywords'    => 'geography place placement',
                'permissions' => ['acme.users.access_settings']
            ]
        ];
    }

    /**
     * Markup Tag to cast an object to an array
     * @param mixed $stdClassObject
     * @return array
     */
    public function castToArray($stdClassObject)
    {
        return (array)$stdClassObject;
    }
}
