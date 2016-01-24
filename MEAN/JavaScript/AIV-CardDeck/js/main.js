
// Player Class
	function Player (name) {
		this.name = name;
		this.hand = [];
		this.discardCards = [];

		Player.prototype.takeCard = function(cardDeck) {
			if (cardDeck.deck.length > 0) {
				this.hand.push(cardDeck.deal());
				return cardDeck.deal;
			}
		}

		Player.prototype.discard = function(hand) {
			var discardIt = hand.pop();
			this.discardCards.push(discardIt);
			return discardIt;
		}
	}

// CardDeck Class
	function CardDeck () {
		this.deck = ['c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10', 'cj', 'cq', 'ck',
						'd1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7', 'd8', 'd9', 'd10', 'dj', 'dq', 'dk',
						's1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 'sj', 'sq', 'sk',
						'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'h7', 'h8', 'h9', 'h10', 'hj', 'hq', 'hk'];
		this.dealtCards = [];

		this.checkUnique = function(num_array) {
			var unique_numbers = [];

			for (var i = 0; i < num_array.length; i++)
			{
				var found_duplicate = false;

				for (var j = 0; j < unique_numbers.length; j++)
				{
					if (num_array[i] == unique_numbers[j])
					{
						found_duplicate = true;
					}
				}

				if (found_duplicate == false)
				{
					unique_numbers.push(num_array[i]);
				}
			}
			return unique_numbers;
		}

		CardDeck.prototype.shuffle = function() {
			if (this.deck.length == 52) {
				var shuffled_deck = [];
				var duplicates = [];
				var newIndexes = [];

				// Create 52 unique random numbers
				while(newIndexes.length < 52) {

					// push random numbers to duplicates array
					for (var i = 0; i < this.deck.length; i++) {
						var rand = Math.floor((Math.random() * 52));
						duplicates.push(rand);
					}
					// checkUnique() returns unique random numbers
					newIndexes = this.checkUnique(duplicates);
				}

				// use unique random numbers to change deck indexes
				for (var i = 0; i < this.deck.length; i++) {
					shuffled_deck.push(this.deck[newIndexes[i]]);
				}
				this.deck = shuffled_deck;
				return this;
			} else {
				return this;
			}
		}

		CardDeck.prototype.reset = function() {
			this.deck = ['c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10', 'cj', 'cq', 'ck',
						'd1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7', 'd8', 'd9', 'd10', 'dj', 'dq', 'dk',
						's1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 'sj', 'sq', 'sk',
						'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'h7', 'h8', 'h9', 'h10', 'hj', 'hq', 'hk'];
			this.dealtCards = [];
		}

		CardDeck.prototype.deal = function() {
			if (this.deck.length > 0) {
				var dealIt = this.deck.shift();
				this.dealtCards.push(dealIt);
				return dealIt;
			}
		}
	}

// Object instances
	var game1 = new CardDeck();
	var player1 = new Player('Mark');

// Retrieve HTML eleements
	var shuffle = document.getElementById('shuffle');
	var deal = document.getElementById('deal');
	var playerOneTake = document.getElementById('take_card');
	var playerOneDiscard = document.getElementById('discard_card');
	var discardHeap = document.getElementById('discard_heap');
	var reset = document.getElementById('reset');
	var deck = document.getElementById('deck');

// Deck
	deck.addEventListener('click', function(event) {
		event.preventDefault();
		console.clear();
		console.log(game1.deck);
	});

// Shuffle
	shuffle.addEventListener('click', function(event) {
		event.preventDefault();
		console.clear();
		game1.shuffle().shuffle().shuffle();
		console.log(game1.deck);
	});

// Deal
	deal.addEventListener('click', function(event) {
		event.preventDefault();
		console.log(game1.deal());
		console.log(game1.deck);
	});

// Player1 - take
	playerOneTake.addEventListener('click', function(event) {
		event.preventDefault();
		console.clear();
		player1.takeCard(game1); // Deal
		console.log(player1.name + '\'s hand: ' + player1.hand);
		console.log(game1.deck);
	});

// Player1 - discard
	playerOneDiscard.addEventListener('click', function(event) {
		event.preventDefault();
		console.clear();
		player1.discard(player1.hand);
		console.log(player1.name + '\'s hand: ' + player1.hand);
		console.log(game1.deck);
	});

// Discard heap
	discardHeap.addEventListener('click', function(event) {
		event.preventDefault();
		var discards = player1.discardCards;
		console.log(player1.name + '\'s discarded cards: ' + player1.discardCards);
		console.log(game1.deck);
	});

// Reset
	reset.addEventListener('click', function(event) {
		console.clear();
		event.preventDefault();
		game1.reset();
		console.log(game1.deck);
	});



// FOR FUTURE REFERENCE ONLY:
	// document.getElementById('shuffle').onclick = function() {
	// };

	// var form = document.getElementById('shuffle_form');
	// form.addEventListener("submit", function() {
	// });