<?php

class Entity {
  /* Member variables */
  private $id;
  private $todoTitle;
  private $date;

  /* Member functions */
  function setId($id){
      $this->id = $id;
  }

  function getId(){
      return $this->id;
  }

  function setTitle($todoTitle){
      $this->todoTitle = $todoTitle;
  }

  function getTitle(){
      return $this->todoTitle;
  }

  function setDate($date){
      $this->date = $date;
  }

  function getDate(){
      return $this->date;
  }
}

?>
