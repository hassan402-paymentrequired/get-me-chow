import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

let audio = new Audio('/audio/sound.mp3');
const synth = window.speechSynthesis;

audio.load();


function playSound(url) {
    var ourAudio = document.createElement('audio');
    ourAudio.style.display = "none";
    ourAudio.src = url;
    ourAudio.autoplay = true;
    ourAudio.onended = function () {
        this.remove();
    };
    document.body.appendChild(ourAudio);

}



window.Echo.private(`order.${window.User.id}`)
    .listen("OrderPlacedEvent", (e) => {
        console.log('OrderPlacedEvent received:', e);
        playSound('/audio/sound.mp3');
    });

    
window.Echo.private(`order.message.${window.User.id}`)
    .listen("OrderMessageSentEvent", (e) => {
        console.log('OrderMessageSentEvent received:', e);
    });


window.Echo.private(`order.delayed.${window.User.id}`)
    .listen('OrderDelayed', (e) => {
        console.log('Order delayed!', e);
        // alert("You have an order that's been pending for more than 30 minutes.");
        const text = `hey ${e.order.owner.first_name}, You have an order that's been pending for more than 20 minutes.`;

        const utterThis = new SpeechSynthesisUtterance(text);
        synth.speak(utterThis);
        utterThis.onpause = (event) => {
            const char = event.utterance.text.charAt(event.charIndex);
            console.log(
                `Speech paused at character ${event.charIndex} of "${event.utterance.text}", which is "${char}".`,
            );
        };
    });





// const btn = document.querySelector('.voice-button');
// btn.onclick = () => {

//     const text = 'Hey hassan, your order has been placed successfully.';

//     const utterThis = new SpeechSynthesisUtterance(text);
//     synth.speak(utterThis);
//     utterThis.onpause = (event) => {
//         const char = event.utterance.text.charAt(event.charIndex);
//         console.log(
//             `Speech paused at character ${event.charIndex} of "${event.utterance.text}", which is "${char}".`,
//         );
//     };
// };

