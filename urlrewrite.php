<?php
$arUrlRewrite=array (
  2 => 
  array (
    'CONDITION' => '#^/articles/(.+)/(\\\\?(.*))?#',
    'RULE' => 'ELEMENT_CODE=$1&$2',
    'ID' => '',
    'PATH' => '/articles/detail.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/services/(.+)/(\\\\?(.*))?#',
    'RULE' => 'ELEMENT_CODE=$1&$2',
    'ID' => '',
    'PATH' => '/services/detail.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/catalog/(.+)/(\\\\?(.*))?#',
    'RULE' => 'ID=$1&$2',
    'ID' => '',
    'PATH' => '/catalog/detail.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
