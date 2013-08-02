rivendoors
==========
Update DB to 02.08.2013
SQL:
ALTER TABLE `pages` ADD `h1` VARCHAR( 200 ) NOT NULL AFTER `page_description`;
ALTER TABLE `manufacturers` ADD `h1` VARCHAR( 255 ) NOT NULL AFTER `page_description` ;