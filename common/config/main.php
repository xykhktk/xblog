<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'test' => [
            'class' => 'common\components\Test',
            'name' => 'xyk',
            'favor' => 'yii2',
            'test' => 'a'
        ]
    ],
];
