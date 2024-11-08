// resources/js/three-background.js
import * as THREE from 'three';

export function initThreeBackground() {
    const container = document.getElementById('three-background');
    if (!container) return;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(35, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true });

    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);

    // Create bubbles
    const bubbles = [];
    const bubbleGeometry = new THREE.SphereGeometry(1, 32, 32); // More segments for smoother spheres
    const bubbleMaterial = new THREE.MeshPhongMaterial({
        border:0xffffff,
        color: 0xffffff,
        transparent: true,
        opacity: 0.1,
        shininess: 200,
        specular: 0x004080, // Slight blue tint for specular highlights
        side: THREE.DoubleSide
    });

    // Add lights to create a shimmering effect
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
    scene.add(ambientLight);

    const pointLight = new THREE.PointLight(0xffffff, 1);
    pointLight.position.set(5, 5, 5);
    scene.add(pointLight);

    // Create multiple bubbles
    for (let i = 0; i < 15; i++) {
        const bubble = new THREE.Mesh(bubbleGeometry, bubbleMaterial.clone());

        // Random positions across the scene
        bubble.position.x = (Math.random() - 0.5) * 15;
        bubble.position.y = (Math.random() - 0.5) * 15;
        bubble.position.z = (Math.random() - 0.5) * 5;

        // Random sizes for variety
        const scale = 0.5 + Math.random() * 1;
        bubble.scale.set(scale, scale, scale);

        // Add custom properties for animation
        bubble.userData.speed = 0.001 + Math.random() * 0.001;
        bubble.userData.floatOffset = Math.random() * Math.PI * 2;

        bubbles.push(bubble);
        scene.add(bubble);
    }

    camera.position.z = 4;

    // Handle window resize
    window.addEventListener('resize', () => {
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    });

    // Animation loop
    function animate() {
        requestAnimationFrame(animate);

        bubbles.forEach((bubble, index) => {
            // Gentle floating motion
            bubble.position.y += Math.sin(Date.now() * bubble.userData.speed + bubble.userData.floatOffset) * 0.01;

            // Subtle rotation
            bubble.rotation.x += 0.002;
            bubble.rotation.y += 0.004;

            // Reset position if bubble goes too high
            if (bubble.position.y > 8) {
                bubble.position.y = -8;
            }

            // Subtle size pulsing
            const scale = 1 + Math.sin(Date.now() * 0.001 + index) * 0.1;
            bubble.scale.set(scale, scale, scale);
        });

        renderer.render(scene, camera);
    }

    animate();
}
