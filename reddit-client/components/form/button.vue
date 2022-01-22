<template>
  <button v-bind="$attrs" @click="$emit('click', $event)">
    <slot />
  </button>
</template>

<style scoped lang="scss">
button {
  @apply text-sm bg-primaryDark transition duration-300 text-white px-2 py-1 rounded uppercase;
  &:hover {
    @apply bg-opacity-75;
  }
  &[disabled] {
    background-color: gray;
    cursor: not-allowed;
  }
}
</style>
