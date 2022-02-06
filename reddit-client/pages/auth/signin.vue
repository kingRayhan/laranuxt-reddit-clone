<template>
  <div>
    <h1 class="font-semibold uppercase text-primaryDark">
      Login to your account
    </h1>

    <form action="#" @submit.prevent="handleSubmit" class="mt-6">
      <form-input
        label="Email"
        type="email"
        v-model="form.email"
        :helperText="errorMsg('email')"
        :hasError="hasError('email')"
      />
      <form-input
        label="Password"
        type="password"
        v-model="form.password"
        :helperText="errorMsg('password')"
        :hasError="hasError('password')"
      />

      <form-button :loading="loading">Signin</form-button>
    </form>
  </div>
</template>
<script>
import form from "~/mixins/form";
export default {
  head: {
    title: "Signin",
  },
  mixins: [form],
  middleware: "guest",
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      loading: false,
    };
  },
  methods: {
    async handleSubmit() {
      try {
        this.loading = true;
        await this.$auth.loginWith("local", { data: this.form });
        this.loading = false;
        this.$store.commit("toast/fire", {
          text: "Successfully logged in",
        });
      } catch (error) {
        this.loading = false;
        this.errors = error.response.data?.errors || {};
        this.$store.commit("toast/fire", {
          text: error.response.data.message,
          type: "error",
        });
      }
    },
  },
};
</script>
