<?php

namespace HG\CandidateCore\ACF\FieldGroups;

class Colors
{
    private $prefix = 'colors';

    private $locations = [
        [
            [
                'param'    => 'options_page',
                'operator' => '==',
                'value'    => 'acf-options-site-globals',
            ],
        ],
    ];

    private $hide = [
    ];

    public static function init()
    {
        $class = new self;
        add_action('acf/init', [$class, 'register']);
    }

    public function register()
    {
        acf_add_local_field_group($this->fieldGroup());
    }

    private function fieldGroup()
    {
        return [
            'key'                   => $this->prefix,
            'title'                 => 'Colors',
            'style'                 => 'default',
            'instruction_placement' => 'label',
            'label_placement'       => 'top',
            'position'              => 'side',
            'location'              => $this->locations,
            'fields'                => $this->fields(),
            'hide_on_screen'        => $this->hide,
            'menu_order'            => 10,
        ];
    }

    private function prefix($field = '')
    {
        return "{$this->prefix}_{$field}";
    }

    private function fields()
    {
        return [
            [
                'label'         => 'Primary Color',
                'key'           => $this->prefix('color_primary'),
                'name'          => 'color_primary',
                'type'          => 'color_picker',
                'default_value' => '#002D40',
            ],
            [
                'label'         => 'Secondary Color',
                'key'           => $this->prefix('color_secondary'),
                'name'          => 'color_secondary',
                'type'          => 'color_picker',
                'default_value' => '#CC0000',
            ],
        ];
    }
}
