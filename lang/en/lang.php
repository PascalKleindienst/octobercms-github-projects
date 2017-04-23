<?php

return [
    'plugin' => [
        'name'        => 'Github Projects',
        'description' => 'Utilize the GitHub API to show informations about repositories.'
    ],
    'item' => [
        'name'        => 'Github Repository Item',
        'description' => 'Displays information about a GitHub repository.',
        'user_title'  => 'User',
        'user_desc'   => 'The user whose repository is displayed',
        'repo_title'  => 'Repository',
        'repo_desc'   => 'The repository name'
    ],
    'list' => [
        'name'               => 'Github Repository List',
        'description'        => 'List public repositories for the specified user.',
        'user_title'         => 'User',
        'user_desc'          => 'The user whose repositories are displayed',
        'type_title'         => 'Type',
        'type_desc'          => 'The repository type. Can be one of all, owner, member',
        'type_opt_all'       => 'All',
        'type_opt_owner'     => 'Owner',
        'type_opt_member'    => 'Member',
        'sort_title'         => 'Sorting',
        'sort_desc'          => 'The sorting field. Can be one of created, updated, pushed, full_name',
        'sort_opt_created'   => 'Created',
        'sort_opt_updated'   => 'Updated',
        'sort_opt_pushed'    => 'Pushed',
        'sort_opt_fullname'  => 'Full-Name',
        'direction_title'    => 'Sort Direction',
        'direction_desc'     => 'The sort direction. Can either be ascending or descending',
        'direction_opt_asc'  => 'Ascending',
        'direction_opt_desc' => 'Descending'
    ]
];
