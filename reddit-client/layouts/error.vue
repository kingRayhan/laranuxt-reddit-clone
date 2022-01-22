<template>
  <div class="text-center my-12">
    <div>
      <img class="mx-auto" src="~/static/images/404.png" alt="" />
    </div>
    <div>
      <h2 class="text-3xl">{{ error.statusCode }}</h2>
      <p class="text-lg">{{ error.message }}</p>
    </div>
  </div>
</template>

<script>
export default {
  layout: "full-width",
  props: ["error"],
};
</script>
