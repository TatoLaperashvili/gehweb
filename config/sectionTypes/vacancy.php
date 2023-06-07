<?php
return [
    'id' => 6,
    'type' => 6,
    'folder' => 'vacancy',
    'class' => 'about-page-section_00 vacancypage-section_00',
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
            'field_of_employment' => [
                'type' => 'text'
            ],
            'Requirements' => [
                'type' => 'keywords'
            ],
            'file' => [
                'type' => 'file'
            ],
            'adress' => [
                'type' => 'text'
            ],
            'workin_hours' => [
                'type' => 'text'
            ],
            'position' => [
                'type' => 'text'
            ],
            'daily_pay' => [
                'type' => 'text'
            ],
            'Vacant_place' => [
                'type' => 'text'
            ],
            'active' => [
                'type' => 'checkbox',
            ],
        ],
        'nonTrans' => [
          
           
			'images' => [
                'type' => 'images',

            ],
            'start_date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20'
            ],
            'end_date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20'
            ],
              'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20'
            ],
        ],
    ]
];
