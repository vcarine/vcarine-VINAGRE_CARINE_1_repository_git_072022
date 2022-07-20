<?php

namespace App\models;

class Article
{

    private $id;
    private $picture;
    private $title;
    private $content;
    private $created;
    private $update;
    private $slug;
    private $first_name;
    private $last_name;



    public function __construct($id, $picture, $title, $content, $created, $update, $slug, $first_name, $last_name)
    {
        $this->id             = $id;
        $this->picture        = $picture;
        $this->title          = $title;
        $this->content        = $content;
        $this->created        = $created;
        $this->update         = $update;
        $this->slug           = $slug;
        $this->first_name     = $first_name;
        $this->last_name      = $last_name;

    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getTitle(){return $this->title;}
    public function setTitle($title){$this->title = $title;}

    public function getPicture(){return $this->picture;}
    public function setPicture($picture){$this->picture = $picture;}

    public function getContent(){return $this->content;}
    public function setContent($content){$this->content = $content;}

    public function getCreated(){return $this->created;}
    public function setCreated($created){$this->created = $created;}

    public function getUpdated(){return $this->updated;}
    public function setUpdated($updated){$this->updated = $updated;}

    public function getSlug(){return $this->slug;}
    public function setSlug($slug){$this->slug = $slug;}

    public function getFirstName(){return $this->first_name;}
    public function setFirstName($first_name){$this->first_name =$first_name;}

    public function getLastName(){return $this->last_name;}
    public function setLastName($last_name){$this->last_name = $last_name;}
}

