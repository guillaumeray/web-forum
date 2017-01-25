<?php

if (isset($_GET['room']))
{
  $room = $_GET['room'];
  if (isset($_GET['action']))
  {
    if ($_GET['action'] == 'write')
    {
      echo "<form action='index.php' method='post'>
            Message:<br \>
            <input name='message' type='text'><br \>
            <input name='room' type='hidden' value=$room>
            <input name='form' type='hidden' value='send_room_message'>
            <input name='submit' type='submit' value='Envoyer'><br \>
            </form>";
    }
  }
  else
  {
    try
    {
      echo "Room <b>" . $room . "</b><br \>";
      echo "<a href='index.php?page=room&room=$room&action=write'>Ecrire</a><br \>";
      foreach (App\Table\Messages::get_messages_by_room($_GET['room']) as $post)
      {
        echo "Login: <b>$post->login</b> <br \>";
        echo "Date: $post->date <br \>";
        echo "Message: $post->message <br \>";
        echo "---------<br \>";
      }
    }
    catch (Exception $e)
    {
      echo $e->getMessage();
    }
  }
}
else if (isset($_POST['form']))
{
  if ($_POST['form'] == "send_room_message")
  {
    if (isset($_POST['room']) AND isset($_POST['message']))
    {
      $date = new DateTime();
      $date = $date->format('Y-m-d H:i:s');
      $room = $_POST['room'];
      $message = $_POST['message'];
      try
      {
        $post = App\Table\Messages::send_message($user->login, $room, $date, $message);
        if ($post)
        {
          echo "<br \> Message envoye <br \> ";
        }
        else
        {
          echo "<br \> Erreur message non envoye <br \> ";
        }

        echo "<a href='index.php?page=room&room=$room'>Retour room</a><br \>";
      }
      catch (Exception $e)
      {
        echo $e->getMessage();
      }
    }
  }
}
