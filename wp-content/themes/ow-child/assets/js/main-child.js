/* GENERAL FUNCTIONS */
var generalFunctions = (function() {
    'use strict';

    var ow;
    var general = {

        settings: {
            body: $('body')
        },
        init: function() {
            ow = this.settings;
            this.sampleFunc();
        },
        sampleFunc: function() {

        }
    }
    general.init();
});

(function() {
    // generalFunctions();
})();



// ZocDoc
(function (d) {
    var script = d.createElement('script'); script.type = 'text/javascript'; script.async = true;
    script.src = '//offsiteschedule.zocdoc.com/plugin/embed';
    var s = d.getElementsByTagName('script')[0]; s.parentNode.insertBefore(script, s);
})(document);
