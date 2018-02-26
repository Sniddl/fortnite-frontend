import React from 'react'
import linkState from 'react-link-state'
import api from '../fnapi'
import _ from 'lodash'

export default class Search extends React.Component
{

  constructor () {
    super()
    this.submitForm = this.submitForm.bind(this)
    this.state = {
      data: {},
      result: ''
    }
  }

  submitForm (event) {
    event.preventDefault()
    var form = $(event.target)
    var input = {}
    $.each(form.serializeArray(), function () {
      input[this.name] = this.value
    })
    api.search(input.username, input.platform).then(({data}) => {
      this.setState({data: data})
    })
  }

  render () {
    var output = []
    var index = 0
    if (this.state.data.data) {
        _.each(this.state.data.data, (stats, gm) => {
          index += 1
          output.push((
            <div className="card" key={index}>
               <div className="card-body">
                 <h5 className="card-title">{gm}</h5>
                 <p className="card-text">{stats.wins}</p>
               </div>
             </div>))
        })
    }



    return (
      <div>
        <div id="search" className="card card-body mb-2">
          <form onSubmit={this.submitForm}>
            <div className="search-wrapper">
              <div className="logos">
                <div className="logo">
                  <input type="radio" id="windows" className="m1-2" name="platform" value="pc" required/>
                  <label htmlFor="windows"><i className="fab fa-windows"></i></label>
                </div>
                <div className="logo">
                  <input type="radio" id="playstation" className="m1-2" name="platform" value="ps4" required/>
                  <label htmlFor="playstation"><i className="fab fa-playstation"></i></label>
                </div>
                <div className="logo">
                  <input type="radio" id="xbox" className="m1-2" name="platform" value="xb1" required/>
                  <label htmlFor="xbox"><i className="fab fa-xbox"></i></label>
                </div>
              </div>
              <input type="text" name="username" className="form-control" placeholder="username..." required/>
            </div>

            <button className="btn btn-dark btn-block mt-4" type="submit">Find Player</button>
          </form>
        </div>
        {output}
      </div>
    )
  }

}
