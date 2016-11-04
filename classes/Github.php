<?php namespace PKleindienst\GithubProjects\Classes;

/**
 * Github API Fetcher
 * @package PKleindienst\GithubProjects\Classes
 */
class Github
{
    /**
     * @var string
     */
    private $endpoint = 'https://api.github.com';

    /**
     * List public repositories for the specified user
     * GET /users/:username/repos
     *
     * @param string $username
     * @return stdObj
     */
    public function repos($username)
    {
        return $this->fetch("/users/$username/repos");
    }

    /**
     * Get public repository $repo for a specified user
     * GET /repos/:owner/:repo
     *
     * @param string $owner
     * @param string $repo
     * @return stdObj
     */
    public function get($owner, $repo)
    {
        return $this->fetch("/repos/$owner/$repo");
    }

    /**
     * Fetch API Ressource
     *
     * @param string $url
     * @return stdObj
     */
    protected function fetch($url)
    {
        // create a new cURL resource
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->endpoint . $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Octobercms-PKleindienst-Github-Projects");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        // grab URL and pass it to the browser
        $request = curl_exec($ch);

        // close cURL resource, and free up system resources
        curl_close($ch);

        return json_decode($request);
    }
}
