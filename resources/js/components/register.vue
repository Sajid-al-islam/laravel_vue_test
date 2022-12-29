<template>
    <div>
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <form class="form-signin">
                    <h1 class="h3 mb-3 font-weight-normal text-center">Register</h1>
                    <label for="inputEmail" class="sr-only text-left">Name</label>
                    <input type="text" v-model="user.name" id="inputEmail" class="form-control mb-2" placeholder="name" required="" autofocus=""/>
                    <label for="inputEmail" class="sr-only text-left">Email address</label>
                    <input type="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" required="" autofocus="" v-model="user.email"/>
                    <label for="inputPassword" class="sr-only text-left">Password</label>
                    <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required="" v-model="user.password" />
                    <label for="inputPassword" class="sr-only text-left">Confirm password</label>
                    <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required="" v-model="user.password_confirmation" />
                    <!-- <div class="checkbox mb-3">
                        <label> <input type="checkbox" value="remember-me" /> Remember me </label>
                    </div> -->
                    <button @click="register()" class="btn btn-lg btn-primary btn-block mt-5" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                }
            };
        },

        methods: {
            register() {
                console.log(this.user);
                this.axios.post('http://127.0.0.1:8000/api/register', this.user)
                    .then(({data}) => {
                        this.$router.push('/login');
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        }
    }
</script>
