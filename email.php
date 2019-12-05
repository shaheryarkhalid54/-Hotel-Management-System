<?php
$to = "03320550990@vtext.com";
$message = "Hi Jane, will you marry me?"; 
$from = "peterparker@email.com";
$subject = "From: $from\n";
mail($to,'',$message,$subject);
?>