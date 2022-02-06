<template>
  <div class="p-3 mb-10 border-2 border-dashed rounded-sm border-primary">
    <img
      class="w-56 mx-auto"
      src="~/static/images/snoo-verify-email.png"
      alt="reddit email not varified"
    />

    <p class="my-3 text-xl">
      Your email address is not verified yet. Before submitting your first
      thread verify your email address
    </p>
    <button
      @click="handleSubmit"
      class="flex items-center justify-center w-full py-2 mt-2 space-x-3 text-white rounded bg-primaryDark"
    >
      <svg
        v-if="loading"
        class="w-5 animate-spin"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
      >
        <circle
          class="opacity-25"
          cx="12"
          cy="12"
          r="10"
          stroke="currentColor"
          stroke-width="4"
        ></circle>
        <path
          class="opacity-75"
          fill="currentColor"
          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
        ></path>
      </svg>
      <span>Resent email</span>
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
    };
  },
  methods: {
    async handleSubmit() {
      try {
        this.loading = true;
        await this.$axios.post("api/auth/resend-verification-email");
        this.loading = false;
        this.$store.commit("toast/fire", {
          text: "Successfully resent verification email.",
          type: "success",
        });
      } catch (error) {
        this.loading = false;
        console.log(error.response.data);
      }
    },
  },
};
</script>
