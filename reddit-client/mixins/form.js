export default {
  methods: {
    errorMsg(key) {
      return this.errors[key] != undefined
        ? this.errors[key].join(" ")
        : undefined;
    },
    hasError(key) {
      return Boolean(this.errorMsg(key));
    },
  },
};
