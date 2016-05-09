<?php
function open_database_connection()
{
	$link=mysql_connect('localhost','mysite','mysite');
	mysql_select_db('mysite',$link);
	mysql_query("SET NAMES UTF8");
	return $link;
}
function close_database_connection($link)
{
	mysql_close($link);
}
function getRequest(){
	if(empty($_REQUEST['_title'])
		&& empty($_REQUEST['_content'])
			&& empty($_REQUEST['_author'])){
		return false;
	}
	if(isset($_REQUEST['_id']))
		$request['id']=$_REQUEST['_id'];
	$request["title"]=$_REQUEST['_title'];
	$request["content"]=$_REQUEST['_content'];
	$request["author"]=$_REQUEST['_author'];
	$request["date"]=date("Y-m-d H:i:s");
	return $request;
}
function get_all_rows()
{
	$link=open_database_connection();
	$result=mysql_query('SELECT * FROM pages',$link);
	$rows=array();
	while($row=mysql_fetch_assoc($result)){
		$rows[]=$row;
	}
	close_database_connection($link);
	return $rows;
}
function add_row()
{
	if(!$request=getRequest()) return false;

	$link=open_database_connection();
	$sql="INSERT INTO pages (`date`,title,`content`,`author`) 
			VALUES('".$request["date"]."',
				'".$request["title"]."',
				'".$request["content"]."',
				'".$request["author"]."')";
		mysql_query($sql);
	close_database_connection($link);

	return true;
}
function get_row($id)
{
	$link=open_database_connection();
	$result=mysql_query("SELECT * FROM pages WHERE id='$id'",$link);
	$row=mysql_fetch_assoc($result);
	close_database_connection($link);
	
	return $row;
}
function delete_row($id)
{
	$link=open_database_connection();
	$result=mysql_query("DELETE FROM pages WHERE id='$id'",$link);
	close_database_connection($link);
	
	return $result;
}
function update_row()
{
	if(!$request=getRequest()) return false;
$sql="UPDATE `pages` SET `date`='".$request['date']."', 
						`title`='".$request['title']."', 
						`author`='".$request['author']."', 
						`content`='".$request['content']."'  
						 WHERE id=".$request['id'];
	$link=open_database_connection();
	$result=mysql_query($sql,$link) or die("error! ".$sql." == ".mysql_error());
	close_database_connection($link);
	
	return $result;
}
