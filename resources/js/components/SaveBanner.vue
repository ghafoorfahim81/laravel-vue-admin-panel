<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg py-0 navbar-light bg-dark fixed-top ">
                                <div>
                                            <a class="navbar-brand me-2" href="https://mdbgo.com/">
                                            <img
                                                src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
                                                
                                                alt="MDB Logo"
                                                loading="lazy"
                                                style="margin-top: -1px;"
                                            />
                                            </a>

                                            </div>
                                    <!-- Container wrapper -->
                                    <div class="container">
                                        
                                        <!-- Navbar brand -->
                                           

                                        <!-- Toggle button -->
                                        <button
                                        class="navbar-toggler"
                                        type="button"
                                        data-mdb-toggle="collapse"
                                        data-mdb-target="#navbarButtonsExample"
                                        aria-controls="navbarButtonsExample"
                                        aria-expanded="false"
                                        aria-label="Toggle navigation"
                                        >
                                        <i class="fas fa-bars"></i>
                                        </button>

                                        <!-- Collapsible wrapper -->
                                        <div class="collapse navbar-collapse" id="navbarButtonsExample">
                                        <!-- Left links -->
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item">
                                            <a class="nav-link text-white text-xl" href="#">Unsaved Changes</a>
                                            </li>
                                        </ul>
                                        <!-- Left links -->

                                        <div class="d-flex align-items-center">
                                            <a :href="cancelRoute" type="button" class="btn btn-dark px-3 me-2">
                                            Cancel
                                            </a>
                                            
                                            <button type="reset" class="btn btn-dark px-3 me-2">
                                            Reset
                                            </button>
                                            <button class="btn btn-info" @click="$emit('click')" type="button" :disabled="disabled">
                                                
                                            <span :class="spinner" class="spinner-border-sm" role="status" aria-hidden="true"></span>
                                                <span class="ml-2">Save Changes</span>
                                            </button>
                                        </div>
                                        </div>
                                        <!-- Collapsible wrapper -->
                                    </div>
                                    <!-- Container wrapper -->
                                    </nav>
    </div>
</template>

<script>
    export default {
        props: {
            spinner: {
                type: String,
                default: '',
            },
            disabled: {
                type: String,
                default: false,
            },
            cancelRoute: {
                type: String,
                default: '',
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
