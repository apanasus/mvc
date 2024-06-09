<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\ClickModel;

class OffersController extends Controller
{
    public function index()
    {
        $startDate = $_GET['start_date'] ?? null;
        $endDate = $_GET['end_date'] ?? null;

        $clickModel = new ClickModel();
        $clicks = $clickModel->getClicksByOffer($startDate, $endDate);
        $this->view('clicks_by_offer', ['clicks' => $clicks, 'startDate' => $startDate, 'endDate' => $endDate]);
    }
}
