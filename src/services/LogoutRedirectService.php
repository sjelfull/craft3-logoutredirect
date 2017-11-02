<?php
/**
 * Logout Redirect plugin for Craft CMS 3.x
 *
 * Configure where to send users after they logout.
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\logoutredirect\services;

use craft\web\View;
use superbig\logoutredirect\models\Settings;
use superbig\logoutredirect\LogoutRedirect;

use Craft;
use craft\base\Component;

/**
 * @author    Superbig
 * @package   LogoutRedirect
 * @since     2.0.0
 */
class LogoutRedirectService extends Component
{
    // Public Methods
    // =========================================================================

    public function maybeRedirect ()
    {
        // Restrict access if enabled and there is IPs in the whitelist
        $settings = LogoutRedirect::$plugin->getSettings();

        if ( $settings->enabled ) {
            $redirectUrl     = $settings->redirectUrl;
            $redirectCpUrl   = $settings->redirectCpUrl;
            $redirectSiteUrl = $settings->redirectSiteUrl;

            if ( !empty($redirectUrl) || !empty($redirectSiteUrl) || !empty($redirectCpUrl) ) {
                $isCpRequest   = Craft::$app->request->isCpRequest;
                $isSiteRequest = Craft::$app->request->isSiteRequest;

                if ( ($isCpRequest || $isSiteRequest) && $redirectUrl ) {
                    Craft::$app->response->redirect($redirectUrl);
                    Craft::$app->end();
                }
                else if ( $isCpRequest && $redirectCpUrl ) {
                    Craft::$app->response->redirect($redirectCpUrl);
                    Craft::$app->end();
                }
                else if ( $isSiteRequest && $redirectSiteUrl ) {
                    Craft::$app->response->redirect($redirectSiteUrl);
                    Craft::$app->end();
                }
            }
        }

    }
}