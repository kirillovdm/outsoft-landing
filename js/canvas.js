var container, wrapper, wrapper2;
var scene, camera;
var cube_texture, loader, textured_cube;
var mouseX, mouseY;
var hatArr = [];

container = document.getElementById('vr-canvas');
wrapper = document.getElementById('canvas-wrapper');
console.log(container, wrapper.innerWidth);
// document.body.appendChild(container);

renderer = new THREE.WebGLRenderer({ alpha: true });
renderer.setSize(wrapper.offsetWidth, wrapper.offsetHeight);
// renderer.setClearColor(0xe0e0e0, 1);
container.appendChild(renderer.domElement);

camera = new THREE.PerspectiveCamera(70, wrapper.offsetWidth/wrapper.offsetHeight, 0.1, 3000);
scene = new THREE.Scene();

camera.position.x = 10;
camera.position.y = 100;
camera.position.z = 600;
camera.rotation.x = -0.225;
camera.rotation.y = 0;


var rotation_trigger = {
    rotationX: 0,
    rotationY: 0,
    rotationZ: 0,
    positionX: 0,
    positionY: 15,
    positionZ: 90
};

var gui = new dat.GUI();
gui.add(rotation_trigger, 'rotationX').min(-0.2).max(0.2).step(0.001);
gui.add(rotation_trigger, 'rotationY').min(-0.2).max(0.2).step(0.001);
gui.add(rotation_trigger, 'rotationZ').min(-0.2).max(0.2).step(0.001);
gui.add(rotation_trigger, 'positionX').min(-200).max(200).step(1);
gui.add(rotation_trigger, 'positionY').min(-200).max(200).step(1);
gui.add(rotation_trigger, 'positionZ').min(-200).max(200).step(1);


//CUBE
var textured_cube_geometry = new THREE.CubeGeometry(300,300,300);

// cube_texture = new THREE.TextureLoader().load( "textures/water.jpg" );
// texture.wrapS = THREE.RepeatWrapping;
// //    texture.wrapT = THREE.RepeatWrapping;
// texture.repeat.set( 1, 2 );
// //
//    loader.load('textures/brick_diffuse.jpg');

var textured_cube_material = new THREE.MeshBasicMaterial({color:0xcccccc});

//    for(var i=0; i<textured_cube_geometry.faces.length; i++){
//        var f = textured_cube_geometry.faces[i];
//        f.color.setHex(Math.random() * 0xffffff);
//    }

textured_cube = new THREE.Mesh(textured_cube_geometry, textured_cube_material);
scene.add(textured_cube);

var outlineMaterial2 = new THREE.MeshBasicMaterial( { color: 0x00ff00, side: THREE.BackSide } );
var outlineMesh2 = new THREE.Mesh( textured_cube_geometry, outlineMaterial2 );
outlineMesh2.position = textured_cube.position;
outlineMesh2.scale.multiplyScalar(1.05);
// scene.add( outlineMesh2 );


// MODEL
// var onProgress = function ( xhr ) {
//     if ( xhr.lengthComputable ) {
//         var percentComplete = xhr.loaded / xhr.total * 100;
//         console.log( Math.round(percentComplete, 2) + '% downloaded' );
// //                if( percentComplete > 99){
// //                    onLoadAnimations();
// //                }
//     }
// };
// var onError = function ( xhr ) { };
//
// THREE.Loader.Handlers.add( /\.dds$/i, new THREE.DDSLoader() );
//
// var mtlLoader = new THREE.MTLLoader();
// mtlLoader.setPath( './obj/' );
// mtlLoader.load( 'Google_vr.mtl', function( materials ) {
//
//     materials.preload();
//
//     var objLoader = new THREE.OBJLoader();
//     objLoader.setMaterials( materials );
//     objLoader.setPath( './obj/' );
//     objLoader.load( 'Google_vr.obj', function ( obj ) {
//
//         scene.add( obj );
//
// //         obj.traverse( function (child) {
// //             if ( child instanceof THREE.Mesh ) {
// // //                        console.log(child);
// //
// //                 child.castShadow = true;
// //                 child.receiveShadow = true;
// // //                        child.material.opacity = 0;
// //
// //                 // TweenMax.from(child.material, 2.5, {opacity: 0, delay:.5});
// //
// //                 hatArr.push(child);
// //             }
// //         });
//
//     }, onProgress, onError );
//
// });
// MODEL END


//PLANE
var planeGeometry = new THREE.PlaneGeometry(155, 155);
var planeMaterial = new THREE.MeshBasicMaterial({color: 0xeeeeee, opacity: 0.9});
var plane = new THREE.Mesh(planeGeometry, planeMaterial);
plane.material.side = THREE.DoubleSide;
// scene.add(plane);
plane.rotation.x = (Math.PI / 2);

//SPHERE
var sphereGeometry = new THREE.SphereGeometry(2, 5);
var sphereMaterial = new THREE.MeshNormalMaterial();
var sphere = new THREE.Mesh(sphereGeometry, sphereMaterial);
//    scene.add(sphere);


//MOUSE CONTROLS
document.addEventListener('mousemove', function (event) {
    mouseX = (event.clientX - (window.innerWidth / 2));
    mouseY = (event.clientY - (window.innerHeight / 2));
    camera.position.x += (mouseX - camera.position.x) * 0.25;
    camera.position.y += (-mouseY - camera.position.y) * 0.25;
    camera.lookAt(textured_cube.position);
}, false);


var animation = function(){
//        time += 0.001;

//        scene.rotation.y += 0.05;
//      cube.position.y += Math.sin(time*100)/2;
//     textured_cube.position.y += 0.05;


//        for(var i=0; i<100; i++){
//            groupCube.children[i].position.y += Math.sin(time*100)*Math.random()*10;
//            groupCube.children[i].rotation.y += 180/Math.PI* 0.0001;
//        }

//        textured_cube.rotation.y += 180/Math.PI * 0.0001;
    textured_cube.rotation.x += rotation_trigger.rotationX;
    textured_cube.rotation.y += rotation_trigger.rotationY;
    textured_cube.rotation.z += rotation_trigger.rotationZ;
    scene.position.x = rotation_trigger.positionX;
    scene.position.y = rotation_trigger.positionY;
    scene.position.z = rotation_trigger.positionZ;

    outlineMesh2.rotation.x += rotation_trigger.rotationX;
    outlineMesh2.rotation.y += rotation_trigger.rotationY;
    outlineMesh2.rotation.z += rotation_trigger.rotationZ;
    outlineMesh2.position.x = rotation_trigger.positionX;
    outlineMesh2.position.y = rotation_trigger.positionY;
    outlineMesh2.position.z = rotation_trigger.positionZ;

//        if(!(camera.rotation.y < -3.2)){
//            camera.rotation.y += -180/Math.PI * 0.00009;
//            camera.position.z +=-1;
//        }

    renderer.render(scene, camera);
};
var render = function(){
    requestAnimationFrame( render );
    animation();
};

render();