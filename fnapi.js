import axios from 'axios'

export default {
  search(username, platform) {
    console.log(username);
    return axios.get(`https://fn.sniddl.com/fresh/br/${username}/${platform}`)
  }
}
