<?php

return [
    'dmSubscribe' => [
        'file' => 'dmsubscribe',
        'description' => 'DashaMail hook snippet for subscription',
        'properties' => [
        ],
    ],
	'dmCheckbox' => [
        'file' => 'dmcheckbox',
        'description' => 'Snippet returns subscription confirmation checkbox, view can be customized',
        'properties' => [
            'tpl' => [
                'type' => 'textfield',
                'value' => 'dmCheckboxTpl',
            ],
        ]    
    ],
];