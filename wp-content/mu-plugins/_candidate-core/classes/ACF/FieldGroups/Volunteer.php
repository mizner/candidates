<?php

namespace HG\CandidateCore\ACF\FieldGroups;

class Volunteer
{
    private $prefix = 'volunteer';

    private $locations = [
        [
            [
                'param'    => 'page_template',
                'operator' => '==',
                'value'    => 'page-templates/volunteer.php',
            ],
        ],
    ];

    private $hide = [
        0 => 'the_content',
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
            'title'                 => 'Fields',
            'style'                 => 'default',
            'instruction_placement' => 'label',
            'label_placement'       => 'top',
            'position'              => 'normal',
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
            // Volunteer Title
            [
                'label' => 'Subtitle',
                'key'   => 'volunteer_subtitle',
                'name'  => 'volunteer_subtitle',
                'type'  => 'text',
            ],
            // Volunteer Description
            [
                'label'        => 'Description',
                'key'          => 'volunteer_description',
                'name'         => 'volunteer_description',
                'type'         => 'wysiwyg',
                'toolbar'      => 'basic',
                'media_upload' => 0,
                'delay'        => 1,
            ],
            // Volunteer Form
            [
                'label' => 'Mail Chimp Form',
                'key'   => 'volunteer_form',
                'name'  => 'volunteer_form',
                'type'  => 'textarea',
            ],
        ];
    }
}
