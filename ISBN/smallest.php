<?php error_reporting(1);

// Smallest: Finished in 293 Characters
// No DB Params, relying on shell execution to shorten item count

// Create
// CREATE DATABASE d; USE d; DROP TABLE IF EXISTS `Books`; CREATE TABLE `Books` (`id` bigint(20) NOT NULL AUTO_INCREMENT, `ISBN` bigint(13) NOT NULL, `Title` varchar(255) NOT NULL, `Description` mediumtext DEFAULT NULL COMMENT 'REF: goo.gl/IapxrK ntext is NOT a MySQL Datatype.....', PRIMARY KEY (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ; CREATE USER u@'%' IDENTIFIED BY 'p'; GRANT INSERT, SELECT, UPDATE ON d.* TO u@'%'; FLUSH PRIVILEGES;

// Load
// DELETE FROM Books; LOAD DATA INFILE '{path}/loader.csv'; INTO TABLE Books FIELDS TERMINATED BY '\t'  LINES TERMINATED BY '\n' (Title, ISBN, Description); SHOW WARNINGS;

// View
// CREATE VIEW b AS SELECT Title, ISBN FROM d.Books ORDER BY Title ASC;

/**
 * Notes:
 * Warnings and Deprecation notice were turned OFF for this Code Golf, and are not being counted against the char limit
 * split() is deprecated and will raise warnings
 * $a[substr(ucwords($e[0]),0,1)].="<a href='/{$e[1]}'>{$e[0]}</a> will raise due to undefined index, but will create on the fly
 */

$z='<br>';$a=[];exec('mysql -N -uu -pp -e"SELECT * FROM d.b"',$o);foreach($o AS$k=>$v){$e=split("\t",$v);$a[$e[0][0]].="<a href='/{$e[1]}'>{$e[0]}</a>$z";}foreach(range('A','Z') AS$l)echo(isset($a[$l]))?"<a href='/#$l'>$l</a> ":"$l ";echo$z;foreach($a AS$k=>$v)echo"<a name='$k'>$k</a>$z$v\n";