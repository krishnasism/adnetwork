<?php
class Generate
{
  public function getData($uri)
  {

    require($_SERVER['DOCUMENT_ROOT'].'/adnetwork/classes/db.php');

    $db_operation = new Database_Operations();
    $conn = $db_operation->connect();



    $query = mysqli_query($conn,"SELECT * FROM websites WHERE uri='$uri'");
    $exists = mysqli_num_rows($query);

    if($exists == 0)
    {
      return "null";
    }

    $rows = mysqli_fetch_assoc($query);
    $uid = $rows['uid'];
    $query_users = mysqli_query($conn, "SELECT username,organisation,fname,lname,contact,email FROM users WHERE id ='$uid'");
    $rows_users = mysqli_fetch_assoc($query_users);

    return array_merge($rows,$rows_users);
  }
}

 ?>
