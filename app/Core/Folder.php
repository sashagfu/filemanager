<?php

class Folder
{
    public $name;
    public $slug;
    public $parent_slug;

    public function __construct($path)
    {
        $this->name = substr($path, strrpos($path, '/') + 1);
        $this->slug = base64_encode($path);
        $parentPath = substr($path, 0, -1 * (strlen($this->name) + 1));
        $this->parent_slug = $parentPath != '..' ? base64_encode($parentPath) : null;
    }
}
