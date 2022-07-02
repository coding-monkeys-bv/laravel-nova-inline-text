import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-inline-text', IndexField)
  app.component('detail-inline-text', DetailField)
  app.component('form-inline-text', FormField)
})
