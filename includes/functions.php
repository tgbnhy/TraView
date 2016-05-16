<?php
include "db_connect.php";
function load_points($mysqli){

    $output = "[";
    $query = 'SELECT t.userid, v.venue, v.lat, v.lng, t.description from (select * from tb_venue limit 10) v left join tb_tips t on v.location = t.location order by t.userid asc';
    //$query = 'SELECT t.userid, v.venue, v.lat, v.lng from (select * from tb_venue limit 100) v join (select * from tb_tips where userid = 1416466 or userid = 3113383) t on v.location = t.location order by t.userid asc';
    if ($stmt = $mysqli->prepare($query)) {
      //$stmt->bind_param('', $id);
      $stmt->execute();   // Execute the prepared query.
      $stmt->store_result();
      $stmt->bind_result($id, $venue, $lat, $lng, $desc);
      
      while($stmt->fetch()){
        $output .= "[".$lat.",".$lng.",".$id.",\"".$venue."\",\"".$desc."\"],";
      }
      $output = rtrim($output, ",")."]";
    }    
    //return "[[-37.808587, 144.963871, \"Centre Point\"]]";
    return $output;
}

function insert_tips($mysqli, $number, $user_id, $location_id, $tip)
{
        $query = 'INSERT INTO tb_tips (record, userid, location, description)
        VALUES (?, ?, ?, ?)';
        if ($stmt = $mysqli->prepare($query)){
            // Bind "$user_id" to parameter.
            $stmt->bind_param('isss', $number, $user_id, $location_id, $tip);
            $stmt->execute();   // Execute the prepared query.
        }
        else{
          return "<p class='bg-danger'>Алдаа</p>";
        }        
}
?>
