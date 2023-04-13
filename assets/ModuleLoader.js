let ModuleLoader = {
    modules: [],

    registerModule: function(moduleName, modulePath) {
        modules.push({
            name: moduleName,
            path: modulePath
        });
    },

    unregisterModule: function(moduleName) {
        modules.filter(function (module) {
            return module.name !== moduleName
        });
    },

    importModules: function() {
        modules.forEach(function (module) {
            import * as module from "module";
        });
    }
};