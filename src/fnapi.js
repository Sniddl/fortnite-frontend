import axios from 'axios'

export default {
  search(username, platform) {
    return axios.get(`https://fn.sniddl.com/fresh/br/${username}/${platform}`)
  }
}
