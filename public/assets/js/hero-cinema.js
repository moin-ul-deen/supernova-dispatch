document.addEventListener('DOMContentLoaded', () => {
    const heroSection = document.getElementById('hero-cinematic');
    if (!heroSection) return;

    gsap.registerPlugin(ScrollTrigger);

    // 1. Initialize Lenis Smooth Scroll
    const lenis = new Lenis({
        duration: 1.15,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smoothWheel: true
    });

    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((time) => lenis.raf(time * 1000));
    gsap.ticker.lagSmoothing(0);

    // 2. Read Dynamic Asset Paths from Blade Data Attributes
    const isMobile = window.innerWidth <= 768;
    const frameCount = isMobile
        ? parseInt(heroSection.dataset.mobileFrames, 10)
        : parseInt(heroSection.dataset.desktopFrames, 10);

    const folderPath = isMobile
        ? heroSection.dataset.mobilePath
        : heroSection.dataset.desktopPath;

    const getFrameUrl = (index) => {
        const padded = String(index + 1).padStart(4, '0');
        return `${folderPath}/frame_${padded}.webp`;
    };

    const canvas = document.getElementById('hero-canvas');
    const ctx = canvas.getContext('2d');
    const images = new Array(frameCount);
    const sequenceState = { frame: 0 };

    function resizeCanvas() {
        const dpr = Math.min(window.devicePixelRatio || 1, 2);
        canvas.width = window.innerWidth * dpr;
        canvas.height = window.innerHeight * dpr;
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        renderFrame(Math.round(sequenceState.frame));
    }

    function renderFrame(index) {
        const safeIndex = Math.max(0, Math.min(frameCount - 1, index));
        const img = images[safeIndex];
        if (!img || !img.complete || img.naturalWidth === 0) return;

        const canvasW = window.innerWidth;
        const canvasH = window.innerHeight;
        const imgRatio = img.naturalWidth / img.naturalHeight;
        const canvasRatio = canvasW / canvasH;

        let drawW, drawH, offsetX, offsetY;

        if (canvasRatio > imgRatio) {
            drawW = canvasW;
            drawH = canvasW / imgRatio;
            offsetX = 0;
            offsetY = (canvasH - drawH) / 2;
        } else {
            drawH = canvasH;
            drawW = canvasH * imgRatio;
            offsetX = (canvasW - drawW) / 2;
            offsetY = 0;
        }

        ctx.clearRect(0, 0, canvasW, canvasH);
        ctx.drawImage(img, offsetX, offsetY, drawW, drawH);
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    // 3. Two-Stage Progressive Preloader
    const initialBatch = Math.min(25, frameCount);
    let loadedInitial = 0;
    let isRevealed = false;
    const loaderEl = document.getElementById('cinema-loader');
    const loaderBar = document.getElementById('loader-bar');
    const loaderPct = document.getElementById('loader-pct');

    function revealStage() {
        if (isRevealed) return;
        isRevealed = true;
        if (loaderBar) loaderBar.style.width = '100%';
        if (loaderPct) loaderPct.textContent = '100%';

        setTimeout(() => {
            if (loaderEl) loaderEl.classList.add('hidden');
        }, 220);

        // Stream remaining frames silently in background
        for (let j = initialBatch; j < frameCount; j++) {
            loadImage(j);
        }
    }

    function loadImage(i, onLoadCallback) {
        const img = new Image();
        img.src = getFrameUrl(i);
        img.onload = () => {
            images[i] = img;
            if (i === 0) renderFrame(0);
            if (onLoadCallback) onLoadCallback();
        };
        img.onerror = () => {
            if (onLoadCallback) onLoadCallback();
        };
    }

    for (let i = 0; i < initialBatch; i++) {
        loadImage(i, () => {
            loadedInitial++;
            const pct = Math.round((loadedInitial / initialBatch) * 100);
            if (loaderBar) loaderBar.style.width = `${pct}%`;
            if (loaderPct) loaderPct.textContent = `${pct}%`;

            if (loadedInitial === initialBatch) {
                revealStage();
            }
        });
    }

    // Safety fallback so slow networks never trap the user
    setTimeout(revealStage, 4000);

    // 4. Master GSAP ScrollTrigger Timeline
    const masterTl = gsap.timeline({
        scrollTrigger: {
            trigger: '#hero-cinematic',
            start: 'top top',
            end: '+=520%',
            pin: true,
            scrub: 0.6,
            anticipatePin: 1,
            onUpdate: (self) => {
                const bar = document.getElementById('scroll-progress-bar');
                if (bar) bar.style.width = `${self.progress * 100}%`;

                gsap.to('#scroll-cue', {
                    opacity: self.progress > 0.04 ? 0 : 1,
                    duration: 0.3,
                    overwrite: true
                });
            }
        }
    });

    masterTl.to(sequenceState, {
        frame: frameCount - 1,
        ease: 'none',
        duration: 100,
        onUpdate: () => renderFrame(Math.round(sequenceState.frame))
    }, 0);

    function animateBeat(selector, startAt, endAt, keepVisible = false) {
        masterTl.fromTo(selector,
            { autoAlpha: 0, y: 36, filter: 'blur(8px)' },
            { autoAlpha: 1, y: 0, filter: 'blur(0px)', duration: 4.5, ease: 'power3.out' },
            startAt
        );

        if (!keepVisible) {
            masterTl.to(selector,
                { autoAlpha: 0, y: -28, filter: 'blur(6px)', duration: 4, ease: 'power2.in' },
                endAt
            );
        }
    }

    animateBeat('.beat-1', 0.5, 15);
    animateBeat('.beat-2', 19, 36);

    const statObj = { val: 0 };
    masterTl.to(statObj, {
        val: 98.4,
        duration: 7,
        ease: 'power2.out',
        onUpdate: () => {
            const el = document.getElementById('stat-ontime');
            if (el) el.textContent = statObj.val.toFixed(1);
        }
    }, 20);

    animateBeat('.beat-3', 40, 59);

    masterTl.fromTo('#dispatch-network-svg',
        { autoAlpha: 0, scale: 0.94 },
        { autoAlpha: 1, scale: 1, duration: 4 },
        41
    );
    masterTl.to('#route-line', {
        strokeDashoffset: 0,
        duration: 9,
        ease: 'power2.inOut'
    }, 42);
    masterTl.to('#dispatch-network-svg', {
        autoAlpha: 0,
        duration: 3.5
    }, 59);

    animateBeat('.beat-4', 63, 81);
    animateBeat('.beat-5', 85, 100, true);
});