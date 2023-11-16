<?php

use PHPUnit\Framework\TestCase;
use App\ApiService;

/**
 * Class ApiServiceTest
 *
 * PHPUnit test class for testing the functionality of the ApiService class.
 */
class ApiServiceTest extends TestCase {

    /**
     * Instance of ApiService to be used in tests.
     * @var ApiService
     */
    private ApiService $apiService;

    /**
     * Set up the test environment.
     */
    protected function setUp(): void {
        // You can set up any necessary dependencies or configuration here
        $this->apiService = new ApiService(); 
    }

    public function testGetAccommodationData(): void {
        // Call the actual method to be tested
        $accommodationData = $this->apiService->getAccommodationData();
        
        // Assert that the response is valid JSON
        $this->assertJson(json_encode($accommodationData));

        // Asserting the keys.
        $this->assertArrayHasKey('status', $accommodationData);
        $this->assertArrayHasKey('numberOfResults', $accommodationData);
        $this->assertArrayHasKey('queryTime', $accommodationData);
        $this->assertArrayHasKey('products', $accommodationData);
    }

}