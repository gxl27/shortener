require('./bootstrap');

import { createApp } from 'vue'
import  Shortener from './components/Shortener.vue'
import  Expander from './components/Expander.vue'
import  Link from './components/Link.vue'


const app = createApp({})

app.component('shortener', Shortener)
app.mount('#shortener')

app.component('expander', Expander)
app.mount('#expander')

app.component('links', Link)
app.mount('#links')