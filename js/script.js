// js/script.js
document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card');
    let flippedCards = [];
    
    cards.forEach(card => {
        card.addEventListener('click', function () {
            if (!this.classList.contains('flipped') && flippedCards.length < 2) {
                this.classList.add('flipped');
                this.querySelector('img').classList.remove('hidden');
                flippedCards.push(this);

                if (flippedCards.length === 2) {
                    setTimeout(checkForMatch, 1000);
                }
            }
        });
    });

    function checkForMatch() {
        const [card1, card2] = flippedCards;
        if (card1.dataset.id === card2.dataset.id) {
            card1.classList.add('matched');
            card2.classList.add('matched');
        } else {
            card1.classList.remove('flipped');
            card1.querySelector('img').classList.add('hidden');
            card2.classList.remove('flipped');
            card2.querySelector('img').classList.add('hidden');
        }
        flippedCards = [];
    }
});
