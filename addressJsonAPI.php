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
     $country = ''; 
     while ($country_array = mysql_fetch_array($result,MYSQL_ASSOC)) 
     {
        $country = $country_array;         
     }

     $sql = "select * from province where country_id =  '" . $country['id']. "' ";
     $result = mysql_query($sql);
     $prov_array = array();
      while ($province = mysql_fetch_array($result,MYSQL_ASSOC)) 
      {
        $prov_array[ $province['id'] ] = $province;  
      }
      $country['provinces'] = $prov_array;

      
      foreach ($country['provinces'] as $province) 
      {
        $province_id = $province['id'];
        $sql = "select * from city where province_id =  '" . $province_id. "' ";
        $result = mysql_query($sql);
        $city_array =array();
        while ($city = mysql_fetch_array($result,MYSQL_ASSOC)) 
        {
          $city_array[ $city['id']] = $city; 
        }
        $country['provinces'][$province_id]['cities'] = $city_array; 
    
      }

      foreach ($country['provinces'] as $province) 
      {
          $province_id = $province['id'];

          $sql = "select * from city where province_id =  '" . $province_id. "' ";
          $result = mysql_query($sql);
          $city_array =array();
          while ($city = mysql_fetch_array($result,MYSQL_ASSOC)) 
          {
              $city_id = $city['id'];

              $sql = "select * from district where city_id= '" . $city_id. "'";
              $dist_result = mysql_query($sql);
              $dist_array = array();
              while ($district = mysql_fetch_array($dist_result,MYSQL_ASSOC)  ) 
              {
                  $district_id =$district['id'];
                  $dist_array[$district_id] = $district;
              }

              $city['districts'] = $dist_array;
              $city_array[$city_id] = $city;
          }

          $country['provinces'][$province_id]['cities'] = $city_array; 
        
      }
      var_dump( $country['provinces'][9]['cities'][224]['districts'][2112]);
      //var_dump($country);
      
      echo "\n";
      print(json_encode($country['provinces'][9]['cities'][224]['districts'][2112]));
      echo "\n";


    mysql_close($conn);  
?>