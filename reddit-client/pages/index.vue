<template>
  <div>
    <form-button
      @click="$store.commit('toast/fire', { text: 'Heyyy', type: 'error' })"
    >
      Error
    </form-button>
    <form-button @click="$store.commit('toast/fire', { text: 'Success toast' })"
      >Success</form-button
    >
    <form-button
      @click="
        $store.commit('toast/fire', { text: 'Success toast', type: 'warning' })
      "
      >Warning</form-button
    >

    <form-button
      @click="
        $store.commit('toast/fire', { text: 'Success toast', type: 'info' })
      "
      >Information text</form-button
    >

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
  layout: "full-width",
};
</script>
