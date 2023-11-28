import './bootstrap';
import Alpine from 'alpinejs';
import htmx from 'htmx.org';

htmx.config.indicatorClass = 'htmx-indicator';
htmx.logger = function (elt, event, data) {
    if (console) {
        console.log(event, elt, data);
    }
}
// htmx.logAll();

window.htmx = htmx;
window.Alpine = Alpine;
Alpine.start();
