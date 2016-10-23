const context = new (window.AudioContext || window.webkitAudioContext)();
const typeSounds = ['sine', 'square', 'sawtooth', 'triangle'];

((frequency, startTime, duration, type = typeSounds[0]) => {

    const osc1 = context.createOscillator(),
        osc2 = context.createOscillator(),
        volume = context.createGain();

    // Set oscillator wave type
    osc1.type = type;
    osc2.type = type;

    volume.gain.value = 0.1;

    // Set up node routing
    osc1.connect(volume);
    osc2.connect(volume);
    volume.connect(context.destination);

    // Detune oscillators for chorus effect
    osc1.frequency.value = frequency + 1;
    osc2.frequency.value = frequency - 2;

    // Fade out
    volume.gain.setValueAtTime(0.1, startTime + duration - 0.05);
    volume.gain.linearRampToValueAtTime(0, startTime + duration);

    // Start oscillators
    osc1.start(startTime);
    osc2.start(startTime);

    // Stop oscillators
    osc1.stop(startTime + duration);
    osc2.stop(startTime + duration);

})(493.883, context.currentTime, 5);
