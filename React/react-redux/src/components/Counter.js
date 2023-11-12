import React from 'react';
import PropTypes from 'prop-types';

const Counter = props => {
    return (
        <div className="counter" >
            <button className="counter-action decrement" onClick={() => props.updatePlayerScore(props.index, -1)}>-</button>
            <span className="counter-score">{props.score}</span>
            <button className="counter-action increment" onClick={() => props.updatePlayerScore(props.index, 1)} >+</button>
        </div>
    );
}

Counter.propTypes = {
    index: PropTypes.number,
    score: PropTypes.number,
    updatePlayerScore: PropTypes.func.isRequired
};

export default Counter;