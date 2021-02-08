<?php
namespace App\Table;

class Category extends Table{

    protected static $table = 'categories';

    public static function getAll(){
        return self::query(
            "SELECT *
            FROM ".self::$table."");
    }

    public static function getInfos(){
        return self::query(
            "SELECT cat.title as title, count(distinct crs.title) as course, count(distinct st.title) as section, 
            count(distinct ls.title) as lesson, count(distinct qz.title) as quiz
            FROM categories cat
            LEFT JOIN courses crs
            ON crs.category_id = cat.id
            LEFT JOIN sections st
            ON st.course_id = crs.id
            LEFT JOIN lessons ls
            ON ls.section_id = st.id
            LEFT JOIN quizzes qz
            ON qz.section_id = st.id
            GROUP BY title"
        );
    }

    public function getUrl(){
        return "index.php?p=category&id=".$this->id;
    }
}