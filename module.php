<?php
namespace Fisharebest\Webtrees;

/**
 * webtrees: online genealogy
 * Copyright (C) 2015 webtrees development team
 * Copyright (C) 2015 JustCarmen
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

use Zend_Translate;

class FancyDatabaseBackupModule extends Module implements ModuleConfigInterface {

	public function __construct() {
		parent::__construct('fancy_database_backup');
		// Load any local user translations
		if (is_dir(WT_MODULES_DIR . $this->getName() . '/language')) {
			if (file_exists(WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.mo')) {
				I18N::addTranslation(
					new Zend_Translate('gettext', WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.mo', WT_LOCALE)
				);
			}
			if (file_exists(WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.php')) {
				I18N::addTranslation(
					new Zend_Translate('array', WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.php', WT_LOCALE)
				);
			}
			if (file_exists(WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.csv')) {
				I18N::addTranslation(
					new Zend_Translate('csv', WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.csv', WT_LOCALE)
				);
			}
		}
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
				$controller = new PageController();
				$controller
					->restrictAccess(Auth::isAdmin())
					->pageHeader();
				?>
				<ol class="breadcrumb small">
					<li><a href="admin.php"><?php echo I18N::translate('Control panel'); ?></a></li>
					<li><a href="admin_modules.php"><?php echo I18N::translate('Module administration'); ?></a></li>
					<li class="active"><?php echo $this->getTitle(); ?></li>
				</ol>
				<h2><?php echo $this->getTitle(); ?></h2>
				<iframe src="mysqldumper/index.php" width="100%" height="580" style="border: 1px solid #ddd; margin-bottom: 20px">
				<p class="alert alert-danger"><?php echo I18N::translate('Sorry, your browser does not support iframes.') ?></p>
				</iframe>
				<?php
				break;
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
