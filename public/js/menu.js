let games = ['blackjack','backgammon'];
let menuButtons = [];
let contentElement = document.getElementById('content');
games.forEach(game => {
    let button = document.createElement('button');
    let buttonElement = document.getElementById(game);
    button.innerText = game;
    button.addEventListener('click',function() {
        console.log("buttonElement:", buttonElement);

        swapVisibility(buttonElement);
    })
    contentElement.append(button);
});