<?php
function deletecoockie()
    {
        foreach($_COOKIE as $key => $value)
        {        
            if($key!='PHPSESSID')
                $cookie=setcookie ($key,"", time() - 10000);
        }
    }


function SetValuesToCookie($pagename,$field,$concatString='_')
{
    if(isset($_POST) && count($_POST) > 0)
    {
        foreach ($_POST as $key=>$value)
        {
            if(isset($key) && in_array($key,$field))
            {
                setcookie($pagename.$concatString.$key, $value, time()+7200);
            }
            else
            {
                setcookie($pagename.$concatString.$key, '', time()-7200);
            }
        }
    }
    else if(isset($_GET) && count($_GET) > 0)
    {
        foreach ($_GET as $key=>$value)
        {
            if(isset($key) && in_array($key,$field))
            {
                setcookie($pagename.$concatString.$key, $value, time()+7200);
            }
            else
            {
                setcookie($pagename.$concatString.$key, '', time()-7200);
            }
        }
    }
    else
    {
        for($i=0;$i<count($field);$i++)
        {
            setcookie($pagename.$concatString.$field[$i], '', time()-7200);
        }
    }
}

function redirect($link){
    echo '<script>window.location.href="' .$link . '"</script>';
    exit;
}

function cleanString($string) {
    
    //$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9._\s\-]/', '', trim($string));
}

function randomString($length = 10, $type='both') {
    
    $number = '0123456789';
    $character = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    if($type == 'character') {
        $source = $character;
    } else if($type == 'number') {
        $source = $number;
    } else {
        $source = $number . $character;
    }
    
    $string = substr(str_shuffle(str_repeat($source, ceil($length/strlen($source)) )),1,$length);
    
    return $string;
}

function formatDirNo($number) {
    return str_pad($number, 4, '0', STR_PAD_LEFT);
}

function formatPrice($price=0) {
    $price = number_format((float)$price, 2, '.', '');
    if (CURRENCY_POSITION == 'left') {
        $price = CURRENCY_SYMBOL . '' . $price;
    } else {
        $price = $price . '' . CURRENCY_SYMBOL;
    }
    return $price;
}

function getAutoID($table){
    global $dbName, $db;
    
    $sql = 'SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = "' . $dbName . '" AND TABLE_NAME   = "' . $table . '"';
    $result = $db->query($sql);
    $data = $result->row_array();
    return $data['AUTO_INCREMENT'];
}

function insertData($table="", $data=array()) {
    global $db, $dbPrefix, $list;
    
    if ($table == "" || count($data) == 0) {
        return false;
    }
    
    $columns = array();
    $values = array_values($data);
    foreach ($data as $key=>$value) {
        $columns[] = $key . ' = ?';
    }
    $columns = implode(', ', $columns);
    
    $sql = 'INSERT INTO ' . $dbPrefix . $table . ' SET ' . $columns;
    $db->query($sql, $values);
    //echo $db->last_query();
    
    $insert_id = $db->insert_id();
    return $insert_id;
}

function insertDataExtra($table="",$name="")
{
    global $db, $dbPrefix, $list;
    
    $sql = 'INSERT INTO ' . $dbPrefix . $table . " VALUES (NULL, '$name', 1)";
    $db->query($sql);
    //echo $db->last_query();
    
    $insert_id = $db->insert_id();
    return $insert_id;
}

function deleteData($table="", $data=array(), $where="") {
    global $db, $dbPrefix, $list;
    
    if ($table == "" || count($data) == 0) {
        return false;
    }
    
    $columns = array();
    $values = array_values($data);
    foreach ($data as $key=>$value) {
        $columns[] = $key . ' = ?';
    }
    $columns = implode(', ', $columns);
    
    $sql = 'DELETE FROM ' . $dbPrefix . $table;
    
    if ($where != "") {
        $sql .= ' WHERE ' . $where; 
    }
    $update = $db->query($sql, $values);
    //echo $db->last_query();
    
    return $update;
}

function updateData($table="", $data=array(), $where="") {
    global $db, $dbPrefix, $list;
    
    if ($table == "" || count($data) == 0) {
        return false;
    }
    
    $columns = array();
    $values = array_values($data);
    foreach ($data as $key=>$value) {
        $columns[] = $key . ' = ?';
    }
    $columns = implode(', ', $columns);
    
    $sql = 'UPDATE ' . $dbPrefix . $table . ' SET ' . $columns;
    
    if ($where != "") {
        $sql .= ' WHERE ' . $where; 
    }
    echo $sql."<br>";
    $update = $db->query($sql, $values);
    //echo $db->last_query();
    
    return $update;
}

function disableData($table="", $data=array(), $where="") {
    global $db, $dbPrefix, $list;
    
    if ($table == "" || count($data) == 0) {
        return false;
    }
    
    $columns = array();
    $values = array_values($data);
    foreach ($data as $key=>$value) {
        $columns[] = $key . ' = ?';
    }
    $columns = implode(', ', $columns);
    
    $sql = 'UPDATE ' . $dbPrefix . $table . ' SET ' . $columns;
    
    if ($where != "") {
        $sql .= ' WHERE ' . $where; 
    }
    $update = $db->query($sql, $values);
    //echo $db->last_query();
    
    return $update;
}


function uploadImage($data=array()) {
    
    $source = null;
    $destination = null;
    $file_name = null;
    $extension = null;
    
    $mime = null;
    $width = null;
    $height = null;
    $type = null;
    
    $allowed_types = array('image/jpg', 'image/jpeg', 'image/png');
    
    foreach($data as $key=>$value) {
        ${$key} = $value;
    }
    
    if($source) {
        if(file_exists($source) && !is_dir($source)) {
            $info   = getimagesize($source);
            $mime   = $info['mime'];
            $width  = $info[0];
            $height = $info[1];
            $type   = $info[2];
        }
        $extension = str_replace('image/', '', $mime);
    }
    
    if(!$file_name) {
        $file_name = date('YmdHis') . '.' . $extension;
    } else if (strpos($file_name, '.') == false) {
        $file_name = cleanString($file_name) . '-' . date('YmdHis') . '.' . $extension;
    } else {
        $file_name = cleanString($file_name);
    }

    $error = false;
    $result = array();
    
    if(!$source || !file_exists($source) || is_dir($source)) {
        $error = true;
        $result['error'] = 'Please provide source file!';
    } else if(!$destination || !file_exists($destination)) {
        $error = true;
        $result['error'] = 'Please provide destination path!';
    } else if(!in_array($mime, $allowed_types)) {
        $error = true;
        $result['error'] = 'File extension invalid!';
    } else {
        
        if(move_uploaded_file($source, $destination.$file_name)) {
            $result['success'] = 'File uploaded successfully.';
            $result['file'] = $file_name;
        } else {
            $result['error'] = 'File not uploaded successfully. Please try again!';
        }    
        
    }
    
    return $result;
}

function uploadDocument($data=array()) {
    
    $source = null;
    $destination = null;
    $original_name = null;
    $file_name = null;
    $extension = null;
    
    $type = null;
    
    $allowed_types = array('pdf','csv','doc','docx');
    
    foreach($data as $key=>$value) {
        ${$key} = $value;
    }
    
    $type = explode('.', $original_name);
    $type = end($type);
    
    if(!$file_name) {
        $file_name = date('YmdHis') . '.' . $type;
    } else if (strpos($file_name, '.') == false) {
        $file_name = cleanString($file_name) . '-' . date('YmdHis') . '.' . $type;
    } else {
        $file_name = cleanString($file_name);
    }

    $error = false;
    $result = array();
    
    if(!$source || !file_exists($source) || is_dir($source)) {
        $error = true;
        $result['error'] = 'Please provide source file!';
    } else if(!$destination || !file_exists($destination)) {
        $error = true;
        $result['error'] = 'Please provide destination path!';
    } else if(!in_array($type, $allowed_types)) {
        $error = true;
        $result['error'] = 'File extension invalid!';
    } else {
        
        if(move_uploaded_file($source, $destination.$file_name)) {
            $result['success'] = 'File uploaded successfully.';
            $result['file'] = $file_name;
        } else {
            $result['error'] = 'File not uploaded successfully. Please try again!';
        }    
        
    }
    
    return $result;
}

/********** Admin **********/

function formatAdminDate($date) {
    $date = date('d/m/y', strtotime($date));
    return $date;
}

function checkAdminLogin() {
    if (isset($_SESSION['adminsessionid'])) {
        return true;
    } else {
        return false;
    }
}

function checkPermission($module, $redirect = true) {
    global $db, $dbPrefix;
    
    $adminsessionstr = trim($_SESSION['adminsessionid']);
    $parts = explode(";",$adminsessionstr);
    $admin_id = $parts[0];
    
    $result = $db->query('SELECT * FROM ' . $dbPrefix . 'admin WHERE id ='.$admin_id);
	$adminInfo = $result->row_array();
    if ($adminInfo['super_admin'] == 1) {
        return true;
    }
    
    $query = 'SELECT * FROM ' . $dbPrefix . 'admin_permission WHERE admin_id ='.$admin_id;
    $results = $db->query($query);
    
    $permission = array();
    foreach ($results->result_array() as $result) {
        $permission[] = $result['module'];
    }
    
    if(!in_array($module, $permission)) {
        if($redirect) {
            redirect(getAdminLink('permission'));
        }
        return false;
    } else {
        return true;
    }
}

function getAdminLink($page = "", $parameter = '', $ajax = false) {
    if ($ajax) {
        $url = ADMIN_URL . $page;
    } else {
        if ($page) {
            $url = ADMIN_URL . 'main.php?pg=' . $page; 
        } else {
            $url = ADMIN_URL . 'main.php';
        }
    }
    if($parameter) {
        $url .= '&' . $parameter;
    }
    return $url;
}

function generateLog($file, $content = '') {
    
    $filename = SITE_PATH . 'logs/' . $file . ".txt";
    if (!file_exists($filename)) {
        $file = fopen(SITE_PATH . 'logs/' . $file . ".txt", "w") or die("Unable to open file!");
    } else {
        $file = fopen(SITE_PATH . 'logs/' . $file . ".txt", "a") or die("Unable to open file!");
    }
    fwrite($file, $content);
    fwrite($file, "\n");
    fclose($file);
}

function addLog($data=array()) {
    
    global $db;
    $log = null;
    
    foreach($data as $key=>$value) {
        ${$key} = $value;
    }
    
    list($adminid,$admin,$sessionid) = explode(";",$_SESSION['adminsessionid']);
    $adminname = $_SESSION['adminname'];
    $user_id = $adminid;
    
    $deletedata = array(
                        "user_id" => $user_id,
                        "user_type" => "admin",
                        "date" => date('Y-m-d H:i:s'),
                        "log" => sprintf($log, $adminname)
                    );
    $db->Insert($deletedata,"system_logs");
}

/********** Front End **********/

function pagination($total, $limit = 10, $page_id = 1, $link = '', $offset = 100) {
    
    $page = ceil($total/$limit);
    if($page < 2)
        return '';
        
    if((abs($page_id-1) <= $offset) || (abs($page_id-$page) <= $offset)) {
        $offset += $offset;
        if(abs($page_id-1) <= $offset) {
            $offset -= $page_id-1;
        } else {
            $offset -= $page-$page_id;
        }
    }
        
    $more = '<li><a> ... </a></li>';
    
    $pagination = '<ul class="pagination" >';
    
    if($page_id != 1) {
        $pagination .= '<li class="page-first"><a href="' . $link . '?page_id=1" ><< First</a></li>';
        $pagination .= '<li class="page-prev"><a href="' . $link . '?page_id=' . ($page_id-1) . '" >< Previous</a></li>';
    }
    
    for($i=1; $i<=$page; $i++) {
        if((abs($page_id-$i) > $offset) && ($i != 1) && ($i != $page)) {
            continue;
        }
        
        $page_link = $link . '?page_id=' . $i;
        
        if((abs($page_id-$i) > $offset)) {
            
            if(($i == $page) && (($page - $page_id) - $offset) > 1) {
                $pagination .= $more;
            }
            $pagination .= '<li><a href="' . $page_link . '" >' . $i . '</a></li>';
            if(($i == 1) && ($page_id - $offset) > 2) {
                $pagination .= $more;
            }
        } else if($i == $page_id) {
            $pagination .= '<li class="active"><span>' . $i . '</span></li>';
        } else {
            $pagination .= '<li><a href="' . $page_link . '" >' . $i . '</a></li>';
        }
    }
    
    if($page_id != $page) {
        $pagination .= '<li class="page-next"><a href="' . $link . '?page_id=' . ($page_id+1) . '" >Next ></a></li>';
        $pagination .= '<li class="page-last"><a href="' . $link . '?page_id=' . $page . '" page-last >Last >></a></li>';
    }
    
    $pagination .= '</ul>';
    
    return $pagination;
}

function shortContent($content = '', $length = 500, $sentence = false) {
    
    $content = cleanSpace($content);
    $pos = strrpos($content, "<table");
    if($pos !== false) {
        $content = substr($content, 0, ($pos));
    }
    //$content = strip_tags($content,'<p><h1><h2><h3><h4><h5><h6><a><br><ul><li>');
    $content = strip_tags($content);
    if($sentence) {
        $content = substr($content, 0, $length);
        $content = str_replace(array('<ul>', '</ul>', '<li>', '</li>'), array('<p>', '</p>', '', '<br>'), $content);
        $content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content);
        $content = preg_replace('/\s+/', ' ',$content);
        $pos = strrpos($content, "</p>");
        if($pos !== false) {
            $content = substr($content, 0, ($pos));
        } else {
            $pos = strrpos($content, ".");
            $content = substr($content, 0, ($pos+1));
        }
    } else {
        $content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content);
        $content = substr($content, 0, $length);
        $pos = strrpos($content, ".");
        $content = substr($content, 0, ($pos+1));
    }
    return $content;
}

function cleanSpace($content = '') {
    $pattern = "/<p[^>]*><\\/p[^>]*>/";
    $content = preg_replace($pattern, '', $content); 
    $pattern = "<p>&nbsp;</p>";
    $content = str_replace($pattern, '', $content); 
    return $content;
}

function getLink($url = "", $parameter = '', $ajax = false) {
    //$url = SITE_URL . str_replace('.php', '', $url);
    $url = SITE_URL . $url;
    if($parameter) {
        $url .= '?' . $parameter;
    }
    return $url;
}

function formatDate($date, $format = DEFAULT_DATE_FORMAT) {
    $date = date($format, strtotime($date));
    return $date;
}

function formatDateTime($datetime, $format = DEFAULT_DATE_TIME_FORMAT) {
    $datetime = date($format, strtotime($datetime));
    return $datetime;
}

function checkLogin() {
    global $db, $dbPrefix;
    if (isset($_SESSION['id'])) {
        $result = $db->query('SELECT * FROM ' . $dbPrefix . 'user WHERE id = ? AND status = 1', array($_SESSION['id']));
        if ($result->num_rows() > 0) {
            return true;
        } else {
            unset($_SESSION['id']);
            unset($_SESSION['user_type']);
            return false;
        }
    } else {
        return false;
    }
}
function checkLoginAsk() {
    global $db, $dbPrefix;
    if (isset($_SESSION['id'])) {
        $result = $db->query('SELECT * FROM ' . $dbPrefix . 'admin_info WHERE username = ? AND password = ?', array($_POST['username'],$_POST['password']));
        if ($result->num_rows() > 0) {
            return true;
        } else {
            unset($_SESSION['id']);
            unset($_SESSION['user_type']);
            return false;
        }
    } else {
        return false;
    }
}
function sendMsg($data = array()) {
    
    //return false;
    $to = null;
    $from_name = null;
    $from_email = null;
    $subject = null;
    $message = null;
    
    foreach($data as $key => $value) {
        ${$key} = $value;
    }
    
    if(!is_array($to)) {
        $to = explode(',', $to);
    }
    
    if (!$from_name) {
        $from_name = SMTP_FROM_NAME;
    }
    
    if (!$from_email) {
        $from_email = SMTP_FROM_EMAIL;
    }
    
    $search_replace = array(
                    '[SITE_TITLE]' => SITE_TITLE,
                    '[SITE_URL]' => SITE_URL,
                    //'[SITE_LOGO]' => SITE_URL . 'images/logo.png',
                    '[SITE_LOGO]' => SITE_URL . 'images/logo_white.png',
                    '[FOOTER_TEXT]' => sprintf(COPYRIGHT_TEXT, date('Y')),
                    '[SUBJECT]' => $subject,
                    '[MESSAGE]' => $message,
    );
    
    $template = file_get_contents(SITE_PATH . 'common/mail.html');
    $message = str_replace(
                array_keys($search_replace),
                array_values($search_replace),
                $template
            );
    
    if (MAIL_TYPE == 'SMTP') {
        foreach($to as $address) {
            $mail = new PHPMailer;
            $mail->SMTPDebug = 0;
            
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USERNAME;
            $mail->Password = SMTP_PASSWORD;
            $mail->SMTPSecure = 'tls';
            
            if (SMTP_PORT) {
                $mail->Port = SMTP_PORT;
            }
            
            $mail->setFrom($from_email, $from_name);
            
            $mail->addAddress($address);
            
            
            $mail->isHTML(true);
            $mail->Subject = SITE_TITLE . ' - ' . $subject;
            $mail->Body = $message;
            $ok = $mail->send();
        }
    } else {
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: " . $from_email . "\r\n";
        $headers .= "Bcc: harnish@webtechsystem.com\r\n";

        $ok = mail($to[0],SITE_TITLE . ' - ' . $subject,$message,$headers);
    }
    
    if(!$ok) {
        return false;
    } else {
        return true;
    }
}

function getPageData($id) {
    global $db;
    $sql = "SELECT * FROM cms_page WHERE id = '" . $id . "'";
    $result = $db->QueryResult($sql);
    if(count($result) > 0) {
        return $result[0];
    } else {
        return array('id' => 0, 'title' => null, 'description' => null);
    }
}

function getTableList($table, $list, $id="", $single=true) {
    global $db, $dbPrefix;
    
    $tableList = $list;
    
    if ((count($tableList) == 0) || (($id) && !isset($tableList[$id]))) {
        $rows = $db->query('SELECT * FROM ' . $dbPrefix . $table . ' WHERE status = 1', array());
        foreach($rows->result_array() as $row) {
            $tableList[$row['id']] = $row['name'];
        }
        $list = $tableList;
    }
    
    if ($id) {
        if (isset($tableList[$id])) {
            return $tableList[$id];
        } else {
            return null;
        }
    } else {
        if ($single) {
            return null;
        } else {
            return $tableList;
        }
    }
}

function getClub($id="", $single=true) {
    global $clubList;
    return getTableList('club', $clubList, $id, $single);
}

function getCountry($id="", $single=true) {
    global $countryList;
    return getTableList('country', $countryList, $id, $single);
}

function getCounty($id="", $single=true) {
    global $countyList;
    return getTableList('county', $countyList, $id, $single);
}

function getPosition($id="", $single=true) {
    global $positionList;
    return getTableList('position', $positionList, $id, $single);
}

function playerImageCheck($image_path, $type='player', $extra='', $option=array()) {
    
    $image = '';
    if ($image_path != "" && file_exists(USER_PATH . $image_path)) {
        if (isset($option['thumb']) && $option['thumb'] == true) {
            $src = 'thumb.php?image=' . $image_path;
        } else {
            $src = USER_URL . $image_path;
        }
    } else {
        $src = "images/player_icon.png";
    }
    // $image = '<div class="profile-image"><img src="' . $src . '" alt="" ' . $extra . ' /></div>';
    return $src;
}

function getUserProfileImage($image_path, $type='player', $extra='', $option=array()) {
    
    $image = '';
    if ($image_path != "" && file_exists(USER_PATH . $image_path)) {
        if (isset($option['thumb']) && $option['thumb'] == true) {
            $src = 'thumb.php?image=' . $image_path;
        } else {
            $src = USER_URL . $image_path;
        }
    } else {
        $src = "images/player_icon.png";
    }
    
    $image = '<div class="profile-image"><img src="' . $src . '" alt="" ' . $extra . ' /></div>';
    
    return $image;
}

function getVideoId($video) {
    $videoLink = false;
    if ($video != "") {
        $video = explode('=', $video);
        if (isset($video[1])) {
            $videoLink = $video[1];
        }
    }
    return $videoLink;
}

function updatePlayerRanking($user_id, $allowed_test) {
    
    global $db, $dbPrefix;
    
    /** Update Ranking **/
    $db->query('DELETE FROM ' . $dbPrefix . 'user_test_score WHERE user_id = ? AND test_id NOT IN (' . $allowed_test . ')', array($user_id));
    
    $total_test = $db->query('SELECT COUNT(test.id) as total FROM ' . $dbPrefix . 'test as test WHERE test.status = 1 AND test.id IN (' . $allowed_test . ')', array());
    $totalTest = $total_test->row_array();

    $user_total_score = $db->query('SELECT SUM(test_score.weightage) as score FROM ' . $dbPrefix . 'user_test_score as test_score INNER JOIN ' . $dbPrefix . 'test as test ON (test.id = test_score.test_id AND test.status = 1) WHERE test_score.user_id = ? AND test.id IN (' . $allowed_test . ')', array($user_id));
    $userTotalScore = $user_total_score->row_array();

    $overall_score = number_format((float)($userTotalScore['score']/$totalTest['total']), 2, '.', '');

    $userData = array('overall_score' => $overall_score);
    updateData('user', $userData, 'id=' . $user_id);
    
    $users = $db->query('SELECT id, overall_score FROM ' . $dbPrefix . 'user WHERE status = 1 AND overall_score > 0 ORDER BY overall_score DESC', array($user_id));
    $users = $users->result_array();
    
    $userData = array('user_rank' => null);
    updateData('user', $userData);
    
    $previous_user_ranking = 0;
    $previous_user_rank = 0;
    foreach ($users as $key => $user) {
        
        if ($user['overall_score'] == $previous_user_ranking) {
            $user_rank = $previous_user_rank;
        } else {
            $user_rank = ($key + 1);
        }
        $previous_user_rank = $user_rank;
        $previous_user_ranking = $user['overall_score'];
        
        $userData = array('user_rank' => $user_rank);
        updateData('user', $userData, 'id=' . $user['id']);
    }
    
    /** Update Ranking **/
}

function getJudoAPIToken() {
    if (JUDO_PRODUCTION == 1) {
        $judo_parameters = array(
                'apiToken' => JUDO_API_TOKEN,
                'apiSecret' => JUDO_API_SECRET,
                'judoId' => JUDO_ID,
                'useProduction' => true
            );
    } else {
        $judo_parameters = array(
                'apiToken' => JUDO_API_SANDBOX_TOKEN,
                'apiSecret' => JUDO_API_SANDBOX_SECRET,
                'judoId' => JUDO_ID
            );
    }
    
    return $judo_parameters;
}


function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
// function get_all_data()
// {
//     global $db, $dbPrefix, $list;
//     $query="SELECT users.id as main_id,users.apply_date, users.full_name,users.phone_number,users.visited,users.qualification,users.comments,users.budget,lead.priority_name,sources.source_name,countries.country_name,inquiry.inquiry_location,consultants.consultant_name, follow.id,follow.user_id,follow.follow_up_number,follow.follow_up_date,follow.additional_comment,follow.staff_member,actions.action_name,outcome.outcome_name FROM user_info as users INNER JOIN lead_priority as lead on users.priority_id=lead.id INNER JOIN source as sources on users.apply_source_id=sources.id INNER JOIN country as countries ON users.country_id=countries.id INNER JOIN inquiry_form_location as inquiry ON users.inquiry_form_location_id=inquiry.id INNER JOIN consultant as consultants ON users.consultant_id=consultants.id LEFT JOIN follow_up_info as follow ON users.id=follow.user_id INNER JOIN call_outcome as outcome on follow.follow_up_outcome_id=outcome.id INNER JOIN follow_up_action as actions ON follow.follow_up_action_id=actions.id;";
//     $result=$db->query($query);
//     $row=$result->result_array();
//     fix_arrays($row);
//     return $row;
// }
// function get_single_user_data($id)
// {
//     global $db, $dbPrefix, $list;
//     $query="SELECT users.id as main_id,users.apply_date, users.full_name,users.phone_number,users.visited,users.qualification,users.comments,users.budget,lead.priority_name,sources.source_name,countries.country_name,inquiry.inquiry_location,consultants.consultant_name, follow.id,follow.user_id,follow.follow_up_number,follow.follow_up_date,follow.additional_comment,follow.staff_member,actions.action_name,outcome.outcome_name FROM user_info as users INNER JOIN lead_priority as lead on users.priority_id=lead.id INNER JOIN source as sources on users.apply_source_id=sources.id INNER JOIN country as countries ON users.country_id=countries.id INNER JOIN inquiry_form_location as inquiry ON users.inquiry_form_location_id=inquiry.id INNER JOIN consultant as consultants ON users.consultant_id=consultants.id LEFT JOIN follow_up_info as follow ON users.id=follow.user_id INNER JOIN call_outcome as outcome on follow.follow_up_outcome_id=outcome.id INNER JOIN follow_up_action as actions ON follow.follow_up_action_id=actions.id where users.id=$id;";
//     $result=$db->query($query);
//     $row=$result->result_array();
//     fix_arrays($row);
//     return $row;
// }
function get_all_data($min=0,$max=1000)
{
    global $db, $dbPrefix, $list;
    $query="SELECT users.enabled,users.id as main_id,users.apply_date, users.full_name,users.phone_number,users.visited,users.qualification,users.comments,users.budget,lead.priority_name,sources.source_name,countries.country_name,inquiry.inquiry_location,consultants.consultant_name FROM user_info as users INNER JOIN lead_priority as lead on users.priority_id=lead.id INNER JOIN source as sources on users.apply_source_id=sources.id INNER JOIN country as countries ON users.country_id=countries.id INNER JOIN inquiry_form_location as inquiry ON users.inquiry_form_location_id=inquiry.id INNER JOIN consultant as consultants ON users.consultant_id=consultants.id WHERE users.enabled=1  AND users.id BETWEEN $min AND $max;";
    $result=$db->query($query);
    $row=$result->result_array();
    return $row;
}
function get_single_user_data($id)
{
    global $db, $dbPrefix, $list;
    $query="SELECT users.enabled,users.id as main_id,users.apply_date, users.full_name,users.phone_number,users.visited,users.qualification,users.comments,users.budget,lead.priority_name,sources.source_name,countries.country_name,inquiry.inquiry_location,consultants.consultant_name FROM user_info as users INNER JOIN lead_priority as lead on users.priority_id=lead.id INNER JOIN source as sources on users.apply_source_id=sources.id INNER JOIN country as countries ON users.country_id=countries.id INNER JOIN inquiry_form_location as inquiry ON users.inquiry_form_location_id=inquiry.id INNER JOIN consultant as consultants ON users.consultant_id=consultants.id where users.id=$id AND users.enabled=1;";
    $result=$db->query($query);
    $row=$result->result_array();
    return $row;
}
function get_single_inprocess($id)
{
    global $db, $dbPrefix, $list;
    $query="SELECT * FROM in_process where id=$id AND `enabled`=1;";
    $result=$db->query($query);
    $row=$result->result_array();
    return $row;
}
function get_all_follow_up()
{
    global $db, $dbPrefix, $list;
    $query="SELECT follow.id,follow.user_id,follow.follow_up_number,follow.follow_up_date,follow.additional_comment,follow.staff_member,outcome.outcome_name,actions.action_name from follow_up_info as follow INNER JOIN call_outcome as outcome on follow.follow_up_outcome_id=outcome.id INNER JOIN follow_up_action as actions ON follow.follow_up_action_id=actions.id WHERE follow.enabled=1;";
    $result=$db->query($query);
    $row=$result->result_array();
    return $row;
}
function get_single_follow_up($id)
{
    global $db, $dbPrefix, $list;
    $query="SELECT follow.id,follow.user_id,follow.follow_up_number,follow.follow_up_date,follow.additional_comment,follow.staff_member,outcome.outcome_name,actions.action_name from follow_up_info as follow INNER JOIN call_outcome as outcome on follow.follow_up_outcome_id=outcome.id INNER JOIN follow_up_action as actions ON follow.follow_up_action_id=actions.id WHERE follow.user_id=$id AND follow.enabled=1;";
    $result=$db->query($query);
    $row=$result->result_array();
    return $row;
}
function get_single_follow_up_inprocess($id)
{
    global $db, $dbPrefix, $list;
    $query="SELECT * from follow_up_inprocess WHERE user_id=$id AND enabled=1;";
    $result=$db->query($query);
    $row=$result->result_array();
    return $row;
}
function get_single_follow_up_for_one($id)
{
    global $db, $dbPrefix, $list;
    $query="SELECT follow.id,follow.user_id,follow.follow_up_number,follow.follow_up_date,follow.additional_comment,follow.staff_member,outcome.outcome_name,actions.action_name from follow_up_info as follow INNER JOIN call_outcome as outcome on follow.follow_up_outcome_id=outcome.id INNER JOIN follow_up_action as actions ON follow.follow_up_action_id=actions.id WHERE follow.id=$id AND follow.enabled=1;";
    $result=$db->query($query);
    $row=$result->result_array();
    return $row;
}
function get_follow_up_data()
{
    global $db, $dbPrefix, $list;
    $query="SELECT in_process.id,in_process.case_assign_date,in_process.name,in_process.phone,in_process.email
    ,des1.destination_name as dest_1,cou1.consultant_name,in_process.comments,fee1.status_name,in_process.admin,in_process.university_1,in_process.outcome_destination_1,in_process.case_status_1,des2.destination_name as dest_2,
    in_process.case_handler_2,in_process.intake,in_process.university_2,in_process.outcome_destination_2,in_process.case_status_2,in_process.course,in_process.case_handler_2,in_process.missing_docs,in_process.final_comments 
    FROM in_process as in_process 
    INNER JOIN destination as des1 ON in_process.destination_1=des1.id
    INNER JOIN destination as des2 ON in_process.destination_2=des2.id
    INNER JOIN consultant as cou1 ON in_process.counselor=cou1.id 
    INNER JOIN fee_status as fee1 ON in_process.fee_status=fee1.id WHERE in_process.enabled=1;";
    $result=$db->query($query);
    $row=$result->result_array();
    return $row;
}
function get_single_follow_up_data($id=0)
{
    global $db, $dbPrefix, $list;
    $query="SELECT in_process.id,in_process.case_assign_date,in_process.name,in_process.phone,in_process.email
    ,des1.destination_name as dest_1,cou1.consultant_name,in_process.comments,fee1.status_name,in_process.admin,in_process.university_1,in_process.outcome_destination_1,in_process.case_status_1,des2.destination_name as dest_2,
    in_process.case_handler_2,in_process.intake,in_process.university_2,in_process.outcome_destination_2,in_process.case_status_2,in_process.course,in_process.case_handler_2,in_process.missing_docs,in_process.final_comments 
    FROM in_process as in_process 
    INNER JOIN destination as des1 ON in_process.destination_1=des1.id
    INNER JOIN destination as des2 ON in_process.destination_2=des2.id
    INNER JOIN consultant as cou1 ON in_process.counselor=cou1.id 
    INNER JOIN fee_status as fee1 ON in_process.fee_status=fee1.id WHERE in_process.enabled=1 AND in_process.id=$id;";
    // echo $query;
    $result=$db->query($query);
    $row=$result->result_array();
    return $row;
}
function get_single_follow_up_for_one_inprocess($id)
{
    global $db, $dbPrefix, $list;
    $query="SELECT * from follow_up_inprocess WHERE id=$id AND `enabled`=1;";
    $result=$db->query($query);
    $row=$result->result_array();
    return $row;
}
function get_user_row_count($table="")
{
    global $db,$dbPrefix,$list;
    $query="SELECT COUNT(*) as rowcount FROM ".$table;
    $result=$db->query($query);
    $row=$result->result_array();
    $count=0;
    foreach($row as $rows)
    {
        $count=$rows["rowcount"];
    }
    return $count;
}
function get_max_id($table="")
{
    global $db,$dbPrefix,$list;
    $query="SELECT MAX(Id) as maxid FROM ".$table;
    $result=$db->query($query);
    $row=$result->result_array();
    $count=0;
    foreach($row as $rows)
    {
        $count=$rows["maxid"];
    }
    return $count;
}
function selectData($table="",$where="", $data=array()) {
    global $db, $dbPrefix, $list;
    
    if ($table == "") {
        return false;
    }
    if($data!=null)
    {
        $columns = array();
        $values = array_values($data);
        foreach ($data as $key=>$value) {
            $columns[] = $key . ' = ?';
        }
        $columns = implode(', ', $columns);
    }
    $sql = 'SELECT * FROM ' . $dbPrefix . $table;
    
    if ($where != "") {
        $sql .= ' WHERE ' . $where; 
    }
    if($data==null)
    {
        $update = $db->query($sql);
    }
    else
    {
        $update = $db->query($sql, $values);
    }
    
    //echo $db->last_query();
    $row=$update->result_array();
    return $row;
}
function selectNumRows($table="",$where="", $data=array()) {
    global $db, $dbPrefix, $list;
    
    if ($table == "") {
        return false;
    }
    if($data!=null)
    {
        $columns = array();
        $values = array_values($data);
        foreach ($data as $key=>$value) {
            $columns[] = $key . ' = ?';
        }
        $columns = implode(', ', $columns);
    }
    $sql = 'SELECT * FROM ' . $dbPrefix . $table;
    
    if ($where != "") {
        $sql .= ' WHERE ' . $where; 
    }
    if($data==null)
    {
        $update = $db->query($sql);
    }
    else
    {
        $update = $db->query($sql, $values);
    }
    return $update->num_rows();
}
function checkPrivilage($check="",$required="")
{
    if(isset($_SESSION["username"]))
    {
        if($check==$required)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        header("Location:login.php");
    }
    return false;
}
function checkLoggedin()
{
    if(isset($_SESSION["username"]))
    {
        return true;
    }
    else
    {
        header("Location:login.php");
        return false;
    }
    return false;
}
?>