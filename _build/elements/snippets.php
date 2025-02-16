<?php

return [
    'dmSubscribe' => [
        'file' => 'dashamailsubscribe',
        'description' => 'DashaMail hook snippet for subscription',
        'properties' => [
            'tpl' => [
                'type' => 'textfield',
                'value' => 'tpl.DashaMail.item',
            ],
            'sortby' => [
                'type' => 'textfield',
                'value' => 'name',
            ],
            'sortdir' => [
                'type' => 'list',
                'options' => [
                    ['text' => 'ASC', 'value' => 'ASC'],
                    ['text' => 'DESC', 'value' => 'DESC'],
                ],
                'value' => 'ASC',
            ],
            'limit' => [
                'type' => 'numberfield',
                'value' => 10,
            ],
            'outputSeparator' => [
                'type' => 'textfield',
                'value' => "\n",
            ],
            'toPlaceholder' => [
                'type' => 'combo-boolean',
                'value' => false,
            ],
        ],
    ],
	'dmCheckbox' => [
        'file' => 'dmCheckbox',
        'description' => '',
        
    ],
];