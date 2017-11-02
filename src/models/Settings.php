<?php
/**
 * Logout Redirect plugin for Craft CMS 3.x
 *
 * Configure where to send users after they logout.
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\logoutredirect\models;

use superbig\logoutredirect\LogoutRedirect;

use Craft;
use craft\base\Model;

/**
 * @author    Superbig
 * @package   LogoutRedirect
 * @since     2.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Enable the redirect check
     *
     * @var string
     */
    public $enabled = false;

    /**
     * Redirect in all contexts after logout
     *
     * @var string
     */
    public $redirectUrl = '';


    /**
     * Redirect after control panel logout
     *
     * @var string
     */
    public $redirectCpUrl = '';


    /**
     * Redirect after site logout
     *
     * @var string
     */
    public $redirectSiteUrl = '';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules ()
    {
        return [
            [ 'enabled', 'boolean' ],
            [ 'enabled', 'default', 'value' => false ],

            [ 'redirectUrl', 'string' ],
            [ 'redirectUrl', 'default', 'value' => '' ],

            [ 'redirectCpUrl', 'string' ],
            [ 'redirectCpUrl', 'default', 'value' => '' ],

            [ 'redirectSiteUrl', 'string' ],
            [ 'redirectSiteUrl', 'default', 'value' => '' ],
        ];
    }
}
