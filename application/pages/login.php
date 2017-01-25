<?php

use App\Table\Users;

echo "LOGIN<br\>";

if (isset($_POST['login']) AND isset($_POST['password']))
{
  try
  {
    $post = Users::user_connexion($_POST['login'], $_POST['password']);
    $user = $post[0];
    $_SESSION['user'] = serialize($user);
    echo '<br \> Bienvenue ' . $user->login . '<br \>';
  }
  catch (Exception $e)
  {
    echo $e->getMessage();
  }
}
else
{
  echo "<form action='index.php' method='post'>
        <input name='login' type='text'><br \>
        <input name='password' type='text'><br \>
        <input name='form' value='login' type='hidden'><br \>
        <input name='submit' type='submit' value='Envoyer'><br \>
        </form>";
}
