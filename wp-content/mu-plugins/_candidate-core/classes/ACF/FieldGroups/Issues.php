<?php

namespace HG\CandidateCore\ACF\FieldGroups;

class Issues
{
    private $prefix = 'issues';

    private $locations = [
        [
            [
                'param'    => 'page_template',
                'operator' => '==',
                'value'    => 'page-templates/issues.php',
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
	        // Issues Content Image
	        [
		        'label' => 'Content Image',
		        'key'   => 'issues_content_image',
		        'name'  => 'issues_content_image',
		        'type'  => 'image',
	        ],
            [
                'label'      => 'Items',
                'key'        => 'issues_items',
                'name'       => 'issues_items',
                'type'       => 'repeater',
                'layout'     => 'block',
                'sub_fields' => [
                    [
                        'label' => 'Title',
                        'key'   => 'issues_items_title',
                        'name'  => 'title',
                        'type'  => 'text',
                    ],
                    [
                        'label'        => 'Content',
                        'key'          => 'issues_items_content',
                        'name'         => 'content',
                        'type'         => 'wysiwyg',
                        'toolbar'      => 'basic',
                        'media_upload' => 0,
                        'delay'        => 1,
                    ],
                ],
            ],
        ];
    }
}
