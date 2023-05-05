<script setup>
import TheWelcome from '../components/TheWelcome.vue'
</script>

<template>

<main>
    <!-- S: Header -->
    <header class="jumbotron">
        <div class="container text-center">
            <h1 class="display-4">Vaccination Platform</h1>
        </div>
    </header>
    <!-- E: Header -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="card card-default">
                    <div class="card-header">
                        <h4 class="mb-0">Login</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row align-items-center">
                            <div class="col-4 text-right">ID Card Number</div>
                            <div class="col-8"><input type="text" class="form-control"></div>
                        </div>
                        <div class="form-group row align-items-center">
                            <div class="col-4 text-right">Password</div>
                            <div class="col-8"><input type="password" class="form-control"></div>
                        </div>
                        <div class="form-group row align-items-center mt-4">
                            <div class="col-4"></div>
                            <div class="col-8"><button class="btn btn-primary" @click="login">Login</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

</template>
<script>
export default {
  data() {
    return {
      loading: false,
      post: null,
      error: null,
    }
  },
  created() {
    fetch("https://api.npms.io/v2/invalid-url")
    .then(async response => {
      const data = await response.json();

      // check for error response
      if (!response.ok) {
        // get error message from body or default to response statusText
        const error = (data && data.message) || response.statusText;
        return Promise.reject(error);
      }

      this.totalVuePackages = data.total;
    })
    .catch(error => {
      this.errorMessage = error;
      console.error("There was an error!", error);
    });

  },
  methods: {
    login: function(){

    }
 
  },
}
</script>