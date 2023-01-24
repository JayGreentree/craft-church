<?php

$vendorDir = dirname(__DIR__);
$rootDir = dirname(dirname(__DIR__));

return array (
  'craftcms/ckeditor' => 
  array (
    'class' => 'craft\\ckeditor\\Plugin',
    'basePath' => $vendorDir . '/craftcms/ckeditor/src',
    'handle' => 'ckeditor',
    'aliases' => 
    array (
      '@craft/ckeditor' => $vendorDir . '/craftcms/ckeditor/src',
    ),
    'name' => 'CKEditor',
    'version' => '2.0.0',
    'description' => 'Edit rich text content in Craft CMS using CKEditor.',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/ckeditor/blob/master/README.md',
  ),
  'nystudio107/craft-code-field' => 
  array (
    'class' => 'nystudio107\\codefield\\CodeField',
    'basePath' => $vendorDir . '/nystudio107/craft-code-field/src',
    'handle' => 'codefield',
    'aliases' => 
    array (
      '@nystudio107/codefield' => $vendorDir . '/nystudio107/craft-code-field/src',
    ),
    'name' => 'Code Field',
    'version' => '4.0.6',
    'description' => 'Provides a Code Field that has a full-featured code editor with syntax highlighting & autocomplete',
    'developer' => 'nystudio107',
    'developerUrl' => 'https://nystudio107.com',
    'documentationUrl' => 'https://github.com/nystudio107/craft-code-field/blob/v3/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/nystudio107/craft-code-field/v3/CHANGELOG.md',
  ),
  'mmikkel/cp-clearcache' => 
  array (
    'class' => 'mmikkel\\cpclearcache\\CpClearCache',
    'basePath' => $vendorDir . '/mmikkel/cp-clearcache/src',
    'handle' => 'cp-clearcache',
    'aliases' => 
    array (
      '@mmikkel/cpclearcache' => $vendorDir . '/mmikkel/cp-clearcache/src',
    ),
    'name' => 'CP Clear Cache',
    'version' => '1.3.0',
    'schemaVersion' => '1.0.0',
    'description' => 'Less clickin’ to get clearin’',
    'developer' => 'Mats Mikkel Rummelhoff',
    'developerUrl' => 'https://vaersaagod.no',
    'documentationUrl' => 'https://github.com/mmikkel/CpClearCache-Craft/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/mmikkel/CpClearCache-Craft/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
  ),
);
