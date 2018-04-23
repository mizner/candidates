<?php

namespace HG\CandidateCore\ACF\FieldGroups;

class CTAGlobal
{
    private $prefix = 'cta';

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
            'title'                 => 'Call to action',
            'style'                 => 'default',
            'instruction_placement' => 'label',
            'label_placement'       => 'top',
            'position'              => 'normal',
            'location'              => $this->locations,
            'fields'                => $this->fields(),
            'hide_on_screen'        => $this->hide,
            'menu_order'            => 90,
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
                'label' => 'Title',
                'key'   => 'cta_title',
                'name'  => 'cta_title',
                'type'  => 'text',
            ],
            [
                'label' => 'Description',
                'key'   => 'cta_description',
                'name'  => 'cta_description',
                'type'  => 'textarea',
            ],
            [
                'label'   => '',
                'key'     => 'cta_button_message',
                'name'    => 'cta_button_message',
                'type'    => 'message',
                'message' => '<strong>Note</strong>: buttons will use the same items chosen in the the "Header" section above',
            ],
        ];
    }
}
