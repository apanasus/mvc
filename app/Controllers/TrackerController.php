<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\ClickModel;
use App\Models\OfferModel;

class TrackerController extends Controller
{
    public function index()
    {
        $offerId = isset($_GET['offer_id']) ? intval($_GET['offer_id']) : null;
        $source = isset($_GET['utm_source']) ? htmlspecialchars($_GET['utm_source'], ENT_QUOTES, 'UTF-8') : 'none';
        $ipAddress = $_SERVER['REMOTE_ADDR'];

        if ($offerId && $source) {
            $offerModel = new OfferModel();

            if (!$offerModel->offerExists($offerId)) {
                echo "Offer not found.";
                return;
            }

            $clickModel = new ClickModel();

            if ($clickModel->countClicksByIp($ipAddress) >= 20) {
                echo "Too many clicks from this IP.";
                return;
            }

            $clickModel->addClick($offerId, $source, $ipAddress);

            $offerUrl = $clickModel->getOfferUrlById($offerId);
            header("Location: $offerUrl");
            exit;
        } else {
            echo "Missing parameters.";
        }
    }
}
