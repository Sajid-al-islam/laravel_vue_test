<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Bookshop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4" v-if="loggedUser">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                        <a href="javascript:void(0)" @click="logout()" class="nav-item nav-link ml-3">Logout</a>
                    </ul>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4" v-else>
                        <router-link to="/login">
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Login</a></li>
                        </router-link>
                        <router-link to="/register">
                            <li class="nav-item"><a class="nav-link" href="#!">Register</a></li>
                        </router-link>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav" v-if="loggedUser">
                    <h5>Dashboard</h5>
                    <a href="javascript:void(0)" @click="logout()" class="nav-item nav-link ml-3">Logout</a>
                </div>
                <div v-else>
                    <router-link to="/login">Login</router-link>
                    <router-link to="/register">Register</router-link>
                </div>
            </div>
        </nav> -->
        <router-view> </router-view>
    </div>
</template>

<script>
    import Auth from './Auth.js';
    export default {
        data() {
            return {
                loggedUser: this.auth.user
            };
        },
        mounted() {
            console.log(this.auth.user);
        },
        methods: {
            logout() {
                this.axios.post('http://127.0.0.1:8000/api/logout')
                .then(({data}) => {
                    Auth.logout(); //reset local storage
                    // this.$router.push('/login');
                    location.href = '/login';
                })
                .catch((error) => {
                    console.log(error);
                });
            }
        }
    }
</script>
