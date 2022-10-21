import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import JuntaComponent from './components/JuntaComponent.vue';

app.component('example-component', ExampleComponent);
app.component('juntas-component', JuntaComponent);

app.mount('#app');
