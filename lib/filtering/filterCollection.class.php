<?php
class filterCollection
{

  public static function getAll()
  {
    $files = sfFinder::type('file')->in(sfConfig::get('sf_lib_dir') . DIRECTORY_SEPARATOR . 'filtering/filters');
    $files = array_map('basename', $files);
    $classes = array();
    foreach ($files as $file)
    {
      $classes[] = substr($file, 0, -10);
    }
    $classes = array_filter($classes, 'class_exists');
    return $classes;
  }

}