(function ($, api) {
    "use strict";

    api.archivecontainer = new api.Values({defaultConstructor: api.ArchiveContainer});

    /**
     * Archive container class
     */
    api.ArchiveContainer = api.BaseContainer.extend({
        /**
         * Set Container Holder
         */
        setContainerHolder: function() {
            this.containerHolder = api.archivecontainer;
        },
    });

    /**
     * Jeg Archive Builder
     */
    window.jeg = window.jeg || {};
    jeg.archive = {};

    jeg.archive.build = function(id, data) {
        var parent = $("#" + id);
        api.archivecontainer(id, new api.ArchiveContainer(id, parent, data));
    };

})(jQuery, wp.customize);
