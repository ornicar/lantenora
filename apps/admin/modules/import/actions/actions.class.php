<?php

class importActions extends dmAdminBaseActions
{
  protected function getConnection()
  {
    $dsn = 'mysql:dbname=lestroiscouronnes;host=localhost';
    $user = 'root';
    $password = 'm';
    
    $pdo = new PDO($dsn, $user, $password);
    
//    $pdo->exec('SET CHARACTER SET utf8');
    
    return Doctrine_Manager::getInstance()->openConnection($pdo, 'old', false);
  }
  
  protected function getData(Doctrine_Connection $conn, $tableName)
  {
    return dmDb::pdo('SELECT * FROM '.$tableName, array(), $conn)->fetchAll(Doctrine::FETCH_ASSOC);
  }
  
  public function executeGo()
  {
    throw new dmException();
    $conn = $this->getConnection();
     
//    $this->importGaleries($conn);
     
    $this->importImages($conn);
    
    $this->getUser()->logInfo('Import succeeded');
    
    return $this->redirect('image');
  }
  
  protected function importGaleries(Doctrine_Connection $conn)
  {
    $data = $this->getData($conn, 'pap_gal');
    $table = dmDb::table('Rubrique');
    $table->createQuery()->delete()->execute();
    
    $collec = new Doctrine_Collection($table);
    foreach($data as $rubrique)
    {
      $collec[] = $table->create(array(
        'id' => $rubrique['id'],
        'nom' => $rubrique['nom'],
        'position' => $rubrique['rank'],
        'created_at' => $rubrique['created_at'],
        'updated_at' => $rubrique['updated_at'],
        'is_active' => $rubrique['is_approved']
      ));
    }
    $collec->save();
  }
  
  protected function importImages(Doctrine_Connection $conn)
  {
    $data = $this->getData($conn, 'pap_img');
    $table = dmDb::table('image');
    $table->createQuery()->delete()->execute();
    
    $mediaFolderId = dmDb::table('DmMediaFolder')->findOneByRelPath('image')->get('id');
    $collec = new Doctrine_Collection($table);
    foreach($data as $image)
    {
      $mediaId = dmDb::query('DmMedia m')
      ->where('m.dm_media_folder_id = ?', $mediaFolderId)
      ->andWhere('m.file = ?', $image['image'])
      ->select('m.id')
      ->fetchValue();
      
      $collec[] = $table->create(array(
        'id' => $image['id'],
        'rubrique_id' => $image['gal_id'],
        'user_id' => 2,
        'nom' => $image['nom'],
        'description' => $image['description'],
        'date' => $image['date'],
        'position' => $image['rank'],
        'created_at' => $image['created_at'],
        'updated_at' => $image['updated_at'],
        'is_active' => $image['is_approved'],
        'media_id' => $mediaId
      ));
    }
    $collec->save();
  }
  
}