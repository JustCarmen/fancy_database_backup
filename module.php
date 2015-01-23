<?php
/*
 * Fancy Database Backup Module
 *
 * webtrees: Web based Family History software
 * Copyright (C) 2014 webtrees development team.
 * Copyright (C) 2014 JustCarmen.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
 */

use WT\Auth;

class fancy_database_backup_WT_Module extends WT_Module implements WT_Module_Config {

	public function __construct() {
		parent::__construct();
		// Load any local user translations
		if (is_dir(WT_MODULES_DIR . $this->getName() . '/language')) {
			if (file_exists(WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.mo')) {
				WT_I18N::addTranslation(
					new Zend_Translate('gettext', WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.mo', WT_LOCALE)
				);
			}
			if (file_exists(WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.php')) {
				WT_I18N::addTranslation(
					new Zend_Translate('array', WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.php', WT_LOCALE)
				);
			}
			if (file_exists(WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.csv')) {
				WT_I18N::addTranslation(
					new Zend_Translate('csv', WT_MODULES_DIR . $this->getName() . '/language/' . WT_LOCALE . '.csv', WT_LOCALE)
				);
			}
		}
	}

	// Extend class WT_Module
	public function getTitle() {
		return /* I18N: Name of a module/sidebar */ WT_I18N::translate('Fancy Database Backup');
	}

	// Extend class WT_Module
	public function getDescription() {
		return WT_I18N::translate('Provides access to MySQLDumper. A database backup tool.');
	}

	// Extend WT_Module
	public function modAction($mod_action) {
		switch ($mod_action) {
			case 'admin':
				$controller = new WT_Controller_Page();
				$controller
					->restrictAccess(Auth::isAdmin())
					->pageHeader();
				?>
				<ol class="breadcrumb small">
					<li><a href="admin.php"><?php echo WT_I18N::translate('Administration'); ?></a></li>
					<li><a href="admin_modules.php"><?php echo WT_I18N::translate('Module administration'); ?></a></li>
					<li class="active"><?php echo $this->getTitle(); ?></li>
				</ol>
				<h2><?php echo $this->getTitle(); ?></h2>
				<iframe src="mysqldumper/index.php" width="100%" height="580" style="border: 1px solid #ddd">
				<p class="alert alert-danger"><?php echo WT_I18N::translate('Sorry, your browser does not support iframes.') ?></p>
				</iframe>
				<?php
				break;
			default:
				header('HTTP/1.0 404 Not Found');
		}
	}

	// Implement WT_Module_Config
	public function getConfigLink() {
		return 'module.php?mod=' . $this->getName() . '&amp;mod_action=admin';
	}

}
