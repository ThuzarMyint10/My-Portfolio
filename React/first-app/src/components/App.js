import React, { PureComponent } from 'react';
import Header from './Header';
import Player from './Player';
import AddPlayerForm from './AddPlayerForm';
import '../App.css';



class App extends PureComponent {

  state = {
    players: [
      {
        name: "Alex",
        score: 0,
        id: 1
      },
      {
        name: "John",
        score: 0,
        id: 2
      },
      {
        name: "Smith",
        score: 0,
        id: 3
      },
      {
        name: "Thour",
        score: 0,
        id: 4
      },
      {
        name: "Rock",
        score: 0,
        id: 5
      }
    ]
  };


  prevPlayerId = 4;

  handleremovePlayer = (id) => {
    this.setState(prevState => {
      return {
        players: prevState.players.filter(p => p.id !== id)
      };
    });
  }

  handleAddPlayer = (name) => {
    this.setState(prevState => {
      return {
        players: [
          ...prevState.players,
          {
            name,
            score: 0,
            id: this.prevPlayerId = +1
          }
        ]
      };

    });
  }



  handleScoreChange = (index, delta) => {
    this.setState(prevState => ({
      score: prevState.players[index].score += delta
    }));
  }

  render() {
    return (
      <div className="scoreboard" >
        <Header players={this.state.players} />

        {/* Players List */}
        {this.state.players.map((player, index) =>
          <Player
            name={player.name}
            score={player.score}
            id={player.id}
            key={player.id.toString()}
            index={index}
            changeScore={this.handleScoreChange}
            removePlayer={this.handleremovePlayer}
          />
        )}
        <AddPlayerForm addPlayer={this.handleAddPlayer} />
      </div >
    );
  }
}

export default App;
