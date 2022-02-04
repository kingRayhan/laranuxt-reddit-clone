<template>
  <div
    class="relative p-2 text-center text-white"
    :class="{
      'bg-red-500': type === 'error',
      'bg-green-500': type === 'success',
      'bg-yellow-500 text-gray-800': type === 'warning',
      'bg-slate-800': type === 'info',
    }"
    v-if="visible"
  >
    <p>{{ text }}</p>
    <button
      @click="$store.commit('toast/close')"
      class="absolute text-2xl top-1 right-2"
    >
      &times;
    </button>
  </div>
</template>

<script>
import { mapState } from "vuex";
export default {
  computed: {
    ...mapState("toast", ["visible", "text", "type"]),
  },
};
</script>
