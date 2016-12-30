<?php

echo "SUBSCRIPTION";

if (isset($_POST['login']) AND isset($_POST['password']))
{
  $post = App\Application::getDb()->prepareinsert('INSERT INTO
                              Users (login, password)
                              VALUES (?, ?)',
                              [$_POST['login'], $_POST['password']],
                              'App\Table\Users');
  echo "<br \> Subscription : " . $_POST['login'] . "validee <br \> ";
}
else
{
  echo "<form action='index.php' method='post'>
        <input name='login' type='text'><br \>
        <input name='password' type='text'><br \>
        <input name='form' value='subscription' type='hidden'><br \>
        <input name='submit' type='submit' value='Envoyer'><br \>
        </form>";
}
