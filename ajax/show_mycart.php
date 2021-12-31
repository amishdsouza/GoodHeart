<?php 
session_start();
    $total = 0;

    
$to = 0;

$output = "";

$output .= "
  <table class='table table-bordered table-striped'>
    <tr >
      <th>ID</th>
      <th>NAME</th>
      <th>Description</th>
    </tr>
";

if (!empty($_SESSION['mycart'])) {





	foreach ($_SESSION['mycart'] as $key => $value) {


		$output .= "
          <tr>
            <td>".$value['id']."</td>
            <td>".$value['name']."</td>
            <td>$ ".$value['description']."</td>
            <td>
              <button class='btn btn-danger remove' id='".$value['id']."'>Remove</button>
            </td>
		";
	}






	$output .= "
      <tr>
        <td>
          <button class='btn btn-warning btn-block clearall' id='".$value['id']."'>Clear All</button>
        </td>
        
      </tr>
	";



	$to = count($_SESSION['mycart']);
	
}else{


}

$data['da'] = $to;
$data['out'] = $output;


echo json_encode($data);

?>