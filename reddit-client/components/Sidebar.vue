<template>
  <div>
    <widgets-login v-if="!$auth.loggedIn" />

    <div v-if="$auth.loggedIn">
      <nuxt-link class="mb-4 submitter-button" to="/new">
        <span>Submit now</span>
        <div class="nub"></div>
      </nuxt-link>
    </div>

    <img
      src="~/static/images/toto-logo-1599689481-30467661479.png"
      alt="reddit"
      class="my-4"
    />

    <widgets-rules />
  </div>
</template>
