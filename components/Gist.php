<?php namespace PKleindienst\GithubProjects\Components;

use PKleindienst\GithubProjects\Classes\Component;
use PKleindienst\GithubProjects\Models\Settings;

/**
 * Gist Item
 * @package PKleindienst\GithubProjects\Components
 */
class Gist extends Component
{
    /**
     * @var stdObj
     */
    public $gist;

    /**
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name'        => 'pkleindienst.githubprojects::lang.gist.name',
            'description' => 'pkleindienst.githubprojects::lang.gist.description'
        ];
    }

    /**
     * @return array
     */
    public function defineProperties()
    {
        return [
            'id' => [
                'title'       => 'pkleindienst.githubprojects::lang.gist.id_title',
                'description' => 'pkleindienst.githubprojects::lang.gist.id_desc'
            ],
            'sha' => [
                'title'       => 'pkleindienst.githubprojects::lang.gist.sha_title',
                'description' => 'pkleindienst.githubprojects::lang.gist.sha_desc'
            ]
        ];
    }

    /**
     * Load gist
     */
    public function onRun()
    {
        // Load highlight js if needed
        if (Settings::get('include_highlight_js')) {
            $this->addJs('//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.11.0/highlight.min.js');
            $this->addJs('/plugins/pkleindienst/githubprojects/assets/initHighlighter.js');
            $this->addCss('//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.11.0/styles/' . Settings::get('highlight_js_styles', 'default') . '.min.css');
        }

        $this->gist = $this->getGithub()->gist($this->property('id'), $this->property('sha'));
    }
}
