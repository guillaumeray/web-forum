<?php

session_start();

// autoload class
require "../vendor/autoload.php";

// use app for db
use App\Application;


if (isset($_SESSION['user']))
{
  $user = unserialize($_SESSION['user']);
  echo "<br \>Account name <b>" . $user->login . "</b><br \>";

  // get page
  if (isset($_GET['page']))
  {
    if ($_GET['page'] == 'single')
    {
      if (isset($_GET['id']))
      {
        require "../pages/single.php";
      }
      else
      {
        echo 'id does not exist';
      }
    }
    else if ($_GET['page'] == 'room')
    {
      if (isset($_GET['room']))
      {
        require "../pages/messages.php";
      }
      else
      {
        require "../pages/room.php";
      }
    }

  }

  // post form
  if (isset($_POST['form']))
  {
    if ($_POST['form'] == "send_room_message")
    {
      echo "Send a room message";
      require "../pages/messages.php";
    }
  }
  else
  {
    echo "Aucune page selectionee<br \>";
  }

  // connexion link
  echo "<a href='?page=single&id=1'>voir article 1</a><br \>";
  echo "<a href='?page=room'>liste des rooms</a><br \>";
}
else
{
  // get page
  if (isset($_GET['page']))
  {
    if ($_GET['page'] == 'subscription')
    {
      echo "pas de subscription";
      require "../pages/subscription.php";
    }
    else if ($_GET['page'] == 'login')
    {
      echo "login";
      require "../pages/login.php";
    }
  }

  // post form
  if (isset($_POST['form']))
  {
    if ($_POST['form'] == "subscription")
    {
      echo "Subscription";
      require "../pages/subscription.php";
    }
    else if ($_POST['form'] == "login")
    {
      echo "Login";
      require "../pages/login.php";
    }
  }

  // no connexion link
  echo "Please login";
  echo "<a href='?page=login'>login</a><br \>";
  echo "<a href='?page=subscription'>s'inscrire</a><br \>";
}

echo "<a href=''>retour index</a><br \>";
