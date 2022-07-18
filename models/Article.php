<?php

namespace App\models;

class Article
{

    private $id;
    private $image_link;
    private $title;
    private $content;
    private $author;



    public function __construct($id, $image_link, $title, $content, $author,)
    {
        $this->id             = $id;
        $this->image_link     = $image_link;
        $this->title          = $title;
        $this->content        = $content;
        $this->author         = $author;

    }
    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getTitle(){return $this->title;}
    public function setTitle($title){$this->title = $title;}

    public function getImage_link(){return $this->image_link;}
    public function setImage_link($image_link){$this->image_link = $image_link;}

    public function getContent (){return $this->content ;}
    public function setContent ($content ){$this->content  = $content ;}

    public function getAuthor (){return $this->author;}
    public function setAuthor ($author ){$this->author = $author;}




}

