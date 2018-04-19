<?php

namespace HG\CandidateCore\ACF\FieldGroups;

class FrontPage
{
    private $prefix = 'frontpage';

    private $locations = [
        [
            [
                'param'    => 'page_template',
                'operator' => '==',
                'value'    => 'page-templates/front-page.php',
            ],
        ],
    ];

    private $hide = [
        0 => 'the_content'
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
            'title'                 => 'Front Page',
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
            [
                'label'        => 'Hero Image',
                'key'          => 'hero_image',
                'name'         => 'hero_image',
                'type'         => 'image',
            ],
            [
                'label'        => 'Title',
                'key'          => 'about_title',
                'name'         => 'about_title',
                'type'         => 'text',
            ],
            [
                'label'        => 'Description',
                'key'          => 'about_description',
                'name'         => 'about_description',
                'type'         => 'wysiwyg',
                'toolbar'      => 'basic',
                'media_upload' => 0,
                'delay'        => 1,
            ],
        ];
    }
}
