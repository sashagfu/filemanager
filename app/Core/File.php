<?php

class File
{
    public $name;
    public $slug;
    public $extension;
    public $size;
    public $hash;
    public $isClickable;
    public $content;
    public $createdAt;

    private function getFileHash($path, $hashType)
    {
        switch ($hashType) {
            case 'sha1':
                return sha1_file($path);
                break;
            case 'md5':
                return md5_file($path);
                break;
            case 'custom':
                return self::customFileHashFunction($path);
                break;
        }
    }

    private function customFileHashFunction($path)
    {
        // custom file hash function';
    }

    public function getIsClickable($fileExtension)
    {
        return in_array($fileExtension, Config::get('clickable_file_types'));
    }

    public function __construct($path)
    {
        $file = new SplFileObject($path);
        $this->name = $file->getFilename();
        $this->extension = $file->getExtension();
        $this->size = formatSizeUnits($file->getSize());
        $this->hash = self::getFileHash($path, Config::get('file_hash_function'));
        $this->createdAt = date('Y-m-d H:i:s', $file->getCTime());
        $this->isClickable = in_array($file->getExtension(), Config::get('clickable_file_types'));
        $this->content = htmlspecialchars(file_get_contents($path));
        $this->slug = base64_encode($path);
    }
}
