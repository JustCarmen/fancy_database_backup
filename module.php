<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2017 webtrees development team
 * Copyright (C) 2017 JustCarmen
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace JustCarmen\WebtreesAddOns\FancyDatabaseBackup;

use Composer\Autoload\ClassLoader;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleConfigInterface;
use JustCarmen\WebtreesAddOns\FancyDatabaseBackup\Template\AdminTemplate;

class FancyDatabaseBackupModule extends AbstractModule implements ModuleConfigInterface {

	const CUSTOM_VERSION	 = '1.7.9.2';
	const CUSTOM_WEBSITE	 = 'http://www.justcarmen.nl/fancy-modules/fancy-database-backup/';

	public function __construct() {
		parent::__construct('fancy_database_backup');

		// register the namespaces
		$loader = new ClassLoader();
		$loader->addPsr4('JustCarmen\\WebtreesAddOns\\FancyDatabaseBackup\\', WT_MODULES_DIR . $this->getName() . '/app');
		$loader->register();
	}

	// Extend class Module
	public function getTitle() {
		return /* I18N: Name of a module/sidebar */ I18N::translate('Fancy Database Backup');
	}

	// Extend class Module
	public function getDescription() {
		return I18N::translate('Provides access to MySQLDumper. A database backup tool.');
	}

	// Extend Module
	public function modAction($mod_action) {
		switch ($mod_action) {
			case 'admin':
				$template = new AdminTemplate;
				return $template->pageContent();
			default:
				http_response_code(404);
				break;
		}
	}

	// Implement ModuleConfigInterface
	public function getConfigLink() {
		return 'module.php?mod=' . $this->getName() . '&amp;mod_action=admin';
	}

}

return new FancyDatabaseBackupModule;
