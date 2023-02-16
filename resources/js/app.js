import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { createDeviceDetector } from "next-vue-device-detector";
import VueCookies from 'vue-cookies'

const device = createDeviceDetector()
createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(device)
      .use(VueCookies, { expires: '30d' })
      .mount(el)
  },
})
