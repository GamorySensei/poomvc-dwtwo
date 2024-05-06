<?php

require '../config/MySQLConnector.php';

class ArtistManager
{
    private $db;

    public function __construct()
    {   
        $this->db = (new MySQLConnector())->getConnection();
    }

    public function getAllArtists()
    {
        $query = $this->db->query("SELECT * FROM artist");
        return $query->fetchAll();
    }

    public function getArtist(int $id)
    {
    }

    public function addArtist(array $artist)
    {

        $query = $this->db->prepare("INSERT INTO artist (name) VALUES (:name)");
        $query->execute($artist);

        return $this->db->lastInsertId();
    }

    public function updateArtist(array $artist)
    {
    }

    public function deleteArtist(int $id)
    {
    }
}
