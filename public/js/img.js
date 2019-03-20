window.addEventListener('DOMContentLoaded', function () {
    var canvas = document.getElementById('renderCanvas');
    var engine = new BABYLON.Engine(canvas, true);

    var createScene = function () {
        var scene = new BABYLON.Scene(engine);
        var camera = new BABYLON.ArcRotateCamera("Camera", -Math.PI / 2, Math.PI / 2, 5, BABYLON.Vector3.Zero(), scene);
        camera.attachControl(canvas, true);
        camera.inputs.attached.mousewheel.detachControl(canvas);

        var dome = new BABYLON.PhotoDome(
            "testdome",
            './src/Ressources/img/base.jpeg', {
                resolution: 32,
                size: 1000
            },
            scene
        );
        return scene;
    };
    var scene = createScene();
    engine.runRenderLoop(function () {
        scene.render();
    });
    window.addEventListener('resize', function () {
        engine.resize();
    });
});