<?php

/**
 *
 * APWEB Framework (http://framework.artphoweb.com/)
 * APWEB FW(tm) : Rapid Development Framework (http://framework.artphoweb.com/)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @link      http://github.com/zebedeu/artphoweb for the canonical source repository
 * @copyright (c) 2016.  APWEB  Software Technologies AO Inc. (http://www.artphoweb.com)
 * @license   http://framework.artphoweb.com/license/new-bsd New BSD License
 * @author    Marcio Zebedeu - artphoweb@artphoweb.com
 * @version   1.0.0
 */


class Uploads{

   
    private $files;
    public $path;
    private $tmp;
    public $name;
    public $size;
    public $type;
    private $dir;

    public function file($dir = null) {
        if (!empty($dir)) {
            if (isset($_FILES['archive'])) {
                foreach ($_FILES['archive']['name'] as $i => $name) {
                    $this->name = $_FILES['archive']['name'][$i];
                    $this->size = $_FILES['archive']['size'][$i];
                    $this->type = $_FILES['archive']['type'][$i];
                    $this->tmp = $_FILES['archive']['tmp_name'][$i];

                    $explode = explode('.', $name);
                    $ext = end($explode);
                   
                    $this->path = DIR_FILE . 'Upload' . DS . 'Default' . DS . $dir . DS;
                
                    $this->path .= basename($explode[0] . time() . '.' . $ext);
                    $explode = explode('.', $name);

                    // echo $ext . "<br/>";



                    if (empty($this->type)) {
                        return $errors[] = '<div class="btn btn-danger"> Por favor, escolhe 1 ficheiro para ser carregado</div>';
                    } else {
                        $allowed = array('jpg', 'JPG', 'jpeg', 'gif', 'btm', 'png', 'txt', 'docx', 'doc', 'pdf', 'mp3');

                        if (in_array($ext, $allowed) === false)
                            return $errors[] = '<div class="btn btn-danger">A extensao do ficheiro nao foi permitido </div>';
                    }
//                              100000000
                    $max_size = 100000000;
                    if ($this->size > $max_size) {
                        return $errors[] = '<div class="btn btn-danger"> O tamanho do ficheiro é muito grande</div>';
                    }
                }// end foreach
            } // end if

            if (empty($errors)) {
              
                if (!file_exists(DIR_FILE . 'Upload'  . DS . $dir . DS)) {
                    mkdir(DIR_FILE . 'Upload' .  DS . $dir . DS, 0777, true);
                  
                  }  // chmod('uploads/', 0755);
                else if (!file_exists(DIR_FILE . 'Upload' . DS . 'Default' . DS . $dir . DS)) {
                    mkdir(DIR_FILE . 'Upload' . DS . 'Default' . DS . $dir . DS, 0777, true);
                  
                  }  // chmod('uploads/', 0755);
                
                if (move_uploaded_file($this->tmp, $this->path )) {
                    $output = '<div class="btn btn-success">';
                    $output .= 'Ficheiro carregado  com sucesso';
                    $output .= '</div>';
                    return $output;
                } else {
                    $output = '<div class="btn btn-warning">';
                    $output .= 'Nenhum ficheiro foi carregado';
                    $output .= '</div>';
                    return $output;
                }
            }
        }
    }


    public function formUploadFiles($dir_rec = null, $type = "hidden", $name = null, $value = null) {
        $var = "";
        $var .= "<form method='POST' enctype='multipart/form-data' action='" . $dir_rec . "'>";
        $var .= "<input type='hidden' name=' ini_get('session.upload_progress.name'); ' value='123' />";

        $var .= "<input type='file' name='archive[]' multiple ><br/>";
        $var .= "<input type='$type' name='$name' value='$value'> <br/>";
        $var .= "<button type='submit'  class=' btn btn-lg btn-default glyphicon glyphicon-upload'></button></form>";
        return $var;
    }

}
