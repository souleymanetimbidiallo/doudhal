<?php
namespace App\Table;

class Answer extends Table{

    protected static $table = 'answers';

    public static function getAll(){
        return self::query(
            "SELECT ans.id as id, ans.content as content, ans.status as status,
            qts.title as question, qz.title as quiz
            FROM answers ans 
            LEFT JOIN questions qts
            ON ans.question_id = qts.id
            LEFT JOIN quizzes qz
            ON qts.question_id = qz.id
            ORDER BY qts.id, qz.id"
        );
    }

    public static function find($id){
        return static::query(
            "SELECT ans.id as id, ans.content as content, ans.status as status,
            qts.title as question, qz.title as quiz
            FROM answers ans 
            LEFT JOIN questions qts
            ON ans.question_id = qts.id
            LEFT JOIN quizzes qz
            ON qts.question_id = qz.id
            WHERE ans.id = ?", [$id], true
        );
    }

    public function getUrl(){
        return "index.php?p=answer&id=".$this->id;
    }
}