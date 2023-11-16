<?php

/**
 * Index file for the Accommodation Listing Application.
 *
 * This file is the entry point for the application and serves as the starting point
 * for rendering the Vue.js application that lists accommodation options in Sydney.
 *
 * PHP version 8.2
 *
 * @category Application
 * @package  AccommodationListing
 * @author   Priyanka <priyanka1994agrawal@gmail.com>
 * @license  MIT License
 * @link     https://example.com
 */

declare(strict_types = 1);

use App\ApiService;

// Autoload Composer dependencies.
require __DIR__ . '/vendor/autoload.php';

// Create an instance of the ApiService.
$apiService = new ApiService();
// Fetch accommodation data from the API.
$accommodationData = $apiService->getAccommodationData();
// Set the Access-Control-Allow-Origin header to allow cross-origin requests from any origin.
header('Access-Control-Allow-Origin: *');
// Encode and output the products data as JSON for consumption by the frontend.
echo json_encode($accommodationData['products']);