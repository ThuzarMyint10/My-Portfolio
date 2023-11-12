import React, { Component } from 'react';
import Header from './Header';
import PlayerList from './PlayerList';
import AddPlayerForm from './AddPlayerForm';

class App extends Component {


  render() {
    return (


      <div className="scoreboard">
        <Header />
        <PlayerList changeScore={this.handleScoreChange} />
        <AddPlayerForm />
      </div>
    );
  }
}

export default App;
