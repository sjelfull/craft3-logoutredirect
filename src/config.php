<?php
/**
 * Logout Redirect plugin for Craft CMS 3.x
 *
 * Configure where to send users after they logout.
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

/**
 * Logout Redirect config.php
 *
 * This file exists only as a template for the Logout Redirect settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'logout-redirect.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

return [
    // Enable the redirect check
    'enabled'     => true,

    // To redirect all users after logout - this will override the two other config options
    'redirectUrl' => '',

    // To redirect CP users after logout
    'redirectCpUrl'   => '',
    
    // To redirect site users after logout
    'redirectSiteUrl' => '',

];
