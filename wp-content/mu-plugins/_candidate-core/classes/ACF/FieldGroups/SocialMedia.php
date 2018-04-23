<?php

namespace HG\CandidateCore\ACF\FieldGroups;

class SocialMedia
{
    private $prefix = 'social_media';

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
            'title'                 => 'Social Media',
            'style'                 => 'default',
            'instruction_placement' => 'label',
            'label_placement'       => 'top',
            'position'              => 'normal',
            'location'              => $this->locations,
            'fields'                => $this->fields(),
            'hide_on_screen'        => $this->hide,
            'menu_order'            => 5,
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
                'label'      => '',
                'key'        => 'social_media_items',
                'name'       => 'social_media_items',
                'type'       => 'repeater',
                'sub_fields' => [
                    [
                        'label'   => 'Network',
                        'key'     => 'network',
                        'name'    => 'network',
                        'type'    => 'select',
                        'choices' => [
                            'facebook'  => 'Facebook',
                            'twitter'   => 'Twitter',
                            'instagram' => 'Instagram',
                            'youtube'   => 'YouTube',
                        ],
                    ],
                    [
                        'label' => 'URL',
                        'key'   => 'url',
                        'name'  => 'url',
                        'type'  => 'url',
                    ],
                ],
            ],
        ];
    }
}
