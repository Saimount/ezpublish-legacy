<?php
//
// Created on: <31-Jul-2002 16:47:15 bf>
//
// ## BEGIN COPYRIGHT, LICENSE AND WARRANTY NOTICE ##
// SOFTWARE NAME: eZ publish
// SOFTWARE RELEASE: 3.8.x
// COPYRIGHT NOTICE: Copyright (C) 1999-2006 eZ systems AS
// SOFTWARE LICENSE: GNU General Public License v2.0
// NOTICE: >
//   This program is free software; you can redistribute it and/or
//   modify it under the terms of version 2.0  of the GNU General
//   Public License as published by the Free Software Foundation.
//
//   This program is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU General Public License for more details.
//
//   You should have received a copy of version 2.0 of the GNU General
//   Public License along with this program; if not, write to the Free
//   Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
//   MA 02110-1301, USA.
//
//
// ## END COPYRIGHT, LICENSE AND WARRANTY NOTICE ##
//

$Module = array( "name" => "eZShop",
                 "variable_params" => true );

$ViewList = array();
$ViewList["add"] = array(
    "functions" => array( 'buy' ),
    "script" => "add.php",
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array( "ObjectID" ) );

$ViewList["orderview"] = array(
    "functions" => array( 'buy' ),
    "script" => "orderview.php",
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array( "OrderID" ) );

$ViewList["basket"] = array(
    "functions" => array( 'buy' ),
    "script" => "basket.php",
    "default_navigation_part" => 'ezmynavigationpart',
    'unordered_params' => array( 'error' => 'Error' ),
    "params" => array(  ) );

$ViewList["register"] = array(
    "functions" => array( 'buy' ),
    "script" => "register.php",
    'ui_context' => 'edit',
    "default_navigation_part" => 'ezshopnavigationpart',
    'single_post_actions' => array( 'StoreButton' => 'Store',
                                    'CancelButton' => 'Cancel'
                                    ),
    "params" => array(  ) );

$ViewList["userregister"] = array(
    "functions" => array( 'buy' ),
    "script" => "userregister.php",
    'ui_context' => 'edit',
    "default_navigation_part" => 'ezshopnavigationpart',
    'single_post_actions' => array( 'StoreButton' => 'Store',
                                    'CancelButton' => 'Cancel'
                                    )
    );

$ViewList["wishlist"] = array(
    "functions" => array( 'buy' ),
    "script" => "wishlist.php",
    "default_navigation_part" => 'ezmynavigationpart',
    'unordered_params' => array( 'offset' => 'Offset' ),
    "params" => array(  ) );

$ViewList["orderlist"] = array(
    "functions" => array( 'administrate' ),
    "script" => "orderlist.php",
    "default_navigation_part" => 'ezshopnavigationpart',
    "unordered_params" => array( "offset" => "Offset" ),
    "params" => array(  ) );

$ViewList["archivelist"] = array(
    "functions" => array( 'administrate' ),
    "script" => "archivelist.php",
    "default_navigation_part" => 'ezshopnavigationpart',
    "unordered_params" => array( "offset" => "Offset" ),
    "params" => array(  ) );

$ViewList["removeorder"] = array(
    "functions" => array( 'administrate' ),
    "script" => "removeorder.php",
    'ui_context' => 'edit',
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array() );

$ViewList["archiveorder"] = array(
    "functions" => array( 'administrate' ),
    "script" => "archiveorder.php",
    'ui_context' => 'edit',
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array() );

$ViewList["unarchiveorder"] = array(
    "functions" => array( 'administrate' ),
    "script" => "unarchiveorder.php",
    'ui_context' => 'edit',
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array() );


$ViewList["customerlist"] = array(
    "functions" => array( 'administrate' ),
    "script" => "customerlist.php",
    "default_navigation_part" => 'ezshopnavigationpart',
    "unordered_params" => array( 'offset' => 'Offset' ),
    "params" => array(  ) );

$ViewList["customerorderview"] = array(
    "functions" => array( 'administrate' ),
    "script" => "customerorderview.php",
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array( "CustomerID", "Email" ) );

$ViewList["statistics"] = array(
    "functions" => array( 'administrate' ),
    "script" => "orderstatistics.php",
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array( 'Year', 'Month' ) );

$ViewList["confirmorder"] = array(
    "functions" => array( 'buy' ),
    "script" => "confirmorder.php",
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array(  ) );

$ViewList["checkout"] = array(
    "functions" => array( 'buy' ),
    "script" => "checkout.php",
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array(  ) );

$ViewList["vattype"] = array(
    "functions" => array( 'setup' ),
    "script" => "vattype.php",
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array(  ) );

$ViewList["discountgroup"] = array(
    "functions" => array( 'setup' ),
    "script" => "discountgroup.php",
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array(  ) );

$ViewList["discountgroupedit"] = array(
    "functions" => array( 'setup' ),
    "script" => "discountgroupedit.php",
    'ui_context' => 'edit',
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array( 'DiscountGroupID' ) );

$ViewList["discountruleedit"] = array(
    "functions" => array( 'setup' ),
    "script" => "discountruleedit.php",
    'ui_context' => 'edit',
    "default_navigation_part" => 'ezshopnavigationpart',
    'post_actions' => array( 'BrowseActionName' ),
    "params" => array( 'DiscountGroupID', 'DiscountRuleID'  ) );

$ViewList["discountgroupview"] = array(
    "script" => "discountgroupmembershipview.php",
    "default_navigation_part" => 'ezshopnavigationpart',
    'post_actions' => array( 'BrowseActionName' ),
    "params" => array( 'DiscountGroupID' ) );

$ViewList['status'] = array(
    "functions" => array( 'edit_status' ),
    "script" => 'status.php',
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array(  ) );

$ViewList['setstatus'] = array(
    "functions" => array( 'setstatus' ),
    "script" => 'setstatus.php',
    "default_navigation_part" => 'ezshopnavigationpart',
    "params" => array(  ) );

$ViewList['currencylist'] = array(
    'script' => 'currencylist.php',
    'default_navigation_part' => 'ezshopnavigationpart',
    'unordered_params' => array( 'offset' => 'Offset' ),
    'single_post_actions' => array( 'AddCurrencyButton' => 'AddCurrency',
                                    'RemoveCurrencyButton' => 'RemoveCurrency',
                                    'SetRatesButton' => 'SetRates',
                                    'UpdateStatusButton' => 'UpdateStatus' ),
    'post_action_parameters' => array( 'RemoveCurrency' => array( 'DeleteCurrencyList' => 'DeleteCurrencyList' ),
                                       'SetRates' => array( 'CurrencyList' => 'CurrencyList',
                                                            'Offset' => 'Offset' ),
                                       'UpdateStatus' => array( 'CurrencyList' => 'CurrencyList',
                                                                'Offset' => 'Offset' ) ),
    'params' => array(  ) );

$ViewList['editcurrency'] = array(
    'script' => 'editcurrency.php',
    'default_navigation_part' => 'ezshopnavigationpart',
    'single_post_actions' => array( 'CancelButton' => 'Cancel',
                                    'CreateButton' => 'Create',
                                    'StoreChangesButton' => 'StoreChanges' ),
    'post_action_parameters' => array( 'Create' => array( 'CurrencyData' => 'CurrencyData' ),
                                       'StoreChanges' => array( 'CurrencyData' => 'CurrencyData',
                                                                'OriginalCurrencyCode' => 'OriginalCurrencyCode' ) ),
    'params' => array(),
    'unordered_params' => array( 'currency' => 'Currency' ) );

$ViewList['preferredcurrency'] = array(
    'script' => 'preferredcurrency.php',
    'default_navigation_part' => 'ezshopnavigationpart',
    'params' => array(  ) );

$ViewList['productsoverview'] = array(
    'script' => 'productsoverview.php',
    'default_navigation_part' => 'ezshopnavigationpart',
    'single_post_actions' => array( 'ShowProductsButton' => 'ShowProducts',
                                    'SortButton' => 'Sort' ),
    'post_action_parameters' => array( 'ShowProducts' => array( 'ProductClass' => 'ProductClass' ),
                                       'Sort' => array( 'ProductClass' => 'ProductClass',
                                                        'SortingField' => 'SortingField',
                                                        'SortingOrder' => 'SortingOrder' ) ),
    'params' => array(),
    'unordered_params' => array( 'product_class' => 'ProductClass',
                                 'offset' => 'Offset' ) );


$ViewList['setpreferredcurrency'] = array(
    'script' => 'setpreferredcurrency.php',
    'default_navigation_part' => 'ezshopnavigationpart',
    'single_post_actions' => array( 'SetButton' => 'Set' ),
    'post_action_parameters' => array( 'Set' => array( 'Currency' => 'Currency' ) ),
    'unordered_params' => array( 'currency' => 'Currency' ),
    'params' => array(  ) );

$FromStatus = array(
    'name' => 'FromStatus',
    'values' => array(),
    'path' => 'classes/',
    'file' => 'ezorderstatus.php',
    'class' => 'eZOrderStatus',
    'function' => 'fetchPolicyList',
    'parameter' => array( false ) );

$ToStatus = array(
    'name' => 'ToStatus',
    'values' => array(),
    'path' => 'classes/',
    'file' => 'ezorderstatus.php',
    'class' => 'eZOrderStatus',
    'function' => 'fetchPolicyList',
    'parameter' => array( false ) );

$FunctionList['setup'] = array( );
$FunctionList['administrate'] = array( );
$FunctionList['buy'] = array( );
$FunctionList['edit_status'] = array( );
$FunctionList['setstatus'] = array( 'FromStatus' => $FromStatus,
                                    'ToStatus' => $ToStatus );

?>
