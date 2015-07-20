<?php
    // 连接到数据库
    $conn = mysql_connect('localhost', 'root','1234567890');
     if( !$conn)
     {
     	die('Could not connect: ' . mysql_error() );
     }

     mysql_query("set character set 'utf8'");//读库 
     mysql_query("set names 'utf8'");//写库 

     mysql_select_db("taobao");

     $sql = "select * from country where id =1";
     $result = mysql_query($sql);
     while ($country = mysql_fetch_array($result,MYSQL_ASSOC)) 
     {
          $sql = "select * from province where country_id =  '" . $country['id']. "' ";
          $result = mysql_query($sql);
          $prov_array = array();
          while ($province = mysql_fetch_array($result,MYSQL_ASSOC)) 
          {
               $prov_array[] = $province;  
          }
          $country['provinces'] = $prov_array;
          var_dump($country);
          //print(json_encode($country));
          echo "\n";
     }

    mysql_close($conn);  
?>