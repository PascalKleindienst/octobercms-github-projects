<?php namespace PKleindienst\GithubProjects\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'pkleindienst_githubprojects_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
