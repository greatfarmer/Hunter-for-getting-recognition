<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);  //에러 발생시 표시

//include ("configure.php");
$host="localhost";
$dbid="greatfarmer";
$dbpw="d27771293";
$dbname="greatfarmer";

//include ("connect.php");
function connect_db($host, $dbid, $dbpw, $dbname)
{
  return mysqli_connect($host, $dbid, $dbpw, $dbname);
}

$connect=connect_db($host, $dbid, $dbpw, $dbname);

/* Set to UTF-8 Encoding */
mysqli_query($connect, 'set session character_set_connection=utf8;');
mysqli_query($connect, 'set session character_set_results=utf8;');
mysqli_query($connect, 'set session character_set_client=utf8;');

$data_stream = "'".$_POST['writer']."','".$_POST['field']."','".$_POST['content']."','".$_POST['start']."','".$_POST['finish']."','".$_POST['people']."'";
$query = "insert into register(writer,field,content,start,finish,people) values (".$data_stream.")";
$result = mysqli_query($connect, $query);

mysqli_close($connect);

echo('등록이 정상적으로 완료되었습니다.');
echo("<meta http-equiv='Refresh' content='2; URL=index.html'>");
?>
