<?php
$dsn = 'mysql:host=localhost;dbname=frontierworld_survey_2';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // highly recommended
    PDO::ATTR_EMULATE_PREPARES => false // ALWAYS! ALWAYS! ALWAYS!
  ];
  //https://gist.github.com/adrian-enspired/385c6830ba2932bc36a2
  // learn more here: https://phpdelusions.net/pdo#errors

$db = new PDO($dsn, 'root', 'root', $options); //these credntials are for MAMP