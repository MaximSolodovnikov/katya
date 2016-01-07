<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
$mysqli = new mysqli('localhost', 'salomuG', 'salomuG')or die('Cannot connect to database');
$mysqli->select_db('katya') or die('Cannot select database');
$mysqli->set_charset('utf8');
mb_internal_encoding('UTF-8');

$act = isset($_GET['act']) ? $_GET['act'] : 'list';
define('IS_ADMIN', isset($_SESSION['IS_ADMIN']));

switch ($act) {
    case 'list':
        $records = array();
        $sel = $mysqli->query('SELECT entry.*, COUNT(comments.id) AS comments 
                FROM `entry` 
                LEFT JOIN `comments` ON entry.id = comments.entry_id
                GROUP BY entry.id');
        while ($row = $sel->fetch_assoc()) {
            
            if (mb_strlen($row['content']) > 200) {
                
                $row['content'] = mb_substr(strip_tags($row['content']), 0, 197) . '...';
            }
            $row['header'] = htmlspecialchars($row['header']);
            $row['content'] = nl2br($row['content']);
            $records[] = $row;
        }
        require 'templates/list.php';
        break;
    case 'view-entry':
        if (!isset($_GET['id'])) die ("Missing id parametr");
        $id = intval($_GET['id']);
        
        $row = $mysqli->query("SELECT * FROM `entry` WHERE id = $id")->fetch_assoc();
        if(!$row) die ("No such entry");
        $row['content'] = nl2br($row['content']);
        $row['header'] = htmlspecialchars($row['header']);
        require 'templates/entry.php';
        break;
        
    case 'login':
        
        require 'templates/login.php';            
        break;
    
    case 'do-login':
        if($_POST['login'] == 'login' && $_POST['password'] == 'password') {
            
            $_SESSION['IS_ADMIN'] = TRUE;
            header('Location: ?act=admin');
            
        } else {

            header('Location: ?act=login');
        }
        break;
        
    case 'admin':
        require 'templates/admin.php';
        break;
    
    case 'do-new-entry':
        header('Location: ?act=admin');
        break;
        
    case 'logout':
        unset($_SESSION['IS_ADMIN']);
        header('Location: .');
        break;
    
    default :
        die("No such action");
}