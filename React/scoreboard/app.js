function Header(props) {
    return (
        <header>
            <h1>{props.title}</h1>
            <span className="stats">Players: {props.totalPlayers}</span>
        </header>
    );
}

const Player = (props) => {
    return (
        <div className="player">
            <span className="player-name">
                <button className="remove-player" onClick={() => props.removePlayer(props.id)}>x</button>
                {props.name}
            </span>
            <Counter score={props.score} />
        </div>
    );
}

class Counter extends React.Component {

    state = {
        score: 0
    };


    incrementScore = () => {
        this.setState(prevState => ({
            score: prevState.score + 1
        }));
    }

    decrementScore = () => {
        this.setState(prevState => ({
            score: prevState.score - 1
        }));
    }

    render() {
        return (
            <div className="counter" >
                <button className="counter-action decrement" onClick={this.decrementScore}>-</button>
                <span className="counter-score">{this.state.score}</span>
                <button className="counter-action increment" onClick={this.incrementScore}>+</button>
            </div>
        );
    }
}

class App extends React.Component {

    state = {
        players: [
            {
                name: "Alex",
                id: "1"
            },
            {
                name: "John",
                id: "2"
            },
            {
                name: "Smith",
                id: "3"
            },
            {
                name: "Thour",
                id: "4"
            },
            {
                name: "Rock",
                id: "5"
            },
        ]
    };


    handleremovePlayer = (id) => {
        this.setState(prevState => {
            return {
                players: prevState.players.filter(p => p.id !== id)
            };
        });
    }

    render() {
        return (
            <div className="scoreboard" >
                <Header
                    title="Scoreboard"
                    totalPlayers={this.state.players.length}
                />

                {/* Players List */}
                {this.state.players.map(player =>
                    <Player
                        name={player.name}
                        id={player.id}
                        key={player.id.toString()}
                        removePlayer={this.handleremovePlayer}
                    />
                )}
            </div >
        );
    }
}

ReactDOM.render(
    <App />,
    document.getElementById('root')
)