<?php

namespace inquid\gas;

/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 8/06/18
 * Time: 03:00 PM
 */


use yii\base\Widget;
use yii\bootstrap\Tabs;

class GasNoelWidget extends Widget
{
    public function init()
    {

    }

    public function run()
    {
        return Tabs::widget([
            'items' => [
                [
                    'label' => 'One',
                    'content' => 'Anim pariatur cliche...',
                    'active' => true
                ],
                [
                    'label' => 'Two',
                    'content' => 'Anim pariatur cliche...',
                    'headerOptions' => [],
                    'options' => ['id' => 'myveryownID'],
                ],
                [
                    'label' => 'Dropdown',
                    'items' => [
                        [
                            'label' => 'DropdownA',
                            'content' => 'DropdownA, Anim pariatur cliche...',
                        ],
                        [
                            'label' => 'DropdownB',
                            'content' => 'DropdownB, Anim pariatur cliche...',
                        ],
                        [
                            'label' => 'External Link',
                            'url' => 'http://www.example.com',
                        ],
                    ],
                ],
                [
                    'label' => 'Example',
                    'url' => 'http://www.example.com',
                ],
            ],
        ]);
    }
}
