
//CLASSES

/**
* Creates a new Player instance.
* @param {string} hand - The ID of the player's hand element.
* @class
*/
class Player {
    constructor(hand) {
        this.hand = [];
        this.score = 0;
        this.handElement = document.getElementById(hand); 
        this.scoreElement = document.getElementById(hand + "Score"); 
    }
    /**
    * @returns {number[]} An array containing the value of the hand and the count of aces worth 11.
    */
    handValue() {
        let value = 0;
        let aces = 0;
        this.hand.forEach(card => {
            if(typeof card[0] === 'number'){
                value += card[0];
            }
            if(typeof card[0] !== 'number'){
                value += 10;
                if(card[0] === 'A'){
                    aces ++;
                    value ++;
                }
            }
        });
        while(aces && value > 21){
            aces --;
            value -= 10;
        }
        return [value,aces];
    }
    /**
    * Draws a card from the deck.
    * Adds it to the hand.
    * 
    * Makes Card HTMLElement and appends to handElement.
    * 
    * Checks victory. Updates score.
    */
    draw() {
        let card = deck.deal();
        this.hand.push(card);
        let cardElement = createCardElement(card);
        this.handElement.append(cardElement);
        checkVictory(this);
        updateScore(this);
    }
    /**
    * Clears hand
    * 
    * Clears handElement
    */
    clearHand() {
        this.hand = [];
        while (this.handElement.childElementCount > 0) {
            this.handElement.removeChild(this.handElement.firstChild);
        }
    }
}
class Dealer extends Player {
    constructor(hand) {
        super(hand);
        this.hand = [];
    }
}
/**
 * Represents a deck of playing cards.
 * @class
 */
class Deck {
    constructor() {
        this.cards = [];
    }
    /**
     * Clears and populates the deck with cards.
     */
    populate() {
        this.cards = [];
        let suits = ["♤", "♥", "♦", "♧"];
        let values = ['A',2,3,4,5,6,7,8,9,10,'J','Q','K'];
        for (let i = 0; i < 13; i++) {
            for (let s = 0; s < 4; s++) {
                this.cards.push([values[i],suits[s]]);
            }
        }
    }
    /**
     * Shuffles the deck.
     */
    shuffle() {
        let shuffledDeck = [];
        let randIndex = 0;
            
        while (this.cards.length) {
            randIndex = Math.round(Math.random()*this.cards.length) - 1;
            shuffledDeck.push(this.cards.splice(randIndex,1)[0])
        }
        this.cards = shuffledDeck;
    }
    /**
    * Removes and returns a card from the deck.
    * @returns {Array} An array the cards value and suit.
    */
    deal() {
        return this.cards.splice(0,1)[0];
    }
}

//GAME-FLOW

let deck = new Deck();
let player = new Player('player');
let dealer = new Dealer('dealer');

/**
 * Clears hands.
 * Make hit button visible
 * 
 * New deck, player draws 2, dealer draws 2.
 */
function run() {
    player.clearHand();
    dealer.clearHand();
    swapVisibility(hitButton,true);
    swapVisibility(endButton, true);
    deck.populate();
    deck.shuffle();

    player.draw();
    player.draw();
    checkSplitable();

    dealer.draw();
    dealer.draw();
}
/**
 * Makes the player draw from the deck.
 */
function hit() {
    player.draw();
}
/**
 * Ends the players turn and lets the dealer draw.
 * 
 * TODO: let dealer account for aces
 */
function endTurn() {
    while(dealer.handValue()[0] <= 16){
        dealer.draw();
    }
    let playerValue = checkVictory(player);
    let dealerValue = checkVictory(dealer);
    if((!isNaN(playerValue) && !isNaN(dealerValue) && playerValue > dealerValue) || dealerValue == "bust"){
        player.score ++;
    }else{
        dealer.score ++;
    }
    updateScore(player);
    updateScore(dealer);
}

/**
 * Returns the hand value or game state.
 * If a gamestate is returned a popup is made. 
 * @param {Player} p - Player to check.
 * @returns The hand value or game state.
 */
function checkVictory(p) {
    let state = false;
    //blackjack
    if (p.handValue()[0] == 21) {
        state = 'blackjack';
        swapVisibility(hitButton);
        swapVisibility(endButton);
    }
    //bust
    if (p.handValue()[0] > 21) {
        state = 'bust';
        swapVisibility(hitButton);
        swapVisibility(endButton);
    }
    //default
    if(!state){
        state = p.handValue()[0];
    }else{
        popup(state);
    }

    return state;
}

//INTERFACE FUNCTIONS

/**
 * Make an HTML element visible/invisible 
 * @param {HTMLElement} element - The element to swap  
 * @param {Boolean} forceShow - true = show
 */
function swapVisibility(element, forceShow = false) {
    if(!element.getAttribute('hidden') && !forceShow){
        element.setAttribute('hidden','hidden');
    }else{
        element.removeAttribute('hidden');
    }
}

/**
 * Shows a popup for 1 sec then fades
 * @param {Text} message 
 */
function popup(message) {
    let popup = document.createElement('p');
    popup.innerText = message;
    popupElement.appendChild(popup);
    setTimeout(function() {
        popup.setAttribute('class','hidden');
    }, 1000);
    setTimeout(function() {
        popupElement.removeChild(popup);
    }, 2000);
}

/**
 * 
 * @param {Array[]} newCard - An array containing the value and suit of the card.
 * @returns {HTMLElement} A Card HTMLElement
 */
function createCardElement(newCard) {
    let newCardElement = document.createElement('div');
    newCardElement.setAttribute('class','card'); 
    let suitElement = document.createElement('p');
    suitElement.setAttribute("class","suit");
    suitElement.innerText = newCard[1];
    let valueElement = document.createElement('p');
    valueElement.setAttribute("class","value");
    valueElement.innerText = newCard[0];
    
    newCardElement.append(valueElement);
    newCardElement.append(suitElement);
    return newCardElement;
}
/**
 * Updates the score element for the player
 * @param {Player} p - Player/Dealer 
 */
function updateScore(p) {
    if(!isNaN(checkVictory(p))){
        p.scoreElement.innerText = p.handValue()[0];
    }else{
        p.scoreElement.innerText = checkVictory(p);
    }
    p.scoreElement.innerText += " | Wins:" + p.score ;
}

function checkSplitable() {
    swapVisibility(splitButton,true)
    if (player.hand[0][0] !== player.hand[1][0]) {
        swapVisibility(splitButton);
    }
}
//CONTROLL ELEMENTS
    //INFO HEADERS
    let dealerHeader = document.getElementById('dealerHeader');
    let playerHeader = document.getElementById('playerHeader');

    //POPUP
    let popupElement = document.getElementById('popup');    
    //BUTTONS
    let mainButton = document.getElementById('mainButton');
    mainButton.addEventListener('click',run);

    let hitButton = document.getElementById('hit');
    hitButton.addEventListener('click',hit);

    let endButton = document.getElementById('endTurn');
    endButton.addEventListener('click',endTurn);

    let splitButton = document.getElementById('split');
    splitButton.addEventListener('click',);
