require('./imports.js')
import fnapi from './fnapi'
import _ from 'lodash'


var data = []
var form = $('#search-form')








form.submit(event => {
  event.preventDefault()
  var data = {}
  $.each(form.serializeArray(), function () {
    data[this.name] = this.value
  })
  fnapi.search(data.username, data.platform).then(({data}) => {
     var output = ''
    _.forEach(data.data, (stats,gm) => {

      output += `
      <div class="card">
          <div class="card-body">
            <h5 class="card-title">${gm}</h5>
            <p class="card-text">${stats.wins}</p>
          </div>
        </div>
      `
    })
    $('#results').html(output)
  })
})
