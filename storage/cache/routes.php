<?php return array (
  0 => 
  array (
    'GET' => 
    array (
      '/' => 'route0',
      '/oauth' => 'route1',
      '/login' => 'route2',
      '/logout' => 'route4',
      '/password/reset' => 'route5',
      '/password/token' => 'route7',
      '/password/create' => 'route8',
      '/dashboard' => 'route10',
      '/company-profile' => 'route11',
      '/social-media' => 'route12',
      '/paid-advertising' => 'route13',
      '/local-listings' => 'route14',
      '/services' => 'route15',
      '/website' => 'route17',
      '/website/order/create/start-order' => 'route18',
      '/website/order/create/website-package' => 'route20',
      '/website/order/create/home-page' => 'route22',
      '/website/order/create/website-pages' => 'route24',
      '/website/order/create/special-features' => 'route26',
      '/website/order/create/estimated-cost' => 'route28',
      '/website/order/create/welcome' => 'route30',
      '/website/order/update/welcome' => 'route31',
      '/website/order/update/website-package' => 'route32',
      '/website/order/update/home-page' => 'route34',
      '/website/order/update/website-pages' => 'route36',
      '/website/order/update/special-features' => 'route38',
      '/website/order/update/estimated-cost' => 'route40',
      '/website/products' => 'route42',
      '/website/margins' => 'route43',
      '/google-my-business' => 'route56',
      '/google-my-business/reviews' => 'route58',
      '/google-my-business/posts' => 'route63',
      '/admin' => 'route65',
      '/admin/dealers' => 'route66',
      '/admin/social-media' => 'route71',
      '/admin/paid-ads' => 'route73',
      '/admin/listing-leader' => 'route75',
      '/admin/billing' => 'route77',
      '/admin/services' => 'route79',
      '/admin/gmb/posts' => 'route82',
      '/admin/gmb/reviews' => 'route84',
      '/admin/gmb/locations' => 'route86',
      '/admin/gmb' => 'route88',
      '/admin/gmb/service-categories' => 'route97',
    ),
    'POST' => 
    array (
      '/login' => 'route3',
      '/password/reset' => 'route6',
      '/password/store' => 'route9',
      '/services' => 'route16',
      '/website/order/create/start-order' => 'route19',
      '/website/order/create/website-package' => 'route21',
      '/website/order/create/home-page' => 'route23',
      '/website/order/create/website-pages' => 'route25',
      '/website/order/create/special-features' => 'route27',
      '/website/order/create/estimated-cost' => 'route29',
      '/website/order/update/website-package' => 'route33',
      '/website/order/update/home-page' => 'route35',
      '/website/order/update/website-pages' => 'route37',
      '/website/order/update/special-features' => 'route39',
      '/website/order/update/estimated-cost' => 'route41',
      '/company-profile/contact-information' => 'route44',
      '/company-profile/contact-information/ajax' => 'route45',
      '/company-profile/contact-information/gmb' => 'route46',
      '/company-profile/essential-information' => 'route47',
      '/company-profile/essential-information/ajax' => 'route48',
      '/company-profile/essential-information/gmb' => 'route49',
      '/company-profile/social-media' => 'route50',
      '/company-profile/social-media/ajax' => 'route51',
      '/company-profile/company-photos' => 'route52',
      '/company-profile/website-information' => 'route54',
      '/company-profile/website-information/ajax' => 'route55',
      '/google-my-business/refresh' => 'route57',
      '/google-my-business/posts' => 'route64',
      '/admin/dealers' => 'route67',
      '/admin/dealers/update' => 'route68',
      '/admin/social-media' => 'route72',
      '/admin/paid-ads' => 'route74',
      '/admin/listing-leader' => 'route76',
      '/admin/billing' => 'route78',
      '/admin/services' => 'route80',
      '/admin/services/update' => 'route81',
      '/admin/gmb/locations/update' => 'route87',
      '/admin/gmb/locations' => 'route89',
      '/admin/gmb/insights' => 'route90',
      '/admin/gmb/reviews' => 'route91',
      '/admin/gmb/replies' => 'route92',
      '/admin/gmb/posts' => 'route93',
      '/admin/gmb/business' => 'route94',
      '/admin/gmb/information' => 'route95',
      '/admin/gmb/posts/new' => 'route96',
    ),
  ),
  1 => 
  array (
    'DELETE' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/company\\-profile/company\\-photos/([^/]+)|/admin/dealers/([^/]+)()|/admin/gmb/posts/([^/]+)()()|/admin/gmb/reviews/([^/]+)()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route53',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          3 => 
          array (
            0 => 'route69',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          4 => 
          array (
            0 => 'route83',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
          5 => 
          array (
            0 => 'route85',
            1 => 
            array (
              'id' => 'id',
            ),
          ),
        ),
      ),
    ),
    'GET' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/google\\-my\\-business/reviews/([^/]+)/reply)$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route59',
            1 => 
            array (
              'review' => 'review',
            ),
          ),
        ),
      ),
    ),
    'POST' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/google\\-my\\-business/reviews/([^/]+)/reply/save|/google\\-my\\-business/reviews/([^/]+)/reply/edit()|/google\\-my\\-business/reviews/([^/]+)/reply/delete()()|/admin/dealers/([^/]+)/company()()())$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route60',
            1 => 
            array (
              'review' => 'review',
            ),
          ),
          3 => 
          array (
            0 => 'route61',
            1 => 
            array (
              'review' => 'review',
            ),
          ),
          4 => 
          array (
            0 => 'route62',
            1 => 
            array (
              'review' => 'review',
            ),
          ),
          5 => 
          array (
            0 => 'route70',
            1 => 
            array (
              'dealer' => 'dealer',
            ),
          ),
        ),
      ),
    ),
  ),
);