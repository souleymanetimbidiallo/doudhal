<?php
namespace App\Table;

class Section extends Table{

    protected static $table = 'sections';

    public static function getAll(){
        return self::query(
            "SELECT st.id as id, st.title as title, 
            crs.title as course
            FROM sections st
            LEFT JOIN courses crs
            ON st.course_id = crs.id
            ORDER BY st.id"
        );
    }

    public static function find($id){
        return static::query(
            "SELECT st.id as id, st.title as title, 
            crs.title as course
            FROM sections st
            LEFT JOIN courses crs
            ON st.course_id = crs.id
            WHERE st.id = ?", [$id], true
        );
    }

    public static function byCourse($course_id){
        return self::query(
            "SELECT st.id as id, st.title as title, 
            crs.title as course
            FROM sections st
            LEFT JOIN courses crs
            ON st.course_id = crs.id
            WHERE crs.id = ?
            ORDER BY st.id", [$course_id]
        );
    }

    public function getUrl(){
        return "index.php?p=section&id=".$this->id;
    }
}