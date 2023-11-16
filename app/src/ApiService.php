<?php

declare(strict_types = 1);

namespace App;

use \GuzzleHttp\Client;

/**
 * Class ApiService.
 * Service class for interacting with the ATDW Atlas API.
 */
class ApiService {

    /**
     * HTTP client for making API requests.
     * @var Client
     */
    private $httpClient;

    /**
     * ApiService constructor.
     */
    public function __construct() {
        $this->httpClient = new Client();
    }

    /**
     * Get accommodation data from the API.
     * @return array JSON-decoded response from the API.
     */
    public function getAccommodationData(): array {
        $response = $this->httpClient->get(Constants::API_BASE_URL . '/api/atlas/products', [
            'query' => [
                'key' => Constants::API_KEY,
                'cat' => Constants::CATEGORY,
                'size' => 20,
                'out' => 'json',
            ],
        ]);
        $data = json_decode((mb_convert_encoding((string) $response->getBody(), 'UTF-8', 'UTF-16LE')), true);
        return $data ?? [];
    }
}