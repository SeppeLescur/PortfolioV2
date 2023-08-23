let games = ['blackjack','backgammon'];
let menuButtons = [];
let contentElement = document.getElementById('content');
games.forEach(game => {
    let button = document.createElement('button');
    button.innerText = game;
    button.addEventListener('click',)
    contentElement.append(button);
});