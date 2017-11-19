<?php

/**
 * APWEB Framework (http://framework.artphoweb.com/)
 * APWEB FW(tm) : Rapid Development Framework (http://framework.artphoweb.com/)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @link      http://github.com/zebedeu/artphoweb for the canonical source repository
 * @copyright (c) 2015.  APWEB  Software Technologies AO Inc. (http://www.artphoweb.com)
 * @license   http://framework.artphoweb.com/license/new-bsd New BSD License
 * @author    Marcio Zebedeu - artphoweb@artphoweb.com
 * @version   1.0.0
 */

define("DIR_FILE", '/');
define('DS', '/');

/**
 * Class Uploads
 * @package Ballybran\Helpers
 */
class Uploads 
{

    /**
     * @var
     */
    public $path;
    /**
     * @var
     */
    private $tmp;
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $size;
    /**
     * @var
     */
    public $type;
    /**
     * @var array
     */
    private $explode;
    
    /**
     * @var
     */
    private $ext;
    /**
     * @var
     */
    private $dir;


    /**
     * Uploads constructor.
     */
    function __construct()
    {

        if (isset($_FILES['archive'])) {

            foreach ($_FILES['archive']['name'] as $i => $name) {
                $this->name = $_FILES['archive']['name'][$i];
                $this->size = $_FILES['archive']['size'][$i];
                $this->type = $_FILES['archive']['type'][$i];
                $this->tmp = $_FILES['archive']['tmp_name'][$i];

                $this->explode = explode('.', $name);

            }
        }
    }


    /**
     * @param null $dir
     */
    public function file($dir = null)
    {
        $this->dir = $dir;

        $this->make();
    }

    /**
     * @return string
     */
    private function make()
    {
            $this->makePathBayUserName();
            $this->makeDefaultPath();
            $this->makePathDirIfDefaultFileNotExist();
            return $this->move_upload();

    }


    private function makePathDirIfDefaultFileNotExist()
    {

        if (!file_exists(DIR_FILE . 'Upload' . DS . 'Default' . DS . $this->dir . DS)) {
            mkdir(DIR_FILE . 'Upload' . DS . 'Default' . DS . $this->dir . DS, 0755, true);

        }
    }

    private function move_upload()
    {
        var_dump($this->path);
        move_uploaded_file($this->tmp, $this->path);

    }

    private function makeDefaultPath()
    {
        $this->path = DIR_FILE . 'Upload' . DS . 'Default' . DS . $this->dir . DS;

    }

    private function makePathBayUserName()
    {
        $this->ext = end($this->explode);
        $this->path .= basename($this->explode[0] . time() . '.' . $this->ext);
    }

}