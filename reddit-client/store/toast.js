export default {
  state() {
    return {
      visible: false,
      text: "Heyy there....",
      type: "success", // success, warning, error, info
    };
  },

  mutations: {
    fire(state, payload) {
      state.visible = true;
      state.text = payload.text;
      state.type = payload.type || "success";
    },
    close(state) {
      state.visible = false;
      state.text = "";
    },
  },
};

// $store.commit('toast/fire', {

// })
