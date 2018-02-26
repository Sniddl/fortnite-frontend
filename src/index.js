import React from 'react'
import { render } from 'react-dom'
import App from './components/App'

import './sass/main.scss'

window.$ = window.jQuery = require('jquery')


const wrapper = document.getElementById('app')

wrapper ? render(<App name="zeb"/>, wrapper) : false
