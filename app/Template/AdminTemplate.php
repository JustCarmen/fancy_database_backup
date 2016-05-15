<?php
/*
 * webtrees: online genealogy
 * Copyright (C) 2016 webtrees development team
 * Copyright (C) 2016 JustCarmen
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace JustCarmen\WebtreesAddOns\FancyDatabaseBackup\Template;

use Fisharebest\Webtrees\Auth;
use Fisharebest\Webtrees\Controller\PageController;
use Fisharebest\Webtrees\I18N;
use JustCarmen\WebtreesAddOns\FancyDatabaseBackup\FancyDatabaseBackupModule;

class AdminTemplate extends FancyDatabaseBackupModule {

	protected function pageContent() {
		$controller = new PageController;
		return
			$this->pageHeader($controller) .
			$this->pageBody();
	}

	private function pageHeader(PageController $controller) {
		$controller
			->restrictAccess(Auth::isAdmin())
			->pageHeader();
	}

	private function pageBody() {
		?>
		<ol class="breadcrumb small">
			<li><a href="admin.php"><?php echo I18N::translate('Control panel') ?></a></li>
			<li><a href="admin_modules.php"><?php echo I18N::translate('Module administration') ?></a></li>
			<li class="active"><?php echo $this->getTitle() ?></li>
		</ol>
		<h2><?php echo $this->getTitle() ?></h2>
		<iframe src="mysqldumper/index.php" height="580" style="border: 1px solid #ddd; margin-bottom: 20px; width: 100%">
			<p class="alert alert-danger"><?php echo I18N::translate('Sorry, your browser does not support iframes.') ?></p>
		</iframe>
		<?php
	}

}
