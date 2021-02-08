<?php
namespace Core\Alert;
/**
 * class Alert
 * Permet d'afficher les alertes
 */
class Alert{

    /**
     * @var array Données utilisées pour l'alerte
     */
    protected $type;
    protected $message;

    /**
     * @var array $message
     */
    public function __construct($type, $message){
        $this->type = $type;
        $this->message = $message;
    }

    public function getType(){
        return $this->type;
    }
    public function display(){
        $str = '<div class="alert alert-'.$this->type.'">';
        $str .= '<p>'.$this->message.'</p>';
        $str .= '</div>';
        return $str;
    }

    public function setAlert($type, $message){
        $this->type = $type;
        $this->message = $message;
    }
}
?>