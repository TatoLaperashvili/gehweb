<?php
return [
    'id' => 3,
    'type' => 3,
    'folder' => 'programs',
    'class' => 'about-page-section_00 vacancypage-section_00',
	'paginate' => 16,
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'data-icon' => "-",
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'slug' => [
                'type' => 'text',
                'error_msg' => 'slug_is_required',
                'data-icon' => '-',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'desc' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'data-icon' => '-',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'active' => [
                'type' => 'checkbox',
            ],
            'field_of_employment' => [
                'type' => 'text'
            ],
            'Requirements' => [
                'type' => 'keywords'
            ],
            'file' => [
                'type' => 'file'
            ],
            'Duration' => [
                'type' => 'text'
            ]
        ],
        'nonTrans' => [
            'images' => [
                'type' => 'images'
            ],
        
            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20'
            ],
        ],
    ]
];
