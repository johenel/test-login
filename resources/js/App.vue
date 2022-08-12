<template>
    <div class="w-4/5 m-auto">
        <div v-if="isAuthenticated">
            <div class="p-3 mb-5 flex flex-row justify-around">
                <router-link to="/welcome">Home</router-link>
                <router-link to="/about">About</router-link>
                <button @click="logout">Log out</button>
            </div>
            <router-view />
        </div>
        <div v-else class="w-1/4 m-auto p-3 mt-10">
            <div class="flex flex-col">
                <div class="flex flex-row mb-3">
                    <span class="p-2">Username :</span>
                    <input type="text" class="border-b p-2" v-model="username">
                </div>
                <div class="flex flex-row">
                    <span class="p-2">Password :</span>
                    <input type="password" class="p-2" v-model="password">
                </div>
                <button @click="login" class="mt-5 shadow w-1/2 m-auto">Login</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                username: null,
                password: null
            }
        },

        computed: {
            isAuthenticated() {
                let token = localStorage.getItem('token')
                return token && token.length > 0
            }
        },

        methods: {
            login() {
                if (!this.username) {
                    alert('Username is required!')
                    return false
                }

                if (!this.password) {
                    alert('Password is required!')
                    return false
                }

                axios.post('/api/login', {
                        username: this.username,
                        password: this.password
                    })
                    .then(res => {
                        localStorage.setItem('token', res.data)
                        this.$router.push('/welcome')
                        location.reload()
                    })
                    .catch(err => {
                        alert('Invalid credentials!')
                    })
            },

            logout() {
                localStorage.clear()
                this.$router.push('/')
                location.reload()
            }
        }
    }
</script>
