<template>
  <nav class="navbar">
    <div class="container navbar__inner">
      <nuxt-link class="navbar__logo" to="/"></nuxt-link>

      <div class="navbar__user-menu" v-if="isloggedIn">
        Howdy
        <a class="font-bold" href="#"> /r/rayhan </a>
        <a class="text-xs text-gray-700" href="#"> (settings) </a>
        <span class="font-thin">|</span>
        <a href="#" to="/notifications"> Notifications (14) </a>
        <span class="font-thin">|</span>
        <a href="#" class="cursor-pointer">Logout</a>
      </div>

      <div class="navbar__user-menu" v-else>
        Want to join?
        <nuxt-link to="/auth/login" class="link">Login</nuxt-link>
        or
        <nuxt-link to="/auth/signup" class="link">Signup</nuxt-link>
        in a seconds.
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      isloggedIn: false,
    };
  },
};
</script>
