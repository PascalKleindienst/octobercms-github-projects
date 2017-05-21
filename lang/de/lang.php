<?php

return [
    'plugin' => [
        'name'        => 'Github Projekte',
        'description' => 'Nutzen der GitHub API, um Informationen über Repositories anzuzeigen.'
    ],
    'settings' => [
        'section_contact_label'     => 'Einstellungen',
        'description'               => 'Einstellungen verwalten',
        'hightlight_js_label'       => 'Highlight.js einbinden',
        'hightlight_js_comment'     => 'Hightlight.js automatisch einbinden oder nicht',
        'hightlight_styles_label'   => 'Hightlight.js Style',
        'hightlight_styles_comment' => 'Auswählen eines Styles für den Syntax Highlighter',
    ],
    'pagination' => [
        'page'     => 'Seite',
        'per_page' => 'Einträge pro Seite',
        'group'    => 'Seitennummerierung'
    ],
    'item' => [
        'name'        => 'Github Repository Item',
        'description' => 'Zeigt Informationen über ein GitHub-Repository an.',
        'user_title'  => 'Benutzer',
        'user_desc'   => 'Der Benutzer dessen Repository angezeigt wird',
        'repo_title'  => 'Repository',
        'repo_desc'   => 'Der Repository Name'
    ],
    'gist' => [
        'name'        => 'Gist',
        'description' => 'Zeige eine gist.',
        'id_title'    => 'ID',
        'id_desc'     => 'Die ID des gist',
        'sha_title'   => 'Revision',
        'sha_desc'    => 'Die Revisions-ID für den gist, falls eine spezifische Version angezeigt werden soll (optional)'
    ],
    'list' => [
        'name'               => 'Github Repository Liste',
        'description'        => 'Auflisten der öffentlichen Repositories für den angegebenen Benutzer.',
        'user_title'         => 'Benutzer',
        'user_desc'          => 'Der Benutzer dessen Repositories angezeigt werden',
        'type_title'         => 'Typ',
        'type_desc'          => 'Der Repository-Typ. Kann einer von "all", "owner", "member" sein',
        'type_opt_all'       => 'Alle',
        'type_opt_owner'     => 'Besitzer',
        'type_opt_member'    => 'Mitglied',
        'sort_title'         => 'Sortierung',
        'sort_desc'          => 'Das Sortierfeld. Kann einer von "created", "updated", "pushed", "full_name" sein',
        'sort_opt_created'   => 'Erstellt',
        'sort_opt_updated'   => 'Aktualisiert',
        'sort_opt_pushed'    => 'Pushed',
        'sort_opt_fullname'  => 'Vollständiger Name',
        'direction_title'    => 'Sortierrichtung',
        'direction_desc'     => 'Die Sortierrichtung. Kann entweder auf- oder absteigen',
        'direction_opt_asc'  => 'Aufsteigend',
        'direction_opt_desc' => 'Absteigend'
    ]
];
