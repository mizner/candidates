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
	        // CTA Global Tab
	        [
		        'label' => 'Site CTA',
		        'key'   => 'global_cta_tab',
		        'name'  => 'global_cta_tab',
		        'type'  => 'tab',
	        ],
	        // CTA Global Title
            [
                'label' => 'Title',
                'key'   => 'cta_title',
                'name'  => 'cta_title',
                'type'  => 'text',
            ],
	        // CTA Global Description
            [
                'label' => 'Description',
                'key'   => 'cta_description',
                'name'  => 'cta_description',
                'type'  => 'textarea',
            ],
	        // CTA Global Button Message
            [
                'label'   => '',
                'key'     => 'cta_button_message',
                'name'    => 'cta_button_message',
                'type'    => 'message',
                'message' => '<strong>Note</strong>: buttons will use the same items chosen in the the "Header" section above',
            ],

	        // CTA Inner Page Tab
	        [
		        'label' => 'Contact CTA',
		        'key'   => 'contact_cta_tab',
		        'name'  => 'contact_cta_tab',
		        'type'  => 'tab',
	        ],
	        // CTA Inner Page Title
	        [
		        'label' => 'Title',
		        'key'   => 'contact_cta_title',
		        'name'  => 'contact_cta_title',
		        'type'  => 'text',
	        ],
	        // CTA Inner Page Description
//	        [
//		        'label' => 'Description',
//		        'key'   => 'contact_cta_description',
//		        'name'  => 'contact_cta_description',
//		        'type'  => 'textarea',
//	        ],
	        // Contact First Button
//	        [
//		        'label' => 'Button',
//		        'key'   => 'contact_cta_button1',
//		        'name'  => 'contact_cta_button1',
//		        'type'  => 'link',
//	        ],
        ];
    }
}
