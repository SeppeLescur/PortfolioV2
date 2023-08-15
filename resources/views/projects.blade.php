
@extends('layout.layout')

@section('title')
Projects
@endsection
@section('content')
    <div class="blackjack">
        <div id="popup">
        </div>
        <div class="table">
            <h3>Deck</h3>
            <div id="deck">
            </div>
            
            <h3 id='dealerHeader'>
                <p>Dealer</p>
                <p id='dealerScore'></p>
            </h3>
            <div id="dealer">
            </div>

            <h3 id='playerHeader'>
                <p>Your hand</p>
                <p id='playerScore'></p>
            </h3>
            <div id="player">
            </div>

        </div>
        <div class="controlls">
            <button id='hit' hidden='hidden'>Hit</button>
            <button id='split' hidden='hidden'>split</button>
            <br>
            <button id='mainButton'>New game</button>
            <button id='endTurn'>End turn</button>
        </div>
    </div>
    <div id="backgammon">
        <div class="track">
            <div class="triangle"><div class="circle black"></div><div class="circle black"></div><div class="circle black"></div></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
        </div>
        <div class="track">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
        </div>
    </div>
    <script src="{{ asset('js/blackjack.js') }}"></script>
@endsection