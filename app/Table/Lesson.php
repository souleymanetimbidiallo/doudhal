<?php
namespace App\Table;

class Lesson extends Table{

    protected static $table = 'lessons';

    public static function getAll(){
        return self::query(
            "SELECT ls.id as id, ls.title as title, ls.content as content, 
            st.title as section, crs.title as course
            FROM lessons ls
            LEFT JOIN sections st
            ON ls.section_id = st.id
            LEFT JOIN courses crs
            ON st.course_id = crs.id
            ORDER BY ls.id"
        );
    }

    public static function find($id){
        return static::query(
            "SELECT ls.id as id, ls.title as title, ls.content as content, 
            st.title as section
            FROM lessons ls
            LEFT JOIN sections st
            ON ls.section_id = st.id
            WHERE ls.id = ?", [$id], true
        );
    }

    public static function bySection($section_id){
        return self::query(
            "SELECT ls.id as id, ls.title as title, ls.content as content, 
            st.title as section, crs.title as course
            FROM lessons ls
            LEFT JOIN sections st
            ON ls.section_id = st.id
            LEFT JOIN courses crs
            ON st.course_id = crs.id
            WHERE st.id = ?
            ORDER BY ls.id", [$section_id]
        );
    }

    public function getUrl(){
        return "index.php?p=lesson&id=".$this->id;
    }

    public function getExtract(){
        $html = '<p>'.substr($this->content, 0, 120).' ...</p>';
        return $html;
    }
}