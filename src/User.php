<?php

namespace Hiro;

class User
{
    public $storage;
    
    public function __construct(Storage $storage, $db) {
        $this->storage = $storage;
        $this->db = $db;
    }
    
    public function getById($id) {
        $sql = "SELECT * FROM USERS WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
