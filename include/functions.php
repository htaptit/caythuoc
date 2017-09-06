<?php

// connect database
$dbc = mysqli_connect(hostname, username, password, database);

if( !$dbc ){
	trigger_error(mysqli_connect_error());
} else{
	mysqli_set_charset( $dbc, charset );
}

// get all record
function mysqli_getAll( $table, $limit = null, $start = 0 , $order = false){
	global $dbc;
	$sql = 'SELECT * FROM '.$table.( $order == true ? ' ORDER BY ngaytao DESC': '' ).( $limit != null ? ' LIMIT '.$start.','.$limit : '' );
	$result = mysqli_query($dbc, $sql); confirm_query($result, $sql);
	$data = array();
	while( $rows =  mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) :
		$data[] = $rows;
	endwhile;
	return $data;
}

// get first record
function mysqli_once( $table ){
	if( mysqli_getAll( $table ) != null ) :
		return array_shift(mysqli_getAll( $table )); // get first item of array result mysqli_getAll();
	endif;
}

// get record by value
function mysqli_get_record( $table, $key , $value){
	global $dbc;
	$sql = 'SElECT * FROM '.$table.' WHERE '.$key.'="'.$value.'"';
	$result = mysqli_query($dbc, $sql); confirm_query($result, $sql);
	return mysqli_fetch_array( $result, MYSQLI_ASSOC );
}
function role($case = 4) {
    if(validate_int($case)) :
        switch($case) :
            case '4':
                $role = 'Quản Trị Viên';
                break;
            case '3':
                $role = 'Quản Lý';
                break;
            case '2':
                $role = 'Người Dùng';
                break;
            case '1':
                $role = 'Khách';
                break;
            default:
                $role = 'Khách';
                break; 
        endswitch;
        return $role;
    else :
        return false;
    endif;
}
function get_comments( $key , $value, $action = true ){
	global $dbc;
	$sql = 'SElECT *, n.avatar as avatar, n.hoten as hoten FROM binhluan AS b';
    $sql .= ' INNER JOIN nguoidung AS n';
    $sql .= ' WHERE n.id = b.idnguoidung '.($action == true ? "AND ".$key."=".$value."" : '').' ORDER BY ngay DESC';
    if($action == true) {
        $sql .= ' LIMIT 0, 10';
    }
	$result = mysqli_query($dbc, $sql); confirm_query($result, $sql);
	$data = array();
	while( $rows =  mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) :
		$data[] = $rows;
	endwhile;
	return $data;
}
// delete record
function mysqli_delete($table, $field, $subject){
	global $dbc;
	if( is_array($subject) ) :
		$str = '';
		foreach( $subject as $key => $sub ) :
			$str .= $sub.',';
		endforeach;
        $str = rtrim( $str, ',' );
		$sql = 'DELETE FROM '.$table.' WHERE '.$field.' IN ('.$str.')';
	else :
		$sql = 'DELETE FROM '.$table.' WHERE '.$field.'='.$subject;
	endif;
	mysqli_query($dbc, $sql) or die( $sql . ' ' . mysqli_error($dbc) );    
	if( mysqli_affected_rows($dbc) ) :
		return true;
	endif;
}

// validate integer ex: validate_init( $id );
function validate_int( $id ){
     if ( filter_var( $id, FILTER_VALIDATE_INT, array( 'min_range' => 1 ) ) ) :
        return $id;
     else :
        return false;
     endif;
}

// validate string
function validate_string ( $str ){
	global $dbc;
	return mysqli_real_escape_string( $dbc, $str );
}

// validate email
function validate_email( $email ){
	global $dbc;
	return filter_var( $email, FILTER_VALIDATE_EMAIL );
}

// the excerpt
function get_the_excerpt($str, $limit = null){
	if( $limit == null ) :
		$str = stripcslashes($str);
	else :
		$string = substr($str, 0, $limit);
	endif;
	return htmlentities($str, ENT_COMPAT, 'UTF-8');
}
// the content
function get_the_content($str){
	return str_replace( array('\r\n', '\n'), array( '<p>', '</p>' ), stripcslashes($str));

}

function pagination( $table, $record, $file = null, $order = false ){
    $data = mysqli_getAll($table); // all record
    $total = count( $data ); // number of record
    $nums = ceil($total/$record); // page nums
    if( isset($_GET['page']) && $_GET['page'] != '' ){
    	$page = $_GET['page'];
    } else{
    	$page = 1;
    }

    $html = '<ul>';

	if( $page != 1 ){
		$html .= '<li class="prev disabled"><a href="'.SITE_URL.( $file != null ? $file.'?' : 'index.php?' ).'page='.($page - 1).'">←</a></li>';
	}
    for( $i = 1; $i <= $nums; $i++ ){
    	if( $i != $page ){
    		$html .= '<li><a href="'.SITE_URL.( $file != null ? $file.'?' : 'index.php?' ).'page='.$i.'">'.$i.'</a></li>';
    	} else if( $i == $page ){
    		$html .= '<li class="active"><a href="javascript:void(0)">'.$i.'</a></li>';
    	}
    }

    if( $page < $nums ){
    	$html .= '<li class="next"><a href="'.SITE_URL.( $file != null ? $file.'?' : 'index.php?' ).'page='.($page + 1).'">→ </a></li>';
    }
    $html .
    $html .= '</ul>';

    if($order == true) :
        $data = mysqli_getAll( $table, $record, ($page - 1)*$record, true );
    else :
        $data = mysqli_getAll( $table, $record, ($page - 1)*$record );
    endif;
    // create $result
    $result = new stdClass();
    $result->data = $data;
    $result->pagination = $html;
    return $result;
}
function confirm_query($result, $query) {
    global $dbc;
    if(!$result) :
        die("Query {$query} \n<br /> MySQL Error : " . mysqli_error($dbc));
    endif;
}
function add_users($args = array()) {
    global $dbc;
    extract($args);
    $query = "INSERT INTO ".$table."";
    $query.= " (taikhoan, matkhau, hoten, email, noio, maquyen, trangthai, ngaydangki, avatar) VALUES";
    $query.= " ('".$username."', SHA1('{$pword}'), '".$name."', '".$email."', '".$address."', 2, '".$code."', NOW(), '".$image."')";        
    $result = mysqli_query($dbc, $query);
    confirm_query($result, $query);
    if(mysqli_affected_rows($dbc) == 1) :
        return true;
    else :
        return false;
    endif;
}
function report_errors($mgs) {
    if(!empty($mgs)) :
        foreach($mgs as $mes) :
            echo $mes;
        endforeach;
    endif;
}// END report_errors
function redirect_to($link = 'index.php') {
    return header('location: '.SITE_URL.$link);
}
function is_admin() {
    return isset($_SESSION['userLevel']) && ($_SESSION['userLevel'] == 4 && is_activated());
}
function is_manager() {
    return isset($_SESSION['userLevel']) && ($_SESSION['userLevel'] == 3 && is_activated());
}
function is_user() {
    return isset($_SESSION['userLevel']) && ($_SESSION['userLevel'] == 2 && is_activated());
}
function is_editor() {
    if(is_admin() || is_manager()) :
        return true;
    else :
        return false;
    endif;
}
function is_activated() {
    return isset($_SESSION['active']) && ($_SESSION['active'] == 1);
}
// Kiểm tra tài khoản khi truy cập vào admin
function admin_access() {
    if(is_admin() && is_activated()) :
        return true;
    else :
        return false;
    endif;
}
function is_dashboard() {
    $str = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strstr($str, 'admincp')) :
        return true;
    else :
        return false;
    endif;
} 
function is_logged_in() {
    return isset($_SESSION['userId']);
} // END is_logged_in
function is_valid_unique( $table, $key , $value ){
    $result = mysqli_get_record( $table, $key , $value );
    if( count($result) != 0 ){
        return true;
    }
}
function is_valid_title_unique( $table, $key , $value, $id, $val ){
    $result = check_record( $table, $key , $value, $id, $val );
    if( count($result) == 0 ) :
        return true;
    endif;
}
function check_record($table, $key , $value, $id, $val2) {
    global $dbc;
    $sql = 'SElECT * FROM '.$table.' WHERE '.$key.'="'.$value.'" AND '.$id.' != "'.$val2.'"';
    $result = mysqli_query($dbc, $sql); confirm_query($result, $sql);
	return mysqli_fetch_array( $result, MYSQLI_ASSOC );
}
function add_record($args = array()) {
    global $dbc;
    extract($args);
    if($action == 'add') :
        $query = "INSERT INTO {$table} ({$key1}, {$key2}) VALUES ({$val1}, {$val2})";
    else :
        $query = "UPDATE {$table} SET {$key1} = '{$val1}', {$key2} = '{$val2}' WHERE {$key1} = '{$val1}' LIMIT 1";
    endif;
    $result = mysqli_query($dbc, $query);
    confirm_query($result, $query);
    if(mysqli_affected_rows($dbc) > 0) :
        return true;
    else :
        return false;
    endif;
}
function actived_users($agrs = array()) {
    global $dbc;
    extract($agrs);
    $q = "UPDATE nguoidung SET trangthai = NULL WHERE taikhoan = '{$taikhoan}' AND trangthai = '{$code}' LIMIT 1";
    $r = mysqli_query($dbc, $q); 
    confirm_query($r, $q);
    if(mysqli_affected_rows($dbc) == 1) :
        return true;
    else :
        return false;
    endif;
}
function add_log($args = array()) {
    global $dbc;
    extract($args);
    $query = "INSERT INTO log (idnguoidung, ngaythaydoi, noidung) VALUES ({$id}, NOW(), '{$content}')";
    $result = mysqli_query($dbc, $query);
    confirm_query($result, $query);
    if(mysqli_affected_rows($dbc) > 0) :
        return true;
    else :
        return false;
    endif;
}
function the_excerpt($text, $string = 600) {
    if(strlen($text) > $string) :
        $cutString = substr($text,0,$string);
        $words = substr($text, 0, strrpos($cutString, ' '));
        return $words;
    else :
        return $text;
    endif;
   
} // End the_excerpt
function strtotime_format($str, $type = 'd-m-Y') {
    $date = new DateTime($str);
    return $date->format($type);
}
function get_author($id) {
    global $dbc;
	$sql = 'SElECT hoten FROM nguoidung WHERE id = "'.$id.'"';
	$result = mysqli_query($dbc, $sql); 
    confirm_query($result, $sql);
	$user = mysqli_fetch_array( $result, MYSQLI_ASSOC );
    return $user['hoten'];
}
function get_role($id) {
    global $dbc;
	$sql = 'SElECT maquyen FROM nguoidung WHERE id = "'.$id.'"';
	$result = mysqli_query($dbc, $sql); 
    confirm_query($result, $sql);
	$user = mysqli_fetch_array( $result, MYSQLI_ASSOC );
    return $user['maquyen'];
}
function get_record_limit($sql, $limit = 5, $start = 0){
    global $dbc;
    $sql = $sql.' LIMIT '.$start.','.$limit;
    $result = mysqli_query($dbc, $sql); confirm_query($result, $sql);
    $data = array();
    if( mysqli_num_rows($result) > 0 ){
        while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
            $data[] = $row;
        }
    }
    return $data;
}
// $rows = list data
function paging_search($sql, $limit = 5, $start = 0, $file = 'search.php'){
    $url = '';
    foreach($_GET as $key => $get){
        if( $key != 'page' ){
            $url .=  $key.'='.$get.'&';
        }
    }
    $url = str_replace( ' ', '+', $url);
    $data = get_record_limit($sql, $limit , $start = 0); // all record
    $total = count( $data ); // number of record
    $nums = ceil($total/$limit); // page nums
    if( isset($_GET['page']) && $_GET['page'] != '' ){
        $page = $_GET['page'];
    } else{
        $page = 1;
    }

    $html = '<ul>';

    if( $page > 1 ){
        $html .= '<li class="prev disabled"><a href="'.SITE_URL.( $file != null ? $file.'?' : 'search.php?' ).$url.'page='.($page - 1).'">←</a></li>';
    }

    for( $i = 1; $i <= $nums; $i++ ){
        if( $i != $page ){
            $html .= '<li><a href="'.SITE_URL.( $file != null ? $file.'?' : 'search.php?' ).$url.'page='.$i.'">'.$i.'</a></li>';
        } else if( $i == $page ){
            $html .= '<li class="active"><a href="javascript:void(0)">'.$i.'</a></li>';
        }
    }

    if( $i < $nums ){
        $html .= '<li class="next"><a href="'.SITE_URL.( $file != null ? $file.'?' : 'search.php?' ).$url.'page='.($page + 1).'">→ </a></li>';
    }
    // $html .
    $html .= '</ul>';

    $data = get_record_limit( $sql, $limit, ($page - 1)*$limit );
    // create $result
    $result = new stdClass();
    $result->data = $data;
    $result->html = $html;
    return $result;
}

/**
*   get single page by id
*   return false if page not exist
**/
function get_product_by_id(){
    global $dbc;
    if( isset($_GET['id']) &&  filter_var($_GET['id'], FILTER_VALIDATE_INT) ){
        $id = $_GET['id'];
        // $sql join 3 table
        $sql = 'SELECT *, c.id AS id, c.idbenh AS idbenh, c.idtacdung AS idtacdung, ';
        $sql .= 'c.ten AS ten, b.ten AS tenbenh, td.tentacdung AS tentacdung ';
        $sql .= 'FROM `caythuoc` AS c ';
        $sql .= 'LEFT JOIN `benh` AS b ON c.idbenh = b.id ';
        $sql .= 'LEFT JOIN `tacdung` AS td ON c.idtacdung = td.id ';
        $sql .= 'WHERE c.id ='.$id;

        //query
        $result = mysqli_query($dbc, $sql); confirm_query($result, $sql);
        if( mysqli_num_rows($result) == 1 ){
            $data = array();
            $rows = mysqli_fetch_array( $result, MYSQLI_ASSOC );
            $data = $rows;
            return $data;
        } else{
            return false;
        }

    } else{
        return false;
    }
}
function count_comment($id, $field = 'idbaiviet') {
    global $dbc;
    $query = "SELECT * FROM binhluan WHERE {$field} = '{$id}'";
    $result = mysqli_query($dbc, $query);
    confirm_query($result, $query);
    return mysqli_num_rows($result); 
}
function add_comment($args = array()) {
    global $dbc;
    extract($args);
    $query = "INSERT INTO binhluan (idnguoidung, ngay, noidung, ".$field.") VALUES ('".$userId."', '".$ngay."', '".$content."', '".$pageId."')";
    $result = mysqli_query($dbc, $query);
    confirm_query($result, $query);
    if(mysqli_affected_rows($dbc) > 0) :
        return true;
    else :
        return false;
    endif;
}
function get_time_ago($time_stamp) {
    $time_difference = strtotime('now') - $time_stamp;
    if ($time_difference >= 60 * 60 * 24 * 365.242199) {
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 365.242199, 'năm');
    } elseif ($time_difference >= 60 * 60 * 24 * 30.4368499) {
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 30.4368499, 'tháng');
    } elseif ($time_difference >= 60 * 60 * 24 * 7) {
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 7, 'tuần');
    } elseif ($time_difference >= 60 * 60 * 24) {
        return get_time_ago_string($time_stamp, 60 * 60 * 24, 'ngày');
    } elseif ($time_difference >= 60 * 60) {
        return get_time_ago_string($time_stamp, 60 * 60, 'giờ');
    } else {
        return get_time_ago_string($time_stamp, 60, 'phút');
    }
}
function get_time_ago_string($time_stamp, $divisor, $time_unit) {
    $time_difference = strtotime("now") - $time_stamp;
    $time_units      = floor($time_difference / $divisor);
    settype($time_units, 'string');

    if ($time_units === '0') {
        return 'Vừa xong';
    }
    elseif ($time_units === '1') {
        return '1 ' . $time_unit . ' trước';
    } else {
        return $time_units . ' ' . $time_unit . ' trước';
    }
}
?>