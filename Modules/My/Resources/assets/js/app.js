
// import Alpine from 'alpinejs'
// import mask from '@alpinejs/mask'
// import collapse from '@alpinejs/collapse'
// import intersect from '@alpinejs/intersect'
// import {livewire_hot_reload} from 'virtual:livewire-hot-reload'

import {Livewire, Alpine } from '../../../../../vendor/livewire/livewire/dist/livewire.esm.js'

// livewire_hot_reload();

import.meta.glob(['../img/**',]);

import './components/form/select'
import './components/form/upload'
import './components/form/textarea'
import './components/form/imgPreview'
import './components/form/passwordInput'
import './components/form/rating'
import './components/form/selectButtons'
import './components/form/radioButtons'
import './components/form/inputText'
import './components/form/inputPassword'
import './components/form/switcher'
import './components/frame/modal'
import './components/frame/notifier'
import './components/scripts/scrollInto'
import './components/scripts/mobile'
import './components/scripts/horizontalScroll'
import './components/scripts/date.range.picker'
import './components/scripts/month.range.picker'
import './components/scripts/month.range.picker.turnover'
import './components/charts/bar';
import './components/charts/doughnut';
import './components/common/toggle';
import './components/dd.js';
import './bootstrap';

// Alpine.plugin(mask)
// Alpine.plugin(collapse)
// Alpine.plugin(intersect)
// window.Alpine = Alpine










// Alpine.start()

Livewire.start()
