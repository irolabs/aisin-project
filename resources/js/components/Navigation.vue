<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <router-link :to="{ name: 'home' }" class="navbar-brand"
                    >AIIA PROJECT</router-link
                >
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div
                    class="collapse navbar-collapse justify-content-end"
                    id="navbarSupportedContent"
                >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto " v-if="! user.authenticated">
                        <li class="nav-item">
                            <router-link
                                :to="{ name: 'login' }"
                                class="nav-link"
                                >Login</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link
                                :to="{ name: 'register' }"
                                class="nav-link"
                                >Register</router-link
                            >
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto" v-if="user.authenticated">
                      <!-- Dropdown Fungsi User -->
                        <li class="nav-item dropdown">
                            <a
                            class="nav-link dropdown-toggle" 
                            id="navbarDropdown" 
                            role="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">

                              {{ user.data.name }}
                              
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><router-link class="dropdown-item" :to="{name:'trafficlight'}">Traffic Light</router-link></li>
                                <li><a class="dropdown-item" href="#" @click.prevent="signout">Logout</a></li>
                            </ul>
                        </li>
                      <!-- Dropdown Fungsi User -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import {mapGetters,mapActions} from "vuex";

export default{
  computed: {
    ...mapGetters({
      user: "auth/user"
    })
  },
  methods:{
      ...mapActions({
          logout:"auth/logout"
      }),
      signout(){
          this.logout().then(()=>{
              this.$router.replace({name: "home"})
          });
      }
  }
}
</script>