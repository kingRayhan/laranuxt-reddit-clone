<template>
  <form
    @submit.prevent="handleSubmit"
    class="flex flex-col items-end p-2 mb-3 border border-gray-600 justify-items-end"
  >
    <div class="flex flex-col">
      <div>
        <p v-for="key in Object.keys(errors)" :key="key" class="text-red-500">
          {{ errors[key].join(" ") }}
        </p>
      </div>
      <div class="flex">
        <input
          type="text"
          placeholder="Email"
          v-model="form.email"
          class="w-1/2 px-3 py-1 mr-3 border border-gray-600 focus:outline-none focus:border-primaryDark"
        />
        <input
          type="password"
          placeholder="Password"
          v-model="form.password"
          class="w-1/2 px-3 py-1 border border-gray-600 focus:outline-none focus:border-primaryDark"
        />
      </div>
    </div>
    <div>
      <a href="#">Forgot password?</a>
      <button class="px-3 mt-2 bg-gray-200 border border-gray-600">
        {{ loading ? "Loading..." : "Login" }}
      </button>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      errors: {},
      loading: false,
    };
  },
  methods: {
    async handleSubmit() {
      try {
        this.loading = true;
        this.errors = {};
        await this.$auth.loginWith("local", { data: this.form });
        this.loading = false;
      } catch (error) {
        this.errors = error.response?.data?.errors || {};
        this.loading = false;
        this.$store.commit("toast/fire", {
          text: error.response.data.message,
          type: "error",
        });
      }
    },
  },
};
</script>
