<?php

/**
 * @link http://www.diemeisterei.de
 * @copyright Copyright (c) 2019 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ostendisorg\cookieconsent\assets;

use yii\web\AssetBundle;

class CookieConsentJSAsset extends AssetBundle
{
    public $sourcePath = __DIR__;

    public $js = [
        'js/' . (YII_ENV_PROD ? 'cookie-consent.min.js' : 'cookie-consent.js'),
    ];
}
