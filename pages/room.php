<?php


foreach (App\Table\Room::all() as $post)
{
  echo "Room name: $post->name <br \>";
  echo "Room description: $post->description <br \>";
  echo "<a href='../public/index.php?page=room&room=$post->name'>Enter room</a><br \>";
  echo "---------<br \>";
}
