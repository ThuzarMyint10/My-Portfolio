import React, { Component } from 'react';
import axios from 'axios';
import './App.css';
import SearchForm from './compnents/SearchForm';
import GiftList from './compnents/GiftList';

class App extends Component {
  constructor() {
    super();
    this.state = {
      gifs: [],
      loading: true
    }
  }

  componentDidMount() {
    this.performSearch();
  }

  performSearch = (query = 'cats') => {
    axios.get(`https://api.giphy.com/v1/gifs/search?q=${query}&limit=24&api_key=dc6zaTOxFJmzC`)
      .then(response => {
        this.setState({
          gifs: response.data.data,
          loading: false
        });
      })
      .catch(error => {
        console.log('Error fetching and parsing data', error)
      });
  }


  render() {
    console.log(this.state.gifs);
    return (
      <div>
        <div className="main-header">
          <div className="inner">
            <h1 className="main-title">GiftSearch</h1>
            <SearchForm onSearch={this.performSearch} />
          </div>
        </div>
        <div className="main-content">
          {
            (this.setState.loading)
              ? <p>Loading....</p>
              : <GiftList data={this.state.gifs} />
          }
        </div>
      </div >
    );
  }

}

export default App;
