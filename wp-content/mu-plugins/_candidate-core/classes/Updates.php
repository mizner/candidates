<?php

namespace HG\CandidateCore;

class Updates
{
    public static function init()
    {
        $class = new self;
        add_filter('plugins_api', [$class, 'pluginInfo'], 20, 3);
        add_filter('site_transient_update_plugins', [$class, 'pushUpdate']);
        add_action('upgrader_process_complete', [$class, 'afterUpdate'], 10, 2);
    }

    /*
     * $res contains information for plugins with custom update server
     * $action 'plugin_information'
     * $args stdClass Object ( [slug] => woocommerce [is_ssl] => [fields] => Array ( [banners] => 1 [reviews] => 1 [downloaded] => [active_installs] => 1 ) [per_page] => 24 [locale] => en_US )
     */
    public function pluginInfo($res, $action, $args)
    {
        // do nothing if this is not about getting plugin information
        if ($action !== 'plugin_information') {
            return false;
        }

        // do nothing if it is not our plugin
        if ('_candidate-core' !== $args->slug) {
            return $res;
        }

        // trying to get from cache first, to disable cache comment 18,28,29,30,32
        if (false == $remote = get_transient('hg_upgrade_candidate_core')) {
            // info.json is the file with the actual plugin information on your server
            $remote = wp_remote_get(
                'https://YOUR_WEBSITE/SOME_PATH/info.json',
                [
                    'timeout' => 10,
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                ]
            );

            if (!is_wp_error($remote) &&
                isset($remote['response']['code']) &&
                $remote['response']['code'] == 200 &&
                !empty($remote['body'])) {
                set_transient('hg_upgrade_candidate_core', $remote, 43200); // 12 hours cache
            }

        }

        if ($remote) {
            $remote              = json_decode($remote['body']);
            $res                 = (object)[];
            $res->name           = $remote->name;
            $res->slug           = '_candidate-core';
            $res->version        = $remote->version;
            $res->tested         = $remote->tested;
            $res->requires       = $remote->requires;
            $res->author         = '<a href="https://rudrastyh.com">Misha Rudrastyh</a>';
            $res->author_profile = 'https://profiles.wordpress.org/rudrastyh'; // WordPress.org profile
            $res->download_link  = $remote->download_url;
            $res->trunk          = $remote->download_url;
            $res->last_updated   = $remote->last_updated;
            $res->sections       = [
                'description'  => $remote->sections->description, // description tab
                'installation' => $remote->sections->installation, // installation tab
                'changelog'    => $remote->sections->changelog, // changelog tab
                // you can add your custom sections (tabs) here
            ];

            // in case you want the screenshots tab, use the following HTML format for its content:
            // <ol><li><a href="IMG_URL" target="_blank"><img src="IMG_URL" alt="CAPTION" /></a><p>CAPTION</p></li></ol>
            if (!empty($remote->sections->screenshots)) {
                $res->sections['screenshots'] = $remote->sections->screenshots;
            }

            $res->banners = [
                'low'  => 'https://YOUR_WEBSITE/banner-772x250.jpg',
                'high' => 'https://YOUR_WEBSITE/banner-1544x500.jpg',
            ];
            return $res;

        }
        return false;
    }

    public function pushUpdate($transient)
    {

        if (empty($transient->checked)) {
            return $transient;
        }

        // trying to get from cache first, to disable cache comment 10,20,21,22,24
        if (false == $remote = get_transient('hg_upgrade_candidate-core')) {
            // info.json is the file with the actual plugin information on your server
            $remote = wp_remote_get(
                'https://YOUR_WEBSITE/SOME_PATH/info.json',
                [
                    'timeout' => 10,
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                ]
            );

            if (!is_wp_error($remote) &&
                isset($remote['response']['code']) &&
                $remote['response']['code'] == 200 && !empty($remote['body'])) {
                set_transient('hg_upgrade_candidate_core', $remote, 43200); // 12 hours cache
            }

        }

        if ($remote) {

            $remote = json_decode($remote['body']);

            // your installed plugin version should be on the line below! You can obtain it dynamically of course
            if ($remote &&
                version_compare('1.0', $remote->version, '<') &&
                version_compare($remote->requires, get_bloginfo('version'), '<')) {
                $res         = (object)[];
                $res->slug   = '_candidate-core';
                $res->plugin = '_candidate-core/_candidate-core.php';
                // it could be just YOUR_PLUGIN_SLUG.php if your plugin doesn't have its own directory
                $res->new_version                  = $remote->version;
                $res->tested                       = $remote->tested;
                $res->package                      = $remote->download_url;
                $res->url                          = $remote->homepage;
                $transient->response[$res->plugin] = $res;
                //$transient->checked[$res->plugin] = $remote->version;
            }

        }
        return $transient;
    }

    public function afterUpdate($upgrader_object, $options)
    {
        if ($options['action'] == 'update' &&
            $options['type'] === 'plugin') {
            // just clean the cache when new plugin version is installed
            delete_transient('hg_upgrade_candidate_core');
        }
    }
}