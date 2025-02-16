<?php

return [
    'dmMsOrderUserSubscribe' => [
        'file' => 'dashaMailMsOrderUserSubscribe',
        'description' => 'Plugin gets user from minishop2 order data and sends to DashaMail subscription list',
        'events' => [
            'msOnCreateOrder' => [],
        ],
    ],

];	