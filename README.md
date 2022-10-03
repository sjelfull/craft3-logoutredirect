# Logout Redirect plugin for Craft CMS 3.x

Configure where to send users after they logout.

![Icon](resources/img/icon.png)

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require superbig/craft3-logoutredirect

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Logout Redirect.
4. Create a configuration file named `logout-redirect.php` in the Craft config directory, usually `config`.

## Configuring Logout Redirect

```php
<?php
return [
    // Enable the redirect check
    'enabled' => true,
    
    // To redirect all users after logout - this will override the two other config options
    'redirectUrl' => '/goodbye',
    
    // To redirect CP users after logout
    'redirectCpUrl'   => '/cp-goodbye',
    
    // To redirect site users after logout
    'redirectSiteUrl' => '/goodbye',
];
```

Brought to you by [Superbig](https://superbig.co)
