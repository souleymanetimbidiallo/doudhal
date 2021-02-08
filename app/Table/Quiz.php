<?php
namespace App\Table;

class Quiz extends Table{

    protected static $table = 'quizzes';

    public static function getAll(){
        return self::query(
            "SELECT qz.id as id, qz.title as title, qz.description as description, 
            st.title as section, crs.title as course
            FROM quizzes qz
            LEFT JOIN sections st
            ON qz.section_id = st.id
            LEFT JOIN courses crs
            ON st.course_id = crs.id
            ORDER BY qz.id"
        );
    }

    public static function find($id){
        return static::query(
            "SELECT qz.id as id, qz.title as title, qz.description as description, 
            st.title as section, crs.title as course
            FROM quizzes qz
            LEFT JOIN sections st
            ON qz.section_id = st.id
            LEFT JOIN courses crs
            ON st.course_id = crs.id
            WHERE qz.id = ?", [$id], true
        );
    }

    public static function bySection($section_id){
        return static::query(
            "SELECT qz.id as id, qz.title as title, qz.description as description, 
            st.title as section, crs.title as course
            FROM quizzes qz
            LEFT JOIN sections st
            ON qz.section_id = st.id
            LEFT JOIN courses crs
            ON st.course_id = crs.id
            WHERE st.id = ?", [$section_id]
        );
    }

    public function getUrl(){
        return "index.php?p=quiz&id=".$this->id;
    }

    public function getExtract(){
        $html = '<p>'.substr($this->description, 0, 120).' ...</p>';
        return $html;
    }
}