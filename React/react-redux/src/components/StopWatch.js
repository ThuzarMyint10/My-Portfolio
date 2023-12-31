import React, { Component } from 'react';

class StopWatch extends Component {
    state = {
        isRunning: false,
        elapsedTime: 0,
        previousTime: 0
    };


    componentDidMount() {
        this.intervalID = setInterval(() => this.tick(), 100);
    }

    componentWillMount() {
        clearInterval(this.intervalID);
    }

    tick = () => {
        if (this.state.isRunning) {
            const now = Date.now();
            this.setState({
                previousTime: now,
                elapsedTime: this.state.elapsedTime + (now - this.state.previousTime)
            });
        }
    }

    handleReset = () => {
        this.setState({
            elapsedTime: 0
        });
    }

    handleStopwatch = () => {
        this.setState({
            isRunning: !this.state.isRunning
        });
        if (!this.state.isRunning) {
            this.setState({
                previousTime: Date.now()
            });

        }
    }

    render() {
        const seconds = Math.floor(this.state.elapsedTime / 1000);
        return (
            <div className="stopwatch">
                <h2>Stopwatch</h2>
                <span className="stopwatch-time">{seconds}</span>
                <button onClick={this.handleStopwatch}>{
                    this.state.isRunning ? 'Stop' : 'Start'
                }</button>
                <button onClick={this.handleReset}>Reset</button>
            </div>
        );
    }
}
export default StopWatch;