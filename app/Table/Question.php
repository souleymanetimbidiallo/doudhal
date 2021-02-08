<?php
namespace App\Table;

class Question extends Table{

    protected static $table = 'questions';

    public static function getAll(){
        return self::query(
            "SELECT qts.id as id, qts.title as title, qts.description as description, 
            qz.title as quiz
            FROM questions qts
            LEFT JOIN quizzes qz
            ON qts.quiz_id = qz.id
            ORDER BY qts.id, qz.id"
        );
    }

    public static function find($id){
        return static::query(
            "SELECT qts.id as id, qts.title as title, qts.description as description, 
            qz.title as quiz
            FROM questions qts
            LEFT JOIN quizzes qz
            ON qts.quiz_id = qz.id
            WHERE qts.id = ?", [$id], true
        );
    }

    public function getUrl(){
        return "index.php?p=question&id=".$this->id;
    }

    public function getExtract(){
        $html = '<p>'.substr($this->description, 0, 120).' ...</p>';
        return $html;
    }
}