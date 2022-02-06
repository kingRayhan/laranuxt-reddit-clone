<template>
  <div>
    <toast />

    <nav class="navbar">
      <div class="container navbar__inner">
        <nuxt-link class="navbar__logo" to="/"></nuxt-link>

        <div class="navbar__user-menu" v-if="$auth.loggedIn">
          Howdy
          <a class="font-bold" href="#">{{ $auth.user.username }} </a>
          <nuxt-link class="text-xs text-gray-700" to="/settings">
            (settings)
          </nuxt-link>
          <span class="font-thin">|</span>
          <a href="#" to="/notifications"> Notifications (14) </a>
          <span class="font-thin">|</span>
          <button @click="handleLogout" class="cursor-pointer link">
            Logout
          </button>
        </div>

        <div class="navbar__user-menu" v-else>
          Want to join?
          <nuxt-link to="/auth/signin" class="link">Signin</nuxt-link>
          or
          <nuxt-link to="/auth/signup" class="link">Signup</nuxt-link>
          in a seconds.
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  methods: {
    handleLogout() {
      this.$auth.logout();
    },
  },
};
</script>
