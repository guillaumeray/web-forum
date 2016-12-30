<?php

foreach (App\Table\Articles::all() as $post)
{
  echo "Article name: $post->name <br \>";
  echo "Article description: $post->description <br \>";
  echo "Article date: $post->date <br \>";
  echo "---------<br \>";
}
