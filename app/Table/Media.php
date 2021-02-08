<?php
namespace App\Table;
use Core\Alert\Alert;
use Core\File\File;

require '../core/Alert/Alert.php';
require '../core/File/File.php';

class Media extends Table{

    protected static $table = 'medias';

    public static function getAll(){
        return self::query(
            "SELECT *
            FROM ".self::$table."");
    }

    public function getUrl(){
        return "index.php?p=media&id=".$this->id;
    }

    public static function deleteFile($filename){
        $file = new File("../public/medias/".$filename);
        return $file->delete();
    }
    /**
     * Permet d'uploader un fichier .
     * 
     * @param object $file, fichier a uploader
     * @return string message d'alerte;
     */
    public static function uploadFile($file){
        $alert = new Alert('', '');
        if(isset($file)){
            $allowed = array(
                'txt' => 'text/plain',
                'htm' => 'text/html',
                'html' => 'text/html',
                'php' => 'text/html',
                'css' => 'text/css',
                'js' => 'application/javascript',
                'json' => 'application/json',
                'xml' => 'application/xml',
                'swf' => 'application/x-shockwave-flash',
                'flv' => 'video/x-flv',
                // images
                'png' => 'image/png',
                'jpe' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'jpg' => 'image/jpeg',
                'gif' => 'image/gif',
                'bmp' => 'image/bmp',
                'ico' => 'image/vnd.microsoft.icon',
                'tiff' => 'image/tiff',
                'tif' => 'image/tiff',
                'svg' => 'image/svg+xml',
                'svgz' => 'image/svg+xml',
                // archives
                'zip' => 'application/zip',
                'rar' => 'application/x-rar-compressed',
                'exe' => 'application/x-msdownload',
                'msi' => 'application/x-msdownload',
                'cab' => 'application/vnd.ms-cab-compressed',
                // audio/video
                'mp3' => 'audio/mpeg',
                'qt' => 'video/quicktime',
                'mov' => 'video/quicktime',

                // adobe
                'pdf' => 'application/pdf',
                'psd' => 'image/vnd.adobe.photoshop',
                'ai' => 'application/postscript',
                'eps' => 'application/postscript',
                'ps' => 'application/postscript',

                // ms office
                'doc' => 'application/msword',
                'rtf' => 'application/rtf',
                'xls' => 'application/vnd.ms-excel',
                'ppt' => 'application/vnd.ms-powerpoint',

                // open office
                'odt' => 'application/vnd.oasis.opendocument.text',
                'ods' => 'application/vnd.oasis.opendocument.spreadsheet'
            );
            $filename = $file["name"];
            $filetype = $file["type"];
            $filesize = $file["size"];

            // Vérifie l'extension du fichier
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)){
                $alert->setAlert('danger', '<strong>Erreur!</strong> Veuillez sélectionner un format de fichier valide.');
                return $alert;
            }

            // Vérifie la taille du fichier - 5Mo maximum
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize){
                $alert->setAlert('danger', '<strong>Erreur!</strong> La taille du fichier est supérieure à la limite autorisée.');
                return $alert;
            }

            // Vérifie le type MIME du fichier
            if(in_array($filetype, $allowed)){
                // Vérifie si le fichier existe avant de le télécharger.
                if(file_exists("../public/medias/" . $file["name"])){
                    $alert->setAlert('danger', "<strong>".$file["name"]."</strong> existe déjà..");
                } else{
                    move_uploaded_file(
                        $file["tmp_name"], 
                        "../public/medias/" . $file["name"]
                    );
                    $alert->setAlert('success', "Votre fichier a été téléchargé avec succès");
                }
                return $alert;
            } else{                    
                $alert->setAlert('danger', "<strong>Erreur!</strong> Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.");
                return $alert;
            }
        } else{
            echo "Error: " . $file["error"];
        }
    }
}