<?php

namespace App\Models;

use PDO;

class AlcoolModel {
    protected $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findAll() {
        $stmt = $this->pdo->query('SELECT * FROM alcool');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM alcool WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare('INSERT INTO alcool (nom, type, volume, prix) VALUES (:nom, :type, :volume, :prix)');
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $data['id'] = $id;
        $stmt = $this->pdo->prepare('UPDATE alcool SET nom = :nom, type = :type, volume = :volume, prix = :prix WHERE id = :id');
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM alcool WHERE id = :id');
        return $stmt->execute([':id' => $id]);
    }
}