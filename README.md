# OctoberCMS GitHub Projects Plugin

[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![HHVM][ico-hhvm]][link-hhvm]
[![StyleCI][ico-style]][link-style]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Code Coverage][ico-code-coverage]][link-code-coverage]

A plugin which utilizes to GitHub API to show informations about repositories.

---

## Details
This plugin will provide a collection of components to display data about GitHub repositories based on the [GitHub API v3](developer.github.com/v3/repos). 

As time passes more parts like *Projects, Issues or Gists* will be added to this collection of components.

### Requirements
In order to work the [PHP cURL extension](https://secure.php.net/manual/en/book.curl.php) must be installed and enabled.

---

## Documentation

### RepoList
List public repositories for the specified user.

#### Parameters
|     Name    |   Type   |                                                 Description                                                 |
|:------------|:---------|:------------------------------------------------------------------------------------------------------------|
| `user`      | `string` | The user whose repositories are displayed                                                                   |
| `type`      | `string` | The repository type. Can be one of `all, owner, member`. Default: `owner`                                   |
| `sort`      | `string` | The sorting field. Can be one of `created, updated, pushed, full_name`. Default: `full_name`                |
| `direction` | `string` | The sort direction. Can be one of `asc` or `desc`. Default: when using `full_name`: `asc`, otherwise `desc` |

### Item
Get a specific repository

The available variables which can be used in the component view are listed here: [https://developer.github.com/v3/repos/#response-3](
https://developer.github.com/v3/repos/#response-3)

#### Parameters
| Name   | Type     | Description                            |
|:-------|:---------|:---------------------------------------|
| `user` | `string` | The user whose repository is displayed |
| `repo` | `string` | The repository name                    |


---

## Contributing
Please submit pull requests with translations or bugfixes on the plugin's [GitHub page](https://github.com/PascalKleindienst/octobercms-github-projects). Bug reports and feature requests via [Issues](https://github.com/PascalKleindienst/octobercms-github-projects/issues) are welcome!

## Security
If you discover any security related issues, please email security@pascalkleindienst.de instead of using the issue tracker.

## Credits

- [Pascal Kleindienst][link-author]

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


[ico-license]: https://img.shields.io/github/license/PascalKleindienst/octobercms-github-projects.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/PascalKleindienst/octobercms-github-projects/master.svg?style=flat-square
[ico-hhvm]: https://img.shields.io/hhvm/pkleindienst/octobercms-github-projects.svg?style=flat-square
[ico-style]: https://styleci.io/repos/72832060/shield?branch=master
[ico-code-quality]: https://img.shields.io/codeclimate/github/PascalKleindienst/octobercms-github-projects.svg?style=flat-square
[ico-code-coverage]: https://img.shields.io/codeclimate/coverage/github/PascalKleindienst/octobercms-github-projects.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/atog/octobercms-github-projects
[link-travis]: https://travis-ci.org/PascalKleindienst/octobercms-github-projects
[link-hhvm]: http://hhvm.h4cc.de/package/pkleindienst/octobercms-github-projects
[link-code-quality]: https://codeclimate.com/github/PascalKleindienst/octobercms-github-projects
[link-code-coverage]: https://codeclimate.com/github/PascalKleindienst/octobercms-github-projects/coverage
[link-style]: https://styleci.io/repos/72832060
[link-author]: https://github.com/PascalKleindienst