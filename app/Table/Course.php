<?php
namespace App\Table;
use Core\Alert\Alert;

require '../core/Alert/Alert.php';

class Course extends Table{

    protected static $table = "courses";

    public static function getAll(){
        return self::query(
            "SELECT crs.id as id, crs.title as title, DATE_FORMAT(creation_date, \"%d/%m/%Y\") as creation_date, 
            duration, price, crs.description as description, picture,
            cat.title as category, concat(u.first_name,' ', u.last_name) as author
            FROM courses crs
            LEFT JOIN categories cat
            ON crs.category_id = cat.id
            LEFT JOIN users u
            ON crs.user_id = u.id
            ORDER BY crs.id"
        );
    }

    
    public static function find($id){
        return self::query(
            "SELECT crs.id as id, crs.title as title, creation_date, duration, price,  
            crs.description as description, picture, user_id, category_id,
            cat.title as category, concat(u.first_name,' ', u.last_name) as author
            FROM courses crs
            LEFT JOIN categories cat
            ON crs.category_id = cat.id
            LEFT JOIN users u
            ON crs.user_id = u.id
            WHERE crs.id = ?", 
            [$id], true);
    }


    public static function byCategory($category_id){
        return self::query(
            "SELECT crs.id as id, crs.title as title, creation_date, duration, price, crs.description as description, picture,
            cat.title as category, concat(u.first_name,' ',u.last_name) as author
            FROM courses crs
            LEFT JOIN categories cat
            ON crs.category_id = cat.id
            LEFT JOIN users u
            ON crs.user_id = u.id
            WHERE crs.category_id = ?
            ORDER BY crs.id DESC",[$category_id]);
    }
    public static function byAuthor($user_id){
        return self::query(
            "SELECT crs.id as id, crs.title as title, creation_date, duration, price,   crs.description as description, picture,
            cat.title as category, concat(u.first_name,' ', u.last_name) as author
            FROM courses crs
            LEFT JOIN categories cat
            ON crs.category_id = cat.id
            LEFT JOIN users u
            ON crs.user_id = u.id
            WHERE crs.user_id = ?
            ORDER BY pr.designation DESC",[$user_id]);
    }
    
    public function __get($key){
        $method = 'get'.ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public function getUrl(){
        return "index.php?p=course&id=".$this->id;
    }

    public function getExtract(){
        $html = '<p>'.substr($this->description, 0, 80).' ... <span class="text-dark font-italic">@'.$this->category.'</span></p>';
        return $html;
    }

    public static function uploadPicture($file){
        $alert = new Alert('', '');
        if(isset($file)){
            $allowed = array(
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
                'svgz' => 'image/svg+xml'
            );
            $filename = $file["name"];
            $filetype = $file["type"];
            $filesize = $file["size"];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $maxsize = 5 * 1024 * 1024;

            // Vérifie l'extension du fichier
            if(!array_key_exists($ext, $allowed)){  
                $alert->setAlert('danger', '<strong>Erreur!</strong> Veuillez sélectionner un format de fichier valide.');
            }
            // Vérifie la taille du fichier - 5Mo maximum
            else if($filesize > $maxsize){ 
                $alert->setAlert('danger', '<strong>Erreur!</strong> La taille du fichier est supérieure à la limite autorisée.');
            }
            // Vérifie le type MIME du fichier
            else if(in_array($filetype, $allowed)){
                    $taille = getimagesize($file['tmp_name']);
                    $largeur = $taille[0];
                    $hauteur = $taille[1];
                    $largeur_miniature = 300;
                    $hauteur_miniature = $hauteur / $largeur * 300;
                    $im = imagecreatefromjpeg($file['tmp_name']);
                    $im_miniature = imagecreatetruecolor($largeur_miniature, $hauteur_miniature);
                    imagecopyresampled($im_miniature, $im, 0, 0, 0, 0, $largeur_miniature, $hauteur_miniature, $largeur, $hauteur);
                    imagejpeg($im_miniature, '../public/images/courses/miniatures/'.$filename, 90);
                    move_uploaded_file($file["tmp_name"], "../public/images/courses/" . $filename);
                    $alert->setAlert('success', "Votre fichier a été téléchargé avec succès");
            }else{                    
                $alert->setAlert('danger', "<strong>Erreur!</strong> Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.");
            }
        } else{
            $alert->setAlert('danger', "<strong>Erreur!</strong> ".$file["error"]);
        }
        return $alert;
    }
}