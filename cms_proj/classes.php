<?php

class Article 
{
    public $id = null;
    public $publication_date = null;
    public $title = null;
    public $summary = null;
    public $content = null;

    public function const_function ($data = array())
    {
        if (isset($data['id']))
        $this->$id = (int)$data['id'];

        if (isset($data['publication_date']))
        $this->$publication_date = (int)$data['publication_date'];

        if ( isset( $data['title'] ) ) $this->title = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['title'] );

        if ( isset( $data['summary'] ) ) $this->summary = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['summary'] );

        if ( isset( $data['content'] ) ) $this->content = $data['content'];
        
    }


public function storeFormValues ( $params ) {

    
    $this->__construct( $params );

    // Parse and store the publication date
    if ( isset($params['publicationDate']) ) {
      $publicationDate = explode ( '-', $params['publicationDate'] );

      if ( count($publicationDate) == 3 ) {
        list ( $y, $m, $d ) = $publicationDate;
        $this->publicationDate = mktime ( 0, 0, 0, $m, $d, $y );
      }
    }
  }

  public static function getById( $id ) {
    
    $pdo = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
    $sql = "SELECT * , UNIX_TIMESTAMP(publicationdate) AS publicationdate FROM articles where id = :id";
    $temp= $pdo->prepare($sql);
    $temp->bindvalue(":id", $id);
    $temp->execute();
    $row = $pdo->fetch();
    $pdo = null;

    return new Article($row);
  }}