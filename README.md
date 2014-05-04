Fancy Database Backup
=====================

A database backup module for webtrees.

The development version of the module requires [webtrees 1.5.4](https://github.com/fisharebest/webtrees).

Download the latest stable release for webtrees 1.5.3 here: https://github.com/JustCarmen/fancy_database_backup/releases/tag/1.5.2

Description
-----------
This is a very small module with a very powerful purpose. It provides the ability to include the excellent "MySQLDumper" backup software into your webtrees administration panel options. Throughout webtrees documentation you are very sensibly advised to back up your database at frequent intervals, and especially before any upgrade. If your webhost provides a tool like PhpMyAdmin or cPanel you should, if you know how, be able to use that. But for greater flexibility, simplicty and convenience MySQLDumper is hard to beat.

You need a working installation of <a href="http://www.mysqldumper.net">MySQLDumper</a>. This is NOT provided as part of this module.

Installation of MySQLDumper
---------------------------
Before doing anything with this module, download and install the latest version of MySQLDumper from www.mysqldumper.net. To use it in conjunction with this module directly, place the folder from the downloaded zip in the root of your webtrees installation. Rename the folder to mysqldumper. If you prefer another location and/or name for this tool please read the additional instructions below.

After installation, access MySQLDumper directly by going to your_webtrees_installation/mysqldumper to set it up and to check it is fully functional. There is no point wasting time with this module until you have a working installation of MySQLDumper. NOTE: If you have any problems installing or using MySQLDumper please contact them at their website for support.

After you setup MySQLDumper, upload the folder 'fancy_database_backup' to your server's webtrees/modules_v3 folder and install the module as any other module (see the [JustCarmen Help Pages](http://www.justcarmen.nl/help) for instructions about installing a module).

Additional setup
----------------
if you have installed the mySQLDumper folder and files in a different location of your webtrees installation, you have to point the module to this other location.

Open the file modules_v3/fancy_database_backup/module.php. At line 54 replace the entry "mysqldumper/index.php" with the correct path to the index.php file of your own MySQLDumper installation. Then save the revised file back to your web server. 

Do not make any changes to your separate MySqlDumper folder or files when you update the module. Just take care if you modified line 54 as described in ADDITIONAL SETUP above. It will need the same change in the new file. 

Installation, updating and translations
---------------------------------------
For more information about these subjects go to the JustCarmen help pages: http://www.justcarmen.nl/help

Bugs and feature requests
-------------------------
If you experience any bugs or have a feature request for this module you can [create a new issue](https://github.com/JustCarmen/fancy_database_backup/issues?state=open) or [use the webtrees subforum 'customising'](http://www.webtrees.net/index.php/en/forum/4-customising) to contact me.



