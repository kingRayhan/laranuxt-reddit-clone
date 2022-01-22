<template>
  <div class="mb-2 input-component">
    <label>
      <span class="font-bold text-gray-600"> {{ label }} </span>
      <input
        :class="{
          'border-red-500': hasError,
        }"
        @change="$emit('input', $event.target.value)"
        :value="value"
        :type="type"
        class="block w-full px-2 py-1 text-xl border focus:outline-none"
      />
      <p
        :class="{
          'text-red-500': hasError,
          'text-gray-500': !hasError,
        }"
        class="text-sm"
      >
        {{ helperText }}
      </p>
    </label>
  </div>
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      required: true,
    },
    helperText: {
      type: String,
      required: false,
    },
    hasError: {
      type: Boolean,
      required: false,
    },
    value: {
      type: String,
      required: false,
    },
    type: {
      type: String,
      default: "text",
    },
  },
};
</script>
