<?php


echo "SINGLEPAGE<br \>";

foreach (App\Table\Articles::find(1) as $post)
{
  echo "Article name: $post->name <br \>";
  echo "Article description: $post->description <br \>";
  echo "Article date: $post->date <br \>";
}
