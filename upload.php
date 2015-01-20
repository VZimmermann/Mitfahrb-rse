<?php
if(isset($_POST['datei']){
move_uploaded_file($_FILES['datei']['tmp_name'], "upload/".$_FILES['datei']['name']);
}
else{
echo'Es wurde keine Datei ausgewählt!';
}
?>
