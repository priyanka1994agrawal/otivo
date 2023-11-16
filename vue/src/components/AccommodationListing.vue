<template>
  <div id="app">
    <header>
      <h1>Accommodation Listing</h1>
    </header>
    <div class="filters">
      <label for="areaFilter">Filter by Area:</label>
      <select id="areaFilter" v-model="selectedArea">
        <option value="">All Areas</option>
        <option v-for="area in uniqueAreas" :key="area">{{ area }}</option>
      </select>

      <label for="cityFilter">Filter by City/Suburb:</label>
      <select id="cityFilter" v-model="selectedCity">
        <option value="">All Cities/Suburbs</option>
        <option v-for="city in uniqueCities" :key="city">{{ city }}</option>
      </select>
    </div>
    <div class="grid-container" v-if="filteredAccommodationData.length > 0">
      <card v-for="item in filteredAccommodationData" :key="item.productId">
      <!-- Slot for accommodation -->
      <template v-slot:card>
        <div class="image-container">
          <img :src="item.productImage" alt="Product Image" class="product-image" />
        </div>
        <div class="product-details">
          <h3>{{ item.productName }}</h3>
        </div>
        <div v-for="address in item.addresses" :key="item.productId" class="address">
          <p>{{ address.address_line }}, {{ address.city }}, {{ address.state }}</p>
        </div>
      </template>
    </card>
    </div>
    <div v-else>
      <p>No results found.</p>
    </div>
  </div>
</template>

<script>

import Card from '@/components/Card.vue';

export default {
  components: {
    Card,
  },
  data() {
    return {
      accommodationData: null,
      selectedArea: '',
      selectedCity: '',
    };
  },
  methods: {
    fetchData() {
      fetch('http://localhost:8000/index.php')
        .then(response => {
          if (!response.ok) {
            throw new Error(`Network response was not ok: ${response.status}`);
          }
          return response.json();
        })
        .then(data => {
          this.accommodationData = data;
        })
        .catch(error => {
          console.error('Error fetching accommodation data:', error);
        });
    },
  },
  computed: {
    uniqueAreas() {
      if (this.accommodationData) {
        return [...new Set(this.accommodationData.map(product => product.addresses[0].area[0]))];
      }
      return [];
    },
    uniqueCities() {
      if (this.accommodationData) {
        return [...new Set(this.accommodationData.map(product => product.addresses[0].city))];
      }
      return [];
    },
    filteredAccommodationData() {
      if (this.accommodationData) {
        return this.accommodationData.filter(product => {
          const areaFilter = !this.selectedArea || product.addresses[0].area[0] === this.selectedArea;
          const cityFilter = !this.selectedCity || product.addresses[0].city === this.selectedCity;
          return areaFilter && cityFilter;
        });
      }
      return [];
    },
  },
  mounted() {
    this.fetchData(); // Trigger the fetchData method on component mount.
  },
};
</script>

<style>
body {
  margin: 0;
  font-family: 'Arial', sans-serif;
}
header {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 20px;
}

h1 {
  margin: 0;
}
#app {
  text-align: center;
  margin: 20px;
}

.filters {
  display: flex;
  justify-content: space-around;
  background-color: #f0f0f0;
  padding: 10px;
  border-radius: 8px;
  margin-bottom: 20px;
  align-items: center;
}

label {
  margin-right: 10px;
}

select {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.grid-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 2rem;
}

.grid-item {
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  background-color: #fff;
  transition: transform 0.3s ease-in-out;
}

.grid-item:hover {
  transform: scale(1.05);
}

.image-container {
  position: relative;
  overflow: hidden;
}

.product-image {
  max-width: 100%;
  width: 100%;
  height: auto;
  transition: transform 0.3s ease-in-out;
}

.product-image:hover {
  transform: scale(1.1);
}

.product-details {
  padding: 16px;
}

h3 {
  margin-bottom: 8px;
}

.address {
  padding: 16px;
  background-color: #f0f0f0;
}
</style>
