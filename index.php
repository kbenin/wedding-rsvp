<?php 

require 'functions.php';
require 'router.php';
require 'Database.php';

$config = require('config.php');
$db = new Database($config['database']);

<<<<<<< HEAD
// $id = $_GET['id'];
// $query = "select * from submissions where id = ?";

// $submissions = $db->query($query, [$id])->fetch();
 
=======
$id = $_GET['id'];
$query = "select * from posts where id = ?";

$posts = $db->query($query, [$id])->fetch();
 
// dd($posts);
>>>>>>> 9d7f7d273cc05d6f39af100ace68801539102a27


