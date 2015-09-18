<?php

class Gallery
{
  // Returns an array of all the categories (subdirs)
  function fetchCategories()
  {
    $output = array();
    $baseDir = scandir(IMAGE_BASE);

    foreach($baseDir as $category)
    {
      if(!strpos($category, ".") && $category != "." && $category != "..")
      {
        array_push($output, $category);
      }
    }

    return $output;
  }

  // Returns an array of all the images in a defined directory.
  function importFromDir($directory, $extensions="jpg,gif,png,jpeg")
  {
    $files = array();
    $directory = (substr($directory, -1) == "/" ? $directory : $directory."/");

    foreach(glob(IMAGE_BASE.$directory."*.{".$extensions."}", GLOB_BRACE) as $file)
    {
      array_push($files, $file);
    }

    return $files;
  }
}

?>
