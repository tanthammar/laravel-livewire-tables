<?php

return [

    'tableHeaderEnabled' => env('TABLE_HEAD_ENABLED', true),
    'tableFooterEnabled' => env('TABLE_FOOTER_ENABLED', false),
    'grouped' => env('TABLE_GROUPED', false),
    'arrow' => env('TABLE_ARROW', true),
    'tableClass' => env('TABLE_CLASS', null),
    'tbodyClass' => env('TBODY_CLASS', null),
    'tableHeaderClass' => env('TABLE_THEAD_CLASS', null),
    'tableFooterClass' => env('TABLE_TFOOT_CLASS', null),
    'trClass' => env('TABLE_TR_CLASS', 'tr'),
    'thClass' => env('TABLE_TD_CLASS', 'th'),
    'tdClass' => env('TABLE_TD_CLASS', 'td'),
    'checkbox' => env('TABLE_CHECKBOX', true),
    'checkbox_side' => env('TABLE_CHECKBOX_SIDE', 'left'),
    'per_page' => env('TABLE_PER_PAGE', 15),
    'paginationView' => env('TABLE_PAGINATION_VIEW', 'partials.rounded-pagination')
];
