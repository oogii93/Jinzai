import * as THREE from 'three';

export function initThreeBackground() {
    const container = document.getElementById('three-background');
    if (!container) return;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(20, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true });

    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);

    // Create bubbles
    const bubbles = [];
    const bubbleGeometry = new THREE.SphereGeometry(1, 32, 32);

    // Add lights
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.8);
    const pointLight = new THREE.PointLight(0xffffff, 1.5);
    pointLight.position.set(5, 5, 10);
    scene.add(ambientLight, pointLight);

    // Create multiple bubbles
    for (let i = 0; i < 20; i++) {
        const bubble = new THREE.Mesh(bubbleGeometry, createRandomBubbleMaterial());

        // Random positions across the scene
        bubble.position.x = (Math.random() - 0.5) * 30;
        bubble.position.y = (Math.random() - 0.5) * 20;
        bubble.position.z = (Math.random() - 0.5) * 15;

        // Random sizes for variety
        const scale = 0.5 + Math.random() * 2;
        bubble.scale.set(scale, scale, scale);

        // Add custom properties for animation
        bubble.userData.speed = 0.001 + Math.random() * 0.002;
        bubble.userData.floatOffset = Math.random() * Math.PI * 2;
        bubble.userData.rotationSpeed = (Math.random() - 0.5) * 0.01;

        bubbles.push(bubble);
        scene.add(bubble);
    }

    camera.position.z = 15;

    // Handle window resize
    window.addEventListener('resize', () => {
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    });

    // Animation loop
    function animate() {
        requestAnimationFrame(animate);

        bubbles.forEach((bubble) => {
            // Gentle floating motion
            bubble.position.y += Math.sin(Date.now() * bubble.userData.speed + bubble.userData.floatOffset) * 0.006;

            // Subtle rotation
            bubble.rotation.x += bubble.userData.rotationSpeed;
            bubble.rotation.y += bubble.userData.rotationSpeed;

            // Reset position if bubble goes too high
            if (bubble.position.y > 16) {
                bubble.position.y = -16;
            }

            // Subtle size pulsing
            const scale = 1 + Math.sin(Date.now() * 0.001 + bubble.userData.floatOffset) * 0.02;
            bubble.scale.set(scale, scale, scale);
        });

        // Camera animation
        const cameraOffset = Math.sin(Date.now() * 0.001) * 0.2;
        camera.position.y = 4 + cameraOffset;
        camera.rotation.x = 0.3 + cameraOffset * 0.3;

        renderer.render(scene, camera);
    }

    animate();
}

function createRandomBubbleMaterial() {
    return new THREE.MeshPhongMaterial({
        color: new THREE.Color(Math.random(), Math.random(), Math.random()),
        transparent: true,
        opacity: 0.6 + Math.random() * 0.4,
        shininess: 300,
        specular: 0x00ffff,
        side: THREE.DoubleSide
    });
}
