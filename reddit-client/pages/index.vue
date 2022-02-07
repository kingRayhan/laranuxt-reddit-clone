<template>
  <div>
    <h1 class="text-3xl font-semibold">Homa page</h1>
    <p>
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo voluptatem
      repellendus in beatae asperiores est unde tenetur quidem nemo? Nemo
      perspiciatis maiores nesciunt nihil a, quo sit et nulla sapiente.
    </p>
  </div>
</template>
<script>
export default {
  name: "IndexPage",
  head: {
    title: "Home",
  },
  mounted() {
    if (this.$route.query.verified) {
      this.$store.commit("toast/fire", {
        text: "Your email address has been verified.",
        type: "success",
      });
    }
  },
};
</script>
