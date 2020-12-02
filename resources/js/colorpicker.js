const pickr = Pickr.create({
    el: '#color-picker',
    theme: 'monolith', // or 'monolith', or 'nano'
    swatches: [
        'rgb(255, 255, 255)',
        'rgb(0, 0, 0)',
        'rgb(255, 0, 0)',
        'rgb(0, 255, 0)',
        'rgb(0, 0, 255)',
    ],

    components: {

        // Main components
        preview: true,
        hue: true,
        opacity: false,

        // Input / output Options
        interaction: {
            hex: true,
            rgba: true,
            input: true,
            clear: true,
            save: true
        }
    }
});

