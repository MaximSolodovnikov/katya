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
        
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $limit = 6;
        $offset = ($page - 1) * $limit;
        $pages_result = $mysqli->query("SELECT COUNT(*) AS cnt FROM `entry`")->fetch_assoc();
        $pages = $pages_result['cnt'];
        
        $records = array();
        $sel = $mysqli->query("SELECT entry.*, COUNT(comments.id) AS comments 
                FROM `entry` 
                LEFT JOIN `comments` ON entry.id = comments.entry_id
                GROUP BY entry.id
                ORDER BY date DESC
                LIMIT $offset, $limit");
        
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
        if (!isset($_GET['id'])) {die ("Missing id parametre");}
        $id = intval($_GET['id']);
        
        $ENTRY = $mysqli->query("SELECT * FROM `entry` WHERE id = $id")->fetch_assoc();
        if(!$ENTRY) {die ("No such entry");}
        $ENTRY['content'] = nl2br($ENTRY['content']);
        $ENTRY['header'] = htmlspecialchars($ENTRY['header']);
        
        $pics = array();
        
        $sel = $mysqli->query("SELECT * FROM `pics` WHERE entry_id = $id");
        while($row = $sel->fetch_assoc()) {
            $pics[] = $row;
        }
        
        $comments = array();
        $sel = $mysqli->query("SELECT * FROM `comments` WHERE entry_id = $id ORDER BY date DESC");
        
        while ($row = $sel->fetch_assoc()) {
            
            $row['author'] = htmlspecialchars($row['author']);
            $row['text'] = nl2br(htmlspecialchars($row['text']));
            $comments[] = $row;
        }
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
        if(!IS_ADMIN) die("You must be an admin to add the entry");
        require 'templates/admin.php';
        break;
    
    case 'do-new-entry':
        if(!IS_ADMIN) die("You must be an admin to add the entry");

        // Каталог, в который мы будем принимать файл:
        $uploaddir = 'img/thumbs/';
        $uploadfile = $uploaddir . $_FILES['main_photo']['name'];
        
        // Копируем файл из каталога для временного хранения файлов:
        copy($_FILES['main_photo']['tmp_name'], $uploadfile);

        $sel = $mysqli->prepare("INSERT INTO `entry` (main_photo, header, date, content) VALUES (?, ?, ?, ?)");
        $sel->bind_param('ssss', $uploadfile, $_POST['header'], $_POST['date'], $_POST['content']);
       
        if($sel->execute()){
            
            header('Location: ?act=admin');
        } else {
            
            die("Ошибка при добавлении новой записи.");
        }  
        break;
        
        case 'do-new-comment':
        
        $sel = $mysqli->prepare("INSERT INTO `comments` (entry_id, author, date, text) VALUES (?, ?, ?, ?)");
        $sel->bind_param('ssss', $_POST['entry_id'], $_POST['author'], $_POST['date'], $_POST['text']);
       
        if($sel->execute()){
            
            header('Location: ?act=view-entry&id=' . intval($_POST['entry_id']));
        } else {
            
            die("Ошибка при добавлении комментария.");
        }  
        break;
        
    case 'add-photos-to-art':
        
        if(!IS_ADMIN) die("You must be an admin to add the entry");

            for($i=0; $i<count($_FILES['upload']['name']); $i++) {

              $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

              if ($tmpFilePath != ""){

                $newFilePath = "img/art/" . $_FILES['upload']['name'][$i];

                $sel = $mysqli->prepare("INSERT INTO `pics` (thumbs, photos, entry_id) VALUES (?, ?, ?)");
                $sel->bind_param('ssi', $newFilePath, $newFilePath, $_POST['entry_id']);
        
                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                    
                    if($sel->execute()){    
                        
                        header('Location: ?act=view-entry&id=' . intval($_POST['entry_id']));    
                    }
                    else {
                        
                        die("Ошибка при добавлении фотографий");
                    }
                } else {
                    
                    die("Ошибка загрузки файлов.");
                }
              }
            }
        break;
        
    case 'logout':
        unset($_SESSION['IS_ADMIN']);
        header('Location: .');
        break;
    
    default :
        die("No such action");
}