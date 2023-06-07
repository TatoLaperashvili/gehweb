<?php
return [
    'id' => 1,
    'type' => 1,
    'name' => 'main_banner',
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'data-icon' => "-",
                'reqired' => 'required',
                'max' => '100',
                'min' => '3',
                'name' => 'title',
                'translateble' => true,
    
            ],
            'Redairect_link' => [
                'type' => 'text',
            ],
            'desc' => [
                'type' => 'text',
                'data-icon' => "-",
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'location' => [
                'type' => 'text'
            ],
           
            'active' => [
                'type' => 'checkbox',
            ],
         
        ],

        'nonTrans' => [
          
            'rank_stars' => [
                'type' => 'text'
            ],
            'images' => [
                'type' => 'images',

            ],
            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20',
                'placeholder' => 'sdf'
            ],
        ]



    ]

];
