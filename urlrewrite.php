<?php
$arUrlRewrite=array (
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
