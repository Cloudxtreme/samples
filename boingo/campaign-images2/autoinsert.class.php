<?php

class autoInsert{
var $db_conn;
 
function iConnect($user, $pass, $host = 'localhost'){
if ($this->db_conn = mysql_connect($host, $user, $pass)){
return true;
}else{
echo mysql_error();
return false;
}
}
 
function iSelect($db){
if (mysql_select_db($db)){
return true;
}else{
echo mysql_error();
return false;
}
}
// 
function iInsert($table, $postData = array()){
$q = "DESC $table";
$q = mysql_query($q);
 
$getFields = array();
 
while ($field = mysql_fetch_array($q)){
$getFields[sizeof($getFields)] = $field['Field'];
}
 
$fields = "";
$values = "";
 
if (sizeof($getFields) > 0){
foreach($getFields as $k){
if (isset($postData[$k])){
$postData[$k] = htmlspecialchars($postData[$k]);
 
$fields .= "`$k`, ";
$values .= "'$postData[$k]', ";
}
}
 
$fields = substr($fields, 0, strlen($fields) - 2);
$values = substr($values, 0, strlen($values) - 2);
 
$insert = "INSERT INTO $table ($fields) VALUES ($values)";
 
if (mysql_query($insert)){
return true;
}else{
echo mysql_error();
return false;
}
}else{
return false;
}
}
 
function iUpdate($table, $postData = array(), $conditions = array()){
$q = "DESC $table";
$q = mysql_query($q);
 
$getFields = array();
 
while ($field = mysql_fetch_array($q)){
$getFields[sizeof($getFields)] = $field['Field'];
}
 
$values = "";
$conds = "";
 
if (sizeof($getFields) > 0){
foreach($getFields as $k){
if (isset($postData[$k])){
$postData[$k] = htmlspecialchars($postData[$k]);
 
$values .= "`$k` = '$postData[$k]', ";
}
}
 
$values = substr($values, 0, strlen($values) - 2);
 
foreach($conditions as $k => $v){
$v = htmlspecialchars($v);
 
$conds .= "`$k` = '$v'";
}
 
$update = "UPDATE $table SET $values WHERE $conds";
 
if (mysql_query($update)){
return true;
}else{
echo mysql_error();
return false;
}
}else{
return false;
}
}
 
function iDisconnect(){
if (mysql_close($this->db_conn)){
return true;
}else{
echo mysql_error();
return false;
}
}
 
}

?>