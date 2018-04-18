<?php

namespace HG\CandidateCore\ACF\FieldGroups;

class Mailchimp
{
    private $prefix = 'mailchimp';

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
            'title'                 => 'Mailchimp',
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
                'label' => 'Action URL',
                'key'   => $this->prefix('action_url'),
                'name'  => $this->prefix('action_url'),
                'type'  => 'text',
            ],
        ];
    }
}
