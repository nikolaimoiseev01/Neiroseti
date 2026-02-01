import './bootstrap';
import {livewire_hot_reload} from 'virtual:livewire-hot-reload'

import intersect from '@alpinejs/intersect'

Alpine.plugin(intersect)
livewire_hot_reload();
