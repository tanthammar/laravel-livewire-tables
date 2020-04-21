<?php

return [

    'tableHeaderEnabled' => env('TABLE_HEAD_ENABLED', true),
    'tableFooterEnabled' => env('TABLE_FOOTER_ENABLED', false),
    'grouped' => env('TABLE_GROUPED', false),
    'arrow' => env('TABLE_ARROW', true),
    'tableClass' => env('TABLE_CLASS', 'md:bg-gray-300 min-w-full md:table'),
    'tbodyClass' => env('TABLE_TBODY_CLASS', 'md:table-row-group'),
    'tableHeaderClass' => env('TABLE_THEAD_CLASS', 'hidden md:table-row-group'),
    'tableFooterClass' => env('TABLE_TFOOT_CLASS', 'hidden md:table-row-group'),
    'trClass' => env('TABLE_TR_CLASS', 'md:table-row relative grid grid-cols-1 gap-2 sm:grid-cols-2 leading-5 bg-white full-width border rounded my-2 p-4 text-gray-500 text-sm'),
    'theadTrClass' => env('TABLE_THEAD_TR_CLASS', 'table-row bg-gray-50 h-8 border-b border-gray-200'),
    'thClass' => env('TABLE_TD_CLASS', 'first:pl-4 last:pr-0 table-cell py-3 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider'),
    'tdClass' => env('TABLE_TD_CLASS', 'align-middle flex items-center lg:first:pl-6 lg:last:pr-6 md:first:pl-4 md:last:pr-4 md:table-cell whitespace-normal'),
    'checkbox' => env('TABLE_CHECKBOX', true),
    'checkbox_side' => env('TABLE_CHECKBOX_SIDE', 'left'),
    'per_page' => env('TABLE_PER_PAGE', 15),
    'paginationView' => env('TABLE_PAGINATION_VIEW', 'partials.rounded-pagination')
];
