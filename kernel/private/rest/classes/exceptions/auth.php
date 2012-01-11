<?php
/**
 * File containing the ezpOauthRequiredException class.
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 * @package kernel
 */

/**
 * This is the base exception for responsenses need authentication.
 *
 * @package oauth
 */
abstract class ezpOauthRequiredException extends ezpOauthException
{
    public function __construct( $message )
    {
        parent::__construct( $message );
    }
}
?>