<?php
$host = 'localhost';
$user = 'root';
$pass = '';

$temp = new mysqli($host,$user,$pass);

if(!$temp)
{echo 'connection failed';}
else echo "connection successful";

mysqli_select_db($temp,"cms");

$cnt = "CREATE TABLE articles
(
  id              smallint unsigned NOT NULL auto_increment,
  publicationDate date NOT NULL,                              # When the article was published
  title           varchar(255) NOT NULL,                      # Full title of the article
  summary         text NOT NULL,                              # A short summary of the article
  content         mediumtext NOT NULL,                        # The HTML content of the article

  PRIMARY KEY     (id)
)";

$res = mysqli_query($temp,$cnt);

if(!$res)
{
    echo " could not modify";
}
else echo "modification successfull";

