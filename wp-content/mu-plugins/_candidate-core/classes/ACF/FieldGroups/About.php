<?php

namespace HG\CandidateCore\ACF\FieldGroups;

class About
{
    private $prefix = 'about';

    private $locations = [
        [
            [
                'param'    => 'page_template',
                'operator' => '==',
                'value'    => 'page-templates/about.php',
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

    private function fields()
    {
        return [
            [
                'label'        => 'Bio',
                'key'          => 'about_bio',
                'name'         => 'about_bio',
                'type'         => 'wysiwyg',
                'toolbar'      => 'basic',
                'media_upload' => 0,
                'delay'        => 1,
            ],
        ];
    }
}
