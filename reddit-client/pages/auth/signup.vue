<template>
  <div>
    <h1 class="font-semibold uppercase text-primaryDark">
      Create a new account
    </h1>

    <form action="#" @submit.prevent="handleSubmit" class="mt-6">
      <form-input
        label="Username"
        v-model="form.username"
        :helperText="errorMsg('username')"
        :hasError="hasError('username')"
      />
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
      <form-input
        label="Confirm Password"
        type="password"
        v-model="form.password_confirmation"
        :helperText="errorMsg('password_confirmation')"
        :hasError="hasError('password_confirmation')"
      />
      <form-button :loading="loading">Signup</form-button>
    </form>
  </div>
</template>

<script>
import form from "~/mixins/form";
export default {
  head: {
    title: "Signup",
  },
  mixins: [form],
  middleware: "guest",
  data() {
    return {
      form: {
        username: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      loading: false,
    };
  },
  methods: {
    async handleSubmit() {
      // api call
      try {
        this.errors = {};
        this.loading = true;
        const res = await this.$axios.$post("/api/auth/register", this.form);
        this.loading = false;
        this.$store.commit("toast/fire", {
          text: "Successfully created a new account. Please check your email to verify your account.",
        });
        this.$router.push("/");
        console.log(res);
      } catch (e) {
        this.$store.commit("toast/fire", {
          text: e.response.data.message,
          type: "error",
        });
        this.errors = e.response.data?.errors || {};
        this.loading = false;
      }
    },
  },
};
</script>
