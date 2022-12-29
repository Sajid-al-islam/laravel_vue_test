<template>
    <div>
        <body>
            <div class="row mt-5">
                <div class="col-md-8 mx-auto">
                    <ul class="alert alert-danger" v-if="error !== ''">
                        <li v-for="(value, key, index) in error" :key="index">{{ value[0] }}</li>
                    </ul>
                    <form class="form-signin">
                        <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>
                        <label for="inputEmail" class="sr-only text-left">Email address</label>
                        <input type="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" autofocus="" v-model="user.email"/>


                        <label for="inputPassword" class="sr-only text-left">Password</label>
                        <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required="" v-model="user.password" />

                        <!-- <div class="checkbox mb-3">
                            <label> <input type="checkbox" value="remember-me" /> Remember me </label>
                        </div> -->
                        <button @click="login" class="btn btn-lg btn-primary btn-block mt-5" type="submit">Login</button>
                    </form>
                </div>
            </div>

        </body>

        <!-- <h1>Login</h1>
        <div>
            <label for="email">Email</label>
            <input type="email" v-model="user.email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" v-model="user.password">
        </div>
        <button >Login</button> -->
    </div>
</template>

<script>
    import Auth from '../Auth.js';

    export default {
        data() {
            return {
                user: {
                    email: '',
                    password: '',
                },
                error: ''
            };
        },

        methods: {
            login() {
                this.axios.post('http://127.0.0.1:8000/api/login', this.user)
                    .then(({data}) => {
                        Auth.login(data.access_token,data.user); //set local storage
                        location.href = '/dashboard';
                        // this.$router.push('/dashboard');
                    })
                    .catch((error) => {
                        console.log(error.response.data);
                        if(error.response.status == 422) {
                            this.error = error.response.data.errors;
                        }
                    });
            }
        }
    }
</script>
