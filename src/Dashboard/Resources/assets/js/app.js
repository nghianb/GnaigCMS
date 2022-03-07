import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'
import '@tabler/core/src/js/tabler';

Alpine.plugin(persist);

window.Alpine = Alpine
Alpine.start()
