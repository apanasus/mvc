<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\OfferModel;

class AddOfferController extends Controller
{
    public function index()
    {
        $offerModel = new OfferModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $url = $_POST['url'];
            $image = $_FILES['image'];

            // Validate image
            $allowedTypes = ['image/jpeg', 'image/png'];
            $maxSize = 30 * 1024; // 30 KB
            $imageSize = getimagesize($image['tmp_name']);
            $imageType = $image['type'];
            $imageWidth = $imageSize[0];
            $imageHeight = $imageSize[1];

            if (in_array($imageType, $allowedTypes) && $image['size'] <= $maxSize && $imageWidth >= 100 && $imageHeight >= 100 && $imageWidth <= 450 && $imageHeight <= 450) {
                $imageName = time() . '_' . basename($image['name']);
                $targetPath = "../public/uploads/" . $imageName;

                if (move_uploaded_file($image['tmp_name'], $targetPath)) {
                    echo "File uploaded successfully.<br>";
                    $offerModel->addOffer($name, $url, $imageName);
                } else {
                    echo "Failed to upload file.<br>";
                }
            } else {
                echo "Invalid image file.<br>";
            }
        }

        $offers = $offerModel->getOffers();
        $this->view('add_offer', ['offers' => $offers]);
    }

    public function delete($id)
    {
        $offerModel = new OfferModel();
        $offerModel->deleteOffer($id);
        header("Location: /add_offer");
    }
}
