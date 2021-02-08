<?php
/**
 * class Form
 * Permet de générer un formulaire rapidement et simplement
 */
class TableHTML{

    public function createHtmlTable($table_name, $headings, $attributes, $datas){
        $str = "<table class=\"table table-bordered table-hover table-striped\">
                <thead class=\"thead-dark\"><tr>";

        foreach($headings as $heading){
            $str .= $this->tableCells($heading, "th");
        }

        $str .= "</tr></thead><tbody><tr>";

        foreach($datas as $data){
            foreach ($data as $key => $value){
                if(in_array($key, $attributes)){
                    $str .= $this->tableCells($value, "td");
                }
            }
            $str .= '<td>';
            $str .= '<a href="?p='.$table_name.'.edit&id='.$data->id.'" class="btn btn-primary"><span class="fa fa-edit"></span></a>';
            $str .= '<form action="?p='.$table_name.'.delete" method="POST" class="d-inline">';
            $str .= '<input type="hidden" name="id" value="'.$data->id.'">';
            $str .= '<button type="submit" class="ml-2 btn btn-danger"><span class="fa fa-trash-alt"></span></button>';
            $str .= "</form>";
            $str .= '<a href="#" class="ml-2 btn btn-purple"><span class="fa fa-eye"></span></a>';
            $str .= '</td></tr>';
        }
        $str .= "</tbody></table>";
        return $str;

    }

    public function tableCells($value, $type){
        $str = "";
        $str .= "<".$type.">".$value."</".$type.">";
        return $str;
    }


    /**
     * @var array Données utilisées par le formulaire
     */
    protected $data;
    
    /**
     * @var string Tag utilisé pour entourer les champs
     */
    public $surround = 'p';

    /**
     * @var array $data Données utilisées par le formulaire
     */
    public function __construct($data = array()){
        $this->data = $data;
    }

    /**
     * @param $html string Code HTML à entourer
     * @return string
     */
    protected function surround($html){
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    /**
     * @param $index string  Index de la valeur à récuperer 
     * @return string
     */
    protected function getValue($index){
        if(is_object($this->data)){
            return $this->data->$index;
        }
        return isset($this->data[$index]) ?$this->data[$index] :null;
    }

    /**
     * @param $name string 
     * @param $label string 
     * @param $options array 
     * @return string
     */
    public function input($name, $label, $options = []){
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround('
            <input type="'.$type.'" name="'.$name.'" value = "'.$this->getValue($name).'">'
        );
    }

    /**
     * @return string
     */
    public function submit(){
        return $this->surround('<button type="submit">Envoyer</button>');
    }
}
?>