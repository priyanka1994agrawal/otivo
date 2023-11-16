<!-- Card.vue -->
<template>
    <div class="card">
      <div class="card-content">
        <slot name="card"></slot>
      </div>
    </div>
</template>
  
<script>
export default {
  name: 'Card',
};
</script>
  
<style scoped>
.card {
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  background-color: #fff;
  transition: transform 0.3s ease-in-out;
}

.card:hover {
  transform: scale(1.05);
}
</style>