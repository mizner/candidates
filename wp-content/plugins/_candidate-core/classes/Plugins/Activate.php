<?php

namespace HG\CandidateCore\Plugins;

class Activate
{
    private $activePlugins;
    private $installedPlugins;

    public static function init()
    {
        $class = new self();
        add_action('admin_init', [$class, 'run']);
    }

    public function run()
    {
        $this->activePlugins    = get_option('active_plugins');
        $this->installedPlugins = array_keys(get_plugins());
        $this->forcePluginsActivation();
    }

    private function forcePluginsActivation()
    {
        foreach ($this->installedPlugins as $plugin) {
            if (in_array($plugin, $this->activePlugins)) {
                continue;
            }
            $result = activate_plugin($plugin);
            if ($result) {
                error_log('error in auto activating: '.$plugin);
            }
        }
    }
}
