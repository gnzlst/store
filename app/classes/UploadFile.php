<?php


namespace App\classes;


class UploadFile
{
    protected $filename;
    protected $max_file_size = 5000000;
    protected $extension;
    protected $path;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->filename;
    }

    /**
     * Set name of the File
     * @param $file
     * @param string $name
     */
    protected function setName($file, $name = '')
    {
        if ($name === '') {
            $name = pathinfo($file, PATHINFO_FILENAME);
        }
        $name = strtolower(str_replace(['-', ''], '-', $name));
        $hash = md5(microtime());
        $ext = $this->fileExtension($file);

        $this->filename = "{$name}-{$hash}.{$ext}";
    }

    /**
     * Set file extension
     * @param $file
     * @return mixed
     */
    protected function fileExtension($file)
    {
        return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
    }


    /**
     * Validate file size
     * @param $file
     * @return bool
     */
    public static function fileSize($file)
    {
        $fileObj = new static;
        return $file > $fileObj->max_file_size ? true : false;
    }

    /**
     * Validate file upload
     * @param $file
     * @return bool
     */
    public static function isImage($file)
    {
        $fileObj = new static;
        $ext = $fileObj->fileExtension($file);
        $validExt = array('jpg', 'jpeg', 'png', 'bmp');
        if (!in_array(strtolower($ext), $validExt)) {
            return false;
        }
        return true;
    }

    /**
     * @return mixed
     */
    public function path()
    {
        return $this->path;
    }

    /**
     * Move file to intended location
     * @param $temp_path
     * @param $folder
     * @param $file
     * @param $new_filename
     * @return UploadFile|null
     */
    public static function move($temp_path, $folder, $file, $new_filename = '')
    {
        $fileObj = new static;
        $ds = DIRECTORY_SEPARATOR;

        $fileObj->setName($file, $new_filename);
        $file_name = $fileObj->getName();

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true); // TODO: Check permissions when in production 31
        }

        $fileObj->path = "{$folder}{$ds}{$file_name}";
        $absolute_path = BASE_PATH . "{$ds}public{$ds}$fileObj->path";
        if (move_uploaded_file($temp_path, $absolute_path)) {
            return $fileObj;
        }
        return null;

    }

}