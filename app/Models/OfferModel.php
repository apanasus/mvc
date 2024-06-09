<?php

namespace App\Models;

use Core\Model;

class OfferModel extends Model
{
    public function addOffer($name, $url, $image)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO offers (name, url, image) VALUES (?, ?, ?)");
            $stmt->execute([$name, $url, $image]);
            echo "Offer added successfully.<br>";
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }

    public function getOffers()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM offers");
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }

    public function deleteOffer($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM offers WHERE id = ?");
            $stmt->execute([$id]);
            echo "Offer deleted successfully.<br>";
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }
    public function offerExists($offerId)
    {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM offers WHERE id = ?");
            $stmt->execute([$offerId]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result['count'] > 0;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }
}
