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

     $sql = "select id,city from city  where province_id <35  order by id";
     $city = mysql_query($sql);
     $file = fopen("EveryCity.txt", "w");
     while ($row = mysql_fetch_array($city)) 
     {
     	$city_id = $row['id'];
     	$city_id = mysql_real_escape_string($city_id);

     	$sql = "select count(*) as num from district where city_id = '" . $city_id. "' ";
     	$district = mysql_query($sql);
     	$count = mysql_fetch_array($district);

     	$line = $row['id']." ".$row['city']." ".$count['num']."\n";
     	fwrite($file, $line);
     }
     fclose($file);

     $sql = "select id,district from district order by id";
     $district = mysql_query($sql);
     $file = fopen("EveryDistrict.txt","w");
     while ($row =mysql_fetch_array($district)) 
     {
     	$district_id = $row['id'];
     	$district_id = mysql_real_escape_string($district_id);

     	$sql = "select  count(*) as num from street where district_id = '" . $district_id. "' ";
     	$street = mysql_query($sql);
     	$count = mysql_fetch_array($street);

     	$line = $line = $row['id']." ".$row['district']." ".$count['num']."\n";
     	fwrite($file, $line);
     }
     fclose($file);

    mysql_close($conn);  
?>