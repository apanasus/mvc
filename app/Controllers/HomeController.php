<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\OfferModel;

class HomeController extends Controller
{
    public function index()
    {
        $offerModel = new OfferModel();
        $offers = $offerModel->getOffers();
        $source = $_GET['utm_source'] ?? 'none';
        $this->view('home', ['offers' => $offers, 'source' => $source]);
    }
}
