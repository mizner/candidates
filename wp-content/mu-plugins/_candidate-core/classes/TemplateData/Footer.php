<?php

namespace HG\CandidateCore\TemplateData;

use HG\CandidateCore\ACF\Options\SiteGlobal;
use HG\CandidateCore\Utils\Fallback;
use HG\CandidateCore\Utils\Meta;
use HG\CandidateCore\Utils\Esc;

class Footer
{

    private static $prefix = SiteGlobal::SLUG.'_';

    public $copyright;

    public function __construct()
    {
        $this->copyright = $this->copyright();
    }

    public function copyright()
    {
        $content = get_option(self::$prefix.'copyright') ?: Fallback::paragraph();
        $content = str_replace('%%year%%', date('Y'), $content);

        return $content;
    }
}