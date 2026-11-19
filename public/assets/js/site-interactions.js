document.addEventListener('DOMContentLoaded', () => {
    // 1. Transparent Over Entire Hero; Solid Glass Only After Hero Ends
    const topNav = document.querySelector('.top-nav');
    const afterHeroSection = document.querySelector('.trust-strip') || document.querySelector('main > section:nth-of-type(2)');

    if (topNav) {
        function handleNavBackground() {
            if (afterHeroSection) {
                const triggerPoint = afterHeroSection.getBoundingClientRect().top;
                if (triggerPoint <= 85) {
                    topNav.classList.add('scrolled');
                } else {
                    topNav.classList.remove('scrolled');
                }
            } else {
                topNav.classList.toggle('scrolled', window.scrollY > 40);
            }
        }

        window.addEventListener('scroll', handleNavBackground, { passive: true });
        handleNavBackground();
    }

    // 2. Mobile Navigation Drawer
    const menuBtn = document.getElementById('mobile-menu-toggle');
    const drawer = document.getElementById('mobile-nav-drawer');
    if (menuBtn && drawer) {
        menuBtn.addEventListener('click', () => {
            const isOpen = drawer.classList.toggle('open');
            menuBtn.textContent = isOpen ? '✕' : '☰';
        });

        drawer.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                drawer.classList.remove('open');
                menuBtn.textContent = '☰';
            });
        });
    }

    // 3. Interactive Weekly Revenue & RPM Calculator
    const milesSlider = document.getElementById('calc-miles');
    const rpmSlider = document.getElementById('calc-rpm');
    const trucksSlider = document.getElementById('calc-trucks');

    if (milesSlider && rpmSlider && trucksSlider) {
        const formatUSD = (num) => '$' + Math.round(num).toLocaleString('en-US');

        function updateCalculator() {
            const miles = parseFloat(milesSlider.value);
            const rpm = parseFloat(rpmSlider.value);
            const trucks = parseInt(trucksSlider.value, 10);

            document.getElementById('val-miles').textContent = `${miles.toLocaleString()} mi`;
            document.getElementById('val-rpm').textContent = `$${rpm.toFixed(2)}`;
            document.getElementById('val-trucks').textContent = `${trucks} ${trucks === 1 ? 'Truck' : 'Trucks'}`;

            const weeklyGross = miles * rpm * trucks;
            const dispatchFee = weeklyGross * 0.05;
            const netToCarrier = weeklyGross - dispatchFee;
            const monthlyEst = netToCarrier * 4.33;

            document.getElementById('res-gross').textContent = formatUSD(weeklyGross);
            document.getElementById('res-fee').textContent = formatUSD(dispatchFee);
            document.getElementById('res-net').textContent = formatUSD(netToCarrier);
            document.getElementById('res-monthly').textContent = formatUSD(monthlyEst);
        }

        milesSlider.addEventListener('input', updateCalculator);
        rpmSlider.addEventListener('input', updateCalculator);
        trucksSlider.addEventListener('input', updateCalculator);
        updateCalculator();
    }

    // 4. Interactive Lanes Region Tab Switcher
    const laneTabs = document.querySelectorAll('.lane-tab');
    const laneContents = document.querySelectorAll('.lane-region-content');

    if (laneTabs.length && laneContents.length) {
        laneTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const targetRegion = tab.getAttribute('data-region');

                laneTabs.forEach(t => t.classList.remove('active'));
                laneContents.forEach(c => c.classList.remove('active'));

                tab.classList.add('active');
                const targetContent = document.getElementById(`lane-${targetRegion}`);
                if (targetContent) {
                    targetContent.classList.add('active');
                    // Quick GSAP stagger animation on region reveal
                    if (typeof gsap !== 'undefined') {
                        gsap.fromTo(targetContent.querySelectorAll('.lane-data-card'),
                            { opacity: 0, y: 12 },
                            { opacity: 1, y: 0, duration: 0.4, stagger: 0.1, ease: 'power2.out' }
                        );
                    }
                }
            });
        });
    }
});

// 5. GSAP Scroll & Live Autonomous Animations
window.addEventListener('load', () => {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
    gsap.registerPlugin(ScrollTrigger);

    setTimeout(() => {
        // A. Clean Upward Reveal on Every Section Heading (Original Gradient Preserved)
        gsap.utils.toArray('.section-title').forEach((title) => {
            title.classList.add('sn-title-reveal');

            gsap.to(title, {
                opacity: 1,
                y: 0,
                duration: 0.85,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: title,
                    start: 'top 88%',
                    toggleActions: 'play none none reverse'
                }
            });
        });

        // B. Section Descriptions Smooth Upward Fade
        gsap.utils.toArray('.section-desc').forEach((desc) => {
            gsap.fromTo(desc,
                { opacity: 0, y: 20 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                    delay: 0.1,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: desc,
                        start: 'top 88%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        });

        // C. Trust Strip Smooth Fade-In
        const trustStrip = document.querySelector('.trust-strip');
        if (trustStrip) {
            gsap.fromTo(trustStrip,
                { opacity: 0.25, filter: 'grayscale(100%)' },
                {
                    opacity: 1,
                    filter: 'grayscale(0%)',
                    ease: 'none',
                    scrollTrigger: {
                        trigger: trustStrip,
                        start: 'top 92%',
                        end: 'top 62%',
                        scrub: 0.5
                    }
                }
            );
        }

        // D. Progressive Staggered Card Reveals (Smooth Lift + Scale)
        ['.services-grid', '.equipment-grid', '.steps-grid'].forEach((selector) => {
            const grid = document.querySelector(selector);
            if (!grid) return;

            const cards = grid.querySelectorAll('.glass-card, .equip-card, .step-card');
            cards.forEach((card) => card.classList.add('sn-gsap-card'));

            gsap.to(cards, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.85,
                stagger: 0.15,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: grid,
                    start: 'top 84%',
                    toggleActions: 'play none none reverse'
                }
            });
        });

        // E. Split Service Command Visual & Onboarding Visual Reveals
        document.querySelectorAll('.services-visual, .fleet-image-wrap').forEach((vis) => {
            vis.classList.add('sn-gsap-card');

            gsap.to(vis, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.95,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: vis,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            });
        });

        // F. Calculator & Onboarding Form Reveal
        document.querySelectorAll('.calc-wrapper, .sn-form-box, .lanes-interactive').forEach((box) => {
            box.classList.add('sn-gsap-card');

            gsap.to(box, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.9,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: box,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            });
        });

        // G. Setup Perks Bullet Points Stagger
        const perks = document.querySelectorAll('.setup-perks li');
        if (perks.length) {
            perks.forEach((li) => li.classList.add('sn-gsap-slide-left'));

            gsap.to(perks, {
                opacity: 1,
                x: 0,
                duration: 0.65,
                stagger: 0.12,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: '.setup-perks',
                    start: 'top 86%',
                    toggleActions: 'play none none reverse'
                }
            });
        }

        // H. LIVE AUTONOMOUS ANIMATIONS (Non-intrusive ambient pulses)
        gsap.to('.pulse-dot, .active-pulse', {
            opacity: 0.4,
            scale: 1.25,
            duration: 1.2,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut'
        });

        gsap.to('.res-val.highlight', {
            textShadow: '0 0 22px rgba(56, 189, 248, 0.65)',
            duration: 1.8,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut'
        });

        ScrollTrigger.refresh(true);
    }, 150);
});

// 6. Seamless AJAX Form Submission (Zero Page Reload)
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('form[action*="fleet-setup"]').forEach((form) => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn ? submitBtn.textContent : 'Submit';
            const formBox = form.closest('.sn-form-box') || form.parentElement;

            // Remove any old alert boxes
            formBox.querySelectorAll('.sn-ajax-alert').forEach((el) => el.remove());

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = 'Sending Request...';
                submitBtn.style.opacity = '0.75';
            }

            try {
                const formData = new FormData(form);
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: formData,
                });

                const data = await response.json();

                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert-success sn-ajax-alert';

                if (response.ok) {
                    alertDiv.textContent = data.message || 'Application received! A senior Supernova dispatcher will call you within 15 minutes.';
                    form.reset();
                } else {
                    alertDiv.style.background = 'rgba(239, 68, 68, 0.15)';
                    alertDiv.style.borderColor = 'rgba(239, 68, 68, 0.45)';
                    alertDiv.style.color = '#FCA5A5';
                    const firstError = data.errors ? Object.values(data.errors)[0][0] : (data.message || 'Please check your details and try again.');
                    alertDiv.textContent = firstError;
                }

                form.parentNode.insertBefore(alertDiv, form);
            } catch (err) {
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert-success sn-ajax-alert';
                alertDiv.style.background = 'rgba(239, 68, 68, 0.15)';
                alertDiv.style.borderColor = 'rgba(239, 68, 68, 0.45)';
                alertDiv.style.color = '#FCA5A5';
                alertDiv.textContent = 'Network error. Please try again in a moment.';
                form.parentNode.insertBefore(alertDiv, form);
            } finally {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                    submitBtn.style.opacity = '1';
                }
            }
        });
    });
});