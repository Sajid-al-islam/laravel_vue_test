<template>
    <div>
        <!-- <h1>Dashboard Dashboard</h1>
        <h4>The logged in user details Here</h4><br>
        <p> {{user.name}}</p>
        <p> {{user.email}}</p> -->

        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Best programming books</h1>
                    <p class="lead fw-normal text-white-50 mb-0">in the city</p>
                </div>
            </div>
        </header>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5" v-for="(book, index) in books.data" :key="index">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" :src="book.image" alt="..." height="275" width="auto" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ book.name }}</h5>
                                    <h6 class="fw-bold">{{ book.author_name }}</h6>
                                    <!-- Product price-->
                                    {{ book.price }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <pagination :data="books" :limit="10" :size="'small'" :align="'center'" @pagination-change-page="getBooks">
            <span slot="prev-nav"><i class="fa fa-angle-left"></i> Previous</span>
            <span slot="next-nav">Next <i class="fa fa-angle-right"></i></span>
        </pagination>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                user: this.auth.user,
                books: '',
                page: 1
            }
        },
        methods: {
            checkToken() {
                axios.get(`http://127.0.0.1:8000/api/validatePersonalToken`, {
                }).then((res) => {
                    if(res.data.message == "is_valid") {
                        this.getBooks(this.page)
                    }
                })
                .catch((e) => {
                    console.log(e);
                    if(e.response.status == 401) {
                        axios.post(`http://127.0.0.1:8000/oauth/token`, {
                            grant_type: "password",
                            client_id: 3,
                            client_secret: "b5VE9f0VgNDK7CZdPfwwudmbt4V8cEPtvrcL4Ym3",
                            username: this.user.email,
                            password: "12345678",
                            scope: '*',
                        }).then((res) => {
                            window.localStorage.setItem('token', res.data.access_token);
                            this.getBooks(this.page);
                        })
                    }
                });
            },
            getBooks: async function(page) {

                await axios.get(`http://127.0.0.1:8000/api/books?page=${page}`, {
                }).then((res) => {
                    if(res) {
                        this.books = res.data.books;
                    }
                })
                .catch((e) => {
                    console.log(e);
                });

            }
        },
        created() {
            this.checkToken();
            // console.log(this.auth.user);
        }
    }
</script>
