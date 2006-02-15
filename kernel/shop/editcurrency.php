<?php
//
// Created on: <08-Nov-2005 13:06:15 dl>
//
// Copyright (C) 1999-2005 eZ systems as. All rights reserved.
//
// This source file is part of the eZ publish (tm) Open Source Content
// Management System.
//
// This file may be distributed and/or modified under the terms of the
// "GNU General Public License" version 2 as published by the Free
// Software Foundation and appearing in the file LICENSE included in
// the packaging of this file.
//
// Licencees holding a valid "eZ publish professional licence" version 2
// may use this file in accordance with the "eZ publish professional licence"
// version 2 Agreement provided with the Software.
//
// This file is provided AS IS with NO WARRANTY OF ANY KIND, INCLUDING
// THE WARRANTY OF DESIGN, MERCHANTABILITY AND FITNESS FOR A PARTICULAR
// PURPOSE.
//
// The "eZ publish professional licence" version 2 is available at
// http://ez.no/ez_publish/licences/professional/ and in the file
// PROFESSIONAL_LICENCE included in the packaging of this file.
// For pricing of this licence please contact us via e-mail to licence@ez.no.
// Further contact information is available at http://ez.no/company/contact/.
//
// The "GNU General Public License" (GPL) is available at
// http://www.gnu.org/copyleft/gpl.html.
//
// Contact licence@ez.no if any conditions of this licencing isn't clear to
// you.
//

/*! \file editcurrency.php
*/

include_once( 'kernel/shop/classes/ezcurrencydata.php' );
include_once( 'lib/ezutils/classes/ezini.php' );

$module =& $Params['Module'];

$ini =& eZINI::instance( 'site.ini' );

$error = false;
$originalCurrencyCode =& $Params['Currency'];
$currencyParams = array( 'code' => false,
                         'symbol' => false,
                         'locale' => $ini->variable( 'RegionalSettings', 'Locale' ),
                         'custom_rate_value' => '0.0000',
                         'rate_factor' => '1.0000' );

if ( $module->isCurrentAction( 'Cancel' ) )
{
    return $module->redirectTo( $module->functionURI( 'currencylist' ) );
}
else if ( $module->isCurrentAction( 'Create' ) )
{
    if ( $module->hasActionParameter( 'CurrencyData' ) )
        $currencyParams = $module->actionParameter( 'CurrencyData' );

    if ( $errCode = eZCurrencyData::canCreate( $currencyParams['code'] ) )
    {
        $error = eZCurrencyData::errorMessage( $errCode );
    }
    else
    {
        include_once( 'kernel/shop/classes/ezshopfunctions.php' );
        eZShopFunctions::createCurrency( $currencyParams );

        include_once( 'kernel/classes/ezcontentcachemanager.php' );
        eZContentCacheManager::clearAllContentCache();

        return $module->redirectTo( $module->functionURI( 'currencylist' ) );
    }
}
else if ( $module->isCurrentAction( 'StoreChanges' ) )
{
    $originalCurrencyCode = $module->hasActionParameter( 'OriginalCurrencyCode' ) ? $module->actionParameter( 'OriginalCurrencyCode' ) : '';
    if ( $module->hasActionParameter( 'CurrencyData' ) )
        $currencyParams = $module->actionParameter( 'CurrencyData' );

    include_once( 'kernel/shop/classes/ezshopfunctions.php' );
    $errCode = eZShopFunctions::changeCurrency( $originalCurrencyCode, $currencyParams['code'] );

    if ( $errCode === EZ_CURRENCYDATA_ERROR_OK )
    {
        $currency = eZCurrencyData::fetch( $currencyParams['code'] );
        if ( is_object( $currency ) )
        {
            $currency->setAttribute( 'symbol', $currencyParams['symbol'] );
            $currency->setAttribute( 'locale', $currencyParams['locale'] );
            $currency->setAttribute( 'custom_rate_value', $currencyParams['custom_rate_value'] );
            $currency->setAttribute( 'rate_factor', $currencyParams['rate_factor'] );

            $db =& eZDB::instance();
            $db->begin();
            $currency->sync();
            $db->commit();

            include_once( 'kernel/classes/ezcontentcachemanager.php' );
            eZContentCacheManager::clearAllContentCache();

            return $module->redirectTo( $module->functionURI( 'currencylist' ) );
        }
        else
        {
            $error = eZCurrencyData::errorMessage( $currency );
        }
    }
    else
    {
        $error = eZCurrencyData::errorMessage( $errCode );
    }
}

$canEdit = true;
$pathText = '';
if ( strlen( $originalCurrencyCode ) > 0 )
{
    // going to edit existing currency
    $pathText = ezi18n( 'kernel/shop', 'Edit currency' );

    if ( $currencyParams['code'] === false )
    {
        // first time in 'edit' mode? => initialize template variables
        // with existing data.
        include_once( 'kernel/shop/classes/ezcurrencydata.php' );

        $currency = eZCurrencyData::fetch( $originalCurrencyCode );
        if ( is_object( $currency ) )
        {
            $currencyParams['code'] = $currency->attribute( 'code' );
            $currencyParams['symbol'] = $currency->attribute( 'symbol' );
            $currencyParams['locale'] = $currency->attribute( 'locale' );
            $currencyParams['custom_rate_value'] = $currency->attribute( 'custom_rate_value' );
            $currencyParams['rate_factor'] = $currency->attribute( 'rate_factor' );
        }
        else
        {
            $error = "'$originalCurrencyCode' currency  doesn't exist.";
            $canEdit = false;
        }
    }
}
else
{
    // going to create new currency
    $pathText = ezi18n( 'kernel/shop', 'Create new currency' );
}

include_once( 'kernel/common/template.php' );
$tpl =& templateInit();

$tpl->setVariable( 'error', $error );
$tpl->setVariable( 'can_edit', $canEdit );
$tpl->setVariable( 'original_currency_code', $originalCurrencyCode );
$tpl->setVariable( 'currency_data', $currencyParams );

$Result = array();
$Result['content'] =& $tpl->fetch( "design:shop/editcurrency.tpl" );
$Result['path'] = array( array( 'text' => $pathText,
                                'url' => false ) );

?>