<template>
  <div>

    <div :show="isLoading">
      <navbar />
      <router-view />

      <div class="container">
        <div class="row clearfix">
          <div class="col-lg-12">
            <div class="card chat-app">
              <leftlist />
              <Rightlist />
            </div>
          </div>
        </div>
      </div>

    </div>


  </div>
</template>

<style scoped></style>

<script>
import Navbar from "./Navbar";
import Leftlist from "./Leftlist";
import Rightlist from "./Rightlist";
import { mapGetters } from "vuex";

export default {
  name: "App",
  components: {
    Navbar,
    Leftlist,
    Rightlist
  },
  computed: {
    ...mapGetters({
      isLoading: "getLoading",
    }),
  },
};
</script>
