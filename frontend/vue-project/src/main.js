import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

// import './assets/main.css'
import './assets/css/bootstrap.css'
import './assets/css/custom.css'

const app = createApp(App)

app.use(router)

app.mount('#app')
