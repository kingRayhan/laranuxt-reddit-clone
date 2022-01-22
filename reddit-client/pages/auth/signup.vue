<template>
  <div>
    <h1 class="font-semibold uppercase text-primaryDark">
      Create a new account
    </h1>

    <form action="#" class="mt-6">
      <form-input label="Username" v-model="form.username" />
      <form-input label="Email" v-model="form.email" />

      <form-input label="Password" v-model="form.password" />

      <form-input
        label="Confirm Password"
        v-model="form.password_confirmation"
      />

      <form-button> Signup </form-button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        username: "sdfdsfds",
        email: "",
        password: "",
        password_confirmation: "",
      },
    };
  },
};
</script>
