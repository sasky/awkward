<?php
require_once('_config_server.php');
global $project;
$project = 'awkward';
i18n::set_locale('en_GB');


Config::inst()->update('SiteTree', 'nested_urls', true);
Config::inst()->update('SSViewer', 'theme', 'akward');