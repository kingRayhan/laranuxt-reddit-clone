<template>
  <div>
    <h1 class="font-semibold uppercase text-primaryDark">
      Create a new account
    </h1>

    <pre>
      {{ errors }}
    </pre>

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
  data() {
    return {
      form: {
        username: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      errors: {},
      loading: false,
    };
  },
  methods: {
    async handleSubmit() {
      // api call
      try {
        this.loading = true;
        const res = await this.$axios.$post("/api/auth/register", this.form);
        this.loading = false;
        this.$router.push("/");
        console.log(res);
      } catch (e) {
        this.errors = e.response.data?.errors || {};
        this.loading = false;
      }
    },
  },
};
</script>
