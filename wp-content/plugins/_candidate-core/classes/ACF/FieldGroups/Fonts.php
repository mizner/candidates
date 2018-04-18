<?php

namespace HG\CandidateCore\ACF\FieldGroups;

class Fonts
{
    private $prefix = 'fonts';

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
            'title'                 => 'Fonts',
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
                'label'         => 'Primary Font',
                'instructions'  => 'Default (used for paragraphs and most body text)',
                'key'           => $this->prefix('font_primary'),
                'name'          => 'font_primary',
                'type'          => 'radio',
                'default_value' => 'Montserrat',
                'other_choice'  => 1,
                'choices'       => [
                    'Open+Sans'   => 'Open+Sans',
                    'EB+Garamond' => 'EB+Garamond',
                    'Droid+Serif' => 'Droid+Serif',
                ],
            ],
            [
                'label'         => 'Secondary Font',
                'instructions'  => 'Headings & special areas (e.g. buttons, menu items, etc)',
                'key'           => $this->prefix('font_secondary'),
                'name'          => 'font_secondary',
                'type'          => 'radio',
                'default_value' => 'Open+Sans',
                'other_choice'  => 1,
                'choices'       => [
                    'Montserrat' => 'Montserrat',
                    'Oswald'     => 'Oswald',
                    'Slabo+27px' => 'Slabo+27px',
                    'Raleway'    => 'Raleway',
                ],
            ],
        ];
    }
}
