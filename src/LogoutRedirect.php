<?php
/**
 * Logout Redirect plugin for Craft CMS 3.x
 *
 * Configure where to send users after they logout.
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\logoutredirect;

use superbig\logoutredirect\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use superbig\logoutredirect\services\LogoutRedirectService;
use yii\base\Event;
use yii\web\User;
use yii\web\UserEvent;

/**
 * Class LogoutRedirect
 *
 * @author    Superbig
 * @package   LogoutRedirect
 * @since     2.0.0
 *
 * @property Settings              $settings
 * @property LogoutRedirectService $logoutRedirectService
 * @method   Settings getSettings()
 *
 */
class LogoutRedirect extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var LogoutRedirect
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init ()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            User::class,
            User::EVENT_AFTER_LOGOUT,
            function (UserEvent $event) {
                $this->logoutRedirectService->maybeRedirect();
            }
        );

        Craft::info(
            Craft::t(
                'logout-redirect',
                '{name} plugin loaded',
                [ 'name' => $this->name ]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel ()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml (): string
    {
        return Craft::$app->view->renderTemplate(
            'logout-redirect/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
