# Code Field Changelog

All notable changes to this project will be documented in this file.

## 4.0.6 - 2022.12.13
### Changed
* Added `__toString()` method to the `CodeData` class so that `{{ entry.codeField }}` will work without needing to add `.value` ([#3](https://github.com/nystudio107/craft-code-field/issues/3))

## 4.0.5 - 2022.12.07
### Changed
* Cleaned up the formatting of the Code Field field title

## 4.0.4 - 2022.11.30
### Changed
* Wrap the fields in `<fieldset>` tags if the language selector is visible
* Remove the odd Craft `modifiedAttributes` styling when a field value is changed ([#12403](https://github.com/craftcms/cms/issues/12403))

## 4.0.3 - 2022.11.16
### Added
* Added GraphQL support ([#2](https://github.com/nystudio107/craft-code-field/issues/2))

## 4.0.2 - 2022.11.04
### Added
* Added **Auto** as the default theme setting, which automatically sets the theme to match the browser's dark mode setting

## 4.0.1 - 2022-11-03
### Fixed
* Fixed an issue where changes to the Language selector were not saved with the Code Field

## 4.0.0 - 2022-11-03
### Added
- Initial release
