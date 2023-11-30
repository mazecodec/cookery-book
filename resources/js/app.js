import './bootstrap';
import Alpine from 'alpinejs';
import htmx from 'htmx.org';
import ajax from '@imacrayon/alpine-ajax'
import mask from '@alpinejs/mask'
import morph from '@alpinejs/morph'

window.htmx = htmx;
window.Alpine = Alpine;

Alpine.plugin(ajax);
Alpine.plugin(mask);
Alpine.plugin(morph);

Alpine.start();

htmx.config.indicatorClass = 'htmx-indicator';
htmx.logAll();
