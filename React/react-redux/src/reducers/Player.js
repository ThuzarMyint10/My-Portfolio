import * as PlayerActionTypes from '../actiontypes/Player';

const initialState = {
    players: [
        {
            name: "Alex",
            score: 0,
            created: '11/6/2010',
            updated: '21/6//2010'
        },
        {
            name: "John",
            score: 0,
            created: '11/1/2013',
            updated: '21/2//2013'
        },
        {
            name: "Smith",
            score: 0,
            created: '11/6/2015',
            updated: '21/10//2015'
        },
        {
            name: "Thour",
            score: 0,
            created: '11/6/2010',
            updated: '21/6//2010'
        },
        {
            name: "Rock",
            score: 0,
            created: '11/6/2011',
            updated: '21/6//2012'
        }
    ]

};


export default function Players(state = initialState.players, action) {
    // let date = new Date();
    // let day = date.getDate();
    // let month = date.getMonth() + 1;
    // let year = date.getFullYear()
    switch (action.type) {
        case PlayerActionTypes.ADD_PLAYER:
            return [
                ...state,
                {
                    name: action.name,
                    score: 0
                }
            ];
        case PlayerActionTypes.REMOVE_PLAYER:
            return {
                ...state.players.slice(0, action.index),
                ...state.players.slice(action.index + 1)
            };
        case PlayerActionTypes.UPDATE_PLAYER_SCORE:
            return state.map((player, index) => {
                if (index === action.index) {
                    return {
                        ...player,
                        score: player.score + action.score
                    };
                }
                return player;
            });
        default:
            return state;
    }
}