<form action="#" method="post">
<input type="password" name="password">
<button type="submit" name="valide" >Valider</button>
</form>


<?php  
$options = [
    'cost' => 12,
];
echo password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
