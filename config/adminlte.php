<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Nepal News',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Nepal News</b>',

    'logo_mini' => '<b></b>',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'admin/dashboard',

    'logout_url' => 'admin/logout',

    'logout_method' => null,

    'login_url' => 'admin/login',

    'register_url' => 'admin/register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'MAIN NAVIGATION',
        [
            'text' =>'DashBoard',
            'icon' => ' fa-dashboard ',
            'url'  => 'admin/dashboard',
        ],
        [
            'text' =>'Countries',
            'icon' => 'globe',
            'submenu' => [
                [
                    'text' => 'Manage',
                    'url'  => 'admin/countries',
                    'icon' => 'gear',
                ],
                [
                    'text' => 'Create',
                    'url'  => 'admin/countries/create',
                    'icon' => ' fa-pencil',
                ]
            ]


        ],
        [
            'text' =>'States',
            'icon' => 'map',
            'submenu' => [
                [
                    'text' => 'Manage',
                    'url'  => 'admin/states',
                    'icon' => 'gear',
                ],
                [
                    'text' => 'Create',
                    'url'  => 'admin/states/create',
                    'icon' => ' fa-pencil',
                ]
            ]


        ],
        [
            'text' =>'District',
            'icon' => 'map-marker',
            'submenu' => [
                [
                    'text' => 'Manage',
                    'url'  => 'admin/districts',
                    'icon' => 'gear',
                ],
                [
                    'text' => 'Create',
                    'url'  => 'admin/districts/create',
                    'icon' => ' fa-pencil',
                ]
            ]


        ],
        [
            'text' =>'Categories',
            'icon' => 'tags',
            'submenu' => [
                [
                    'text' => 'Manage',
                    'url'  => 'admin/categories',
                    'icon' => 'gear',
                ],
                [
                    'text' => 'Create',
                    'url'  => 'admin/categories/create',
                    'icon' => ' fa-pencil',
                ]
            ]


        ],
        [
            'text' =>'Posts',
            'icon' => 'thumb-tack',
            'submenu' => [
                [
                    'text' => 'Manage',
                    'url'  => 'admin/posts',
                    'icon' => 'gear',
                ],
                [
                    'text' => 'Create',
                    'url'  => 'admin/posts/create',
                    'icon' => ' fa-pencil',
                ]
            ]


        ],
        [
            'text' =>'Galleries',
            'icon' => 'picture-o',
            'submenu' => [
                [
                    'text' => 'Manage',
                    'url'  => 'admin/galleries',
                    'icon' => 'gear',
                ],
                [
                    'text' => 'Create',
                    'url'  => 'admin/galleries/create',
                    'icon' => ' fa-pencil',
                ]
            ]


        ],
        [
            'text' =>'Events',
            'icon' => ' fa-calendar-check-o ',

            'submenu' => [
                [
                    'text' => 'Manage',
                    'url'  => 'admin/events',
                    'icon' => 'gear',
                ],
                [
                    'text' => 'Create',
                    'url'  => 'admin/events/create',
                    'icon' => ' fa-pencil',
                ]
            ]


        ],
        [
            'text' =>'Pages',
            'icon' => ' fa-sticky-note-o',
            'submenu' => [
                [
                    'text' => 'Manage',
                    'url'  => 'admin/pages',
                    'icon' => 'gear',
                ],
                [
                    'text' => 'Create',
                    'url'  => 'admin/pages/create',
                    'icon' => ' fa-pencil',
                ]
            ]


        ],
        'Roles and Permission',
        [
            'text' =>'User Management',
            'icon' => 'user',

            'submenu' => [
                [
                    'text' => 'Manage',
                    'url'  => 'admin/users',
                    'icon' => 'gear',

                ],
                [
                    'text' => 'Create',
                    'url'  => 'admin/users/create',

                ]
            ],
        ],

        [
            'text' =>'Role Management',
            'icon' => 'list',
            'submenu' => [
                [
                    'text' => 'Manage',
                    'url'  => 'admin/roles',
                    'icon' => 'gear',

                ],
                [
                    'text' => 'Create',
                    'url'  => 'admin/roles/create',

                ]
            ],
        ],
        [
            'text' =>'Permission View',
            'icon' => 'user',
            'url'  => 'admin/permissions',


        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
