<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';

//Ajax call for state where values are going to be fetch by countries table on the behalf of country_id.
if(isset($_POST['country_id']) && !empty($_POST['country_id'])){

$query = $mysqli->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']."  ORDER BY state_name ASC");
$rowCount= $query->num_rows;

if($rowCount>0){
echo '<option value="">Select State</option>';
while($row=$query->fetch_assoc()){

echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';
}

}
else{

echo '<option value="">State Not Available</option>';

}
}

?>