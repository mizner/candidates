<?php

namespace HG\CandidateCore\ACF\FieldGroups;

class ActBlue
{
    private $prefix = 'act_blue';

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
            'title'                 => 'Act Blue Support',
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
                'label'         => 'Title',
                'key'           => $this->prefix('title'),
                'name'          => 'title',
                'type'          => 'text',
                'default_value' => '<strong>Support</strong> our campaign',
            ],
	        [
		        'label'         => 'Description',
		        'key'           => $this->prefix('description'),
		        'name'          => 'description',
		        'type'          => 'textarea',
	        ],
            [
                'label'         => 'Contribution form name',
                'instructions'  => '(e.g. https://secure.actblue.com/contribute/page/FORM_NAME)',
                'key'           => $this->prefix('form_name'),
                'name'          => 'form_name',
                'type'          => 'text',
            ],
            [
                'label'         => 'Amounts',
                'instructions'  => 'Comma Separated List with No Spaces e.g.(15,25,35,50)',
                'key'           => $this->prefix('amounts'),
                'name'          => 'amounts',
                'type'          => 'text',
                'default_value' => '5,15,25,50',
            ],
        ];
    }
}
