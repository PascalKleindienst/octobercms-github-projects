<?php namespace PKleindienst\GithubProjects\Classes;

use Cms\Classes\ComponentBase;
use PKleindienst\GithubProjects\Classes\Github;

/**
 * Component
 * @package PKleindienst\GithubProjects\Classes
 */
abstract class Component extends ComponentBase
{
    /**
     * Get new Github Instance
     * @return \PKleindienst\GithubProjects\Classes\Github
     */
    protected function getGithub()
    {
        return new Github();
    }
}
