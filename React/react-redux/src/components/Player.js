import React from 'react';
import PropTypes from 'prop-types';
import Counter from './Counter';

const Player = props => {

    return (
        <div className="player">
            <span className="player-name" onClick={() => props.selectPlayer(props.index)}>
                <button className="remove-player" onClick={() => props.removePlayer(props.index)}>x</button>
                <i className='fas fa-crown'></i>
                {props.name}
            </span>
            <Counter
                score={props.score}
                index={props.index}
                updatePlayerScore={props.updatePlayerScore}
            />
        </div >
    );


}

Player.propTypes = {
    name: PropTypes.string.isRequired,
    index: PropTypes.number.isRequired,
    score: PropTypes.number.isRequired,
    removePlayer: PropTypes.func.isRequired,
    updatePlayerScore: PropTypes.func.isRequired,
    selectPlayer: PropTypes.func.isRequired
};

export default Player;