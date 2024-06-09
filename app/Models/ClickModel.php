<?php

namespace App\Models;

use Core\Model;

class ClickModel extends Model
{
    public function addClick($offerId, $source, $ipAddress)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO clicks (offer_id, source, ip_address) VALUES (?, ?, ?)");
            $stmt->execute([$offerId, $source, $ipAddress]);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }

    public function countClicksByIp($ipAddress)
    {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM clicks WHERE ip_address = ? AND created_at > NOW() - INTERVAL 1 DAY");
            $stmt->execute([$ipAddress]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }

    public function getClicksBySource($startDate = null, $endDate = null)
    {
        $query = "SELECT source, COUNT(*) as count, COUNT(DISTINCT ip_address) as unique_count FROM clicks";
        $params = [];

        if ($startDate && $endDate) {
            $query .= " WHERE created_at BETWEEN ? AND ?";
            $params[] = $startDate;
            $params[] = $endDate;
        }

        $query .= " GROUP BY source";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }

    public function getClicksByOffer($startDate = null, $endDate = null)
    {
        $query = "SELECT o.id, o.name, o.image, COUNT(c.id) as count, COUNT(DISTINCT c.ip_address) as unique_count 
                  FROM clicks c 
                  JOIN offers o ON c.offer_id = o.id";
        $params = [];

        if ($startDate && $endDate) {
            $query .= " WHERE c.created_at BETWEEN ? AND ?";
            $params[] = $startDate;
            $params[] = $endDate;
        }

        $query .= " GROUP BY o.id";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }

    public function getOfferUrlById($offerId)
    {
        try {
            $stmt = $this->db->prepare("SELECT url FROM offers WHERE id = ?");
            $stmt->execute([$offerId]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result['url'];
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
        }
    }
}
