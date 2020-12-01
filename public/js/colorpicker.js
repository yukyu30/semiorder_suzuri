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
        opacity: false,
        hue: true,

        // Input / output Options
        interaction: {
            hex: true,
            rgba: true,
            hsla: true,
            hsva: true,
            cmyk: true,
            input: true,
            clear: true,
            save: true
        }
    }
});

pickr.on('save', (color, instance) => {
	this.$refs.color.value = color.toHEXA();
});