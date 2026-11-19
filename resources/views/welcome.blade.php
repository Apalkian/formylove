<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover, maximum-scale=1.0, user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="For Myra Hazel">
    <meta name="theme-color" content="#B01245">
    <title>For Myra Hazel</title>

    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/icons/icon.svg">
    <link rel="icon" href="/icons/icon.svg" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <meta property="og:title" content="A Little Surprise for Myra Hazel">
    <meta property="og:description" content="From Kian Loui Apal, with love.">
    <meta property="og:type" content="website">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root { --rose:#B01245; --rose-light:#FF6B9D; --rose-deep:#8B0A3A; }
        * { -webkit-tap-highlight-color: transparent; touch-action: manipulation; box-sizing: border-box; }
        html, body { margin:0; padding:0; width:100%; min-height:100%; overflow-x:hidden; font-family:'Poppins',system-ui,sans-serif; background:radial-gradient(ellipse at top,#2b0b1a 0%,#170812 45%,#0a0508 100%); color:#fff; }
        body { position:relative; }

        .hearts-container { position:fixed; inset:0; pointer-events:none; overflow:hidden; z-index:2; }
        .heart { position:absolute; bottom:-12vh; animation:float-up linear infinite; opacity:.85; filter:drop-shadow(0 0 6px rgba(255,107,157,.55)); }
        @keyframes float-up { 0%{transform:translateY(0) translateX(0) rotate(0);opacity:0} 10%{opacity:.9} 90%{opacity:.9} 100%{transform:translateY(-125vh) translateX(var(--drift)) rotate(360deg);opacity:0} }

        .sparkle { position:fixed; width:4px; height:4px; background:radial-gradient(circle,#fff 0%,rgba(255,255,255,0) 70%); border-radius:50%; animation:twinkle 2s ease-in-out infinite; pointer-events:none; z-index:3; }
        @keyframes twinkle { 0%,100%{opacity:0;transform:scale(.3)} 50%{opacity:1;transform:scale(1)} }

        .screen { position:fixed; inset:0; width:100%; min-height:100dvh; height:100dvh; display:none; flex-direction:column; align-items:center; justify-content:flex-start; text-align:center; padding:calc(16px + env(safe-area-inset-top)) 16px calc(24px + env(safe-area-inset-bottom)); z-index:10; overflow-y:auto; overflow-x:hidden; -webkit-overflow-scrolling:touch; }
        .screen.active { display:flex; animation:fade-in .9s ease; }
        #intro.screen { justify-content:center; }
        @keyframes fade-in { from{opacity:0} to{opacity:1} }

        .intro-title { font-family:'Dancing Script',cursive; font-size:clamp(2rem,8.5vw,3.8rem); font-weight:700; margin:0 0 8px; background:linear-gradient(135deg,#fff 0%,#FF6B9D 50%,#fff 100%); background-size:200% auto; -webkit-background-clip:text; background-clip:text; -webkit-text-fill-color:transparent; animation:shimmer 3s linear infinite; }
        @keyframes shimmer { to{background-position:200% center} }
        .intro-sub { font-size:clamp(.9rem,3.4vw,1.1rem); font-weight:300; opacity:.92; margin:0 0 10px; }
        .from-tag { font-size:clamp(.85rem,3vw,1rem); color:#ffb3cc; margin:0 0 28px; font-weight:500; }

        .btn { position:relative; font-family:'Poppins',sans-serif; font-size:clamp(.95rem,3.8vw,1.1rem); font-weight:600; color:#fff; background:linear-gradient(135deg,var(--rose) 0%,var(--rose-light) 100%); border:none; border-radius:999px; padding:14px 30px; cursor:pointer; box-shadow:0 10px 34px rgba(176,18,69,.55); transition:transform .15s ease, box-shadow .2s ease; z-index:20; min-height:48px; }
        .btn:active { transform:scale(.97); box-shadow:0 6px 18px rgba(176,18,69,.7); }
        .btn.secondary { background:rgba(255,255,255,.08); border:1px solid rgba(255,107,157,.45); box-shadow:none; font-weight:500; padding:12px 18px; font-size:clamp(.85rem,3.2vw,.95rem); }

        .card { width:100%; max-width:440px; background:linear-gradient(135deg,rgba(255,255,255,.08) 0%,rgba(255,107,157,.1) 100%); backdrop-filter:blur(10px); -webkit-backdrop-filter:blur(10px); border:1px solid rgba(255,107,157,.38); border-radius:22px; padding:clamp(16px,4.5vw,28px); box-shadow:0 18px 55px rgba(176,18,69,.35); margin:8px auto 12px; overflow:visible; }
        .photo-wrap { width:120px; height:120px; margin:0 auto 10px; border-radius:999px; padding:4px; background:linear-gradient(135deg,var(--rose-light),#ffd1e1); box-shadow:0 10px 30px rgba(176,18,69,.35); }
        .photo-wrap img { width:100%; height:100%; object-fit:cover; border-radius:999px; display:block; border:2px solid rgba(255,255,255,.35); }
        .music-bar { width:100%; max-width:440px; margin:8px auto 4px; display:flex; align-items:center; justify-content:center; gap:10px; position:relative; }
        .music-btn { appearance:none; border:1px solid rgba(255,107,157,.45); background:rgba(255,255,255,.08); color:#fff; border-radius:999px; padding:10px 14px; font:500 .88rem 'Poppins',sans-serif; cursor:pointer; min-height:44px; position:relative; overflow:hidden; z-index:1; }
        .music-btn:active { transform:scale(.98); }
        .music-btn::before { content:''; position:absolute; inset:0; background:radial-gradient(circle at center, rgba(255,107,157,.3) 0%, transparent 70%); transform:scale(0); transition:transform 0.4s ease; z-index:-1; }
        .music-btn.playing::before { transform:scale(3); }
        .music-btn.playing { border-color:#FF8FB3; background:rgba(255,143,179,.15); box-shadow:0 0 24px rgba(255,107,157,.3); }
        .music-hint { font-size:.76rem; opacity:.7; margin:0 0 6px; transition:opacity .3s ease, transform .3s ease; }
        .music-hint.show { opacity:1; transform:translateY(-4px); }

        /* Center slideshow overlay */
        .slideshow { position:fixed; inset:0; background:rgba(10,4,8,.97); display:none; align-items:center; justify-content:center; z-index:70; padding:0; opacity:0; pointer-events:none; transition:opacity .5s ease; }
        .slideshow.show { display:flex; opacity:1; pointer-events:auto; }
        .slideshow::before { content:''; position:absolute; inset:0; background:radial-gradient(ellipse at center, rgba(255,107,157,.08) 0%, transparent 70%); pointer-events:none; animation:slideshow-pulse 4s ease-in-out infinite; }
        @keyframes slideshow-pulse { 0%,100%{opacity:.5} 50%{opacity:1} }
        .slideshow-inner { position:relative; width:100%; max-width:420px; height:auto; aspect-ratio:1/1; display:flex; align-items:center; justify-content:center; perspective:1000px; }
        .slide { position:absolute; inset:0; display:flex; align-items:center; justify-content:center; opacity:0; transform:translateX(100%); transition:opacity .5s cubic-bezier(0.25, 0.46, 0.45, 0.94), transform .5s cubic-bezier(0.25, 0.46, 0.45, 0.94); pointer-events:none; }
        .slide.active { opacity:1; transform:translateX(0); pointer-events:auto; z-index:3; }
        .slide.prev { opacity:1; transform:translateX(-100%); z-index:2; }
        .slide.next { opacity:1; transform:translateX(100%); z-index:2; }
        /* Entrance animation for first slide when slideshow opens */
        .slide.entering-first { opacity:0; transform:scale(0.9) translateY(20px); animation:slide-in-first .6s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
        @keyframes slide-in-first {
            0% { opacity:0; transform:scale(0.9) translateY(20px); }
            100% { opacity:1; transform:scale(1) translateY(0); }
        }
        /* During navigation transition */
        .slide.leaving { opacity:0; transform:translateX(-100%); z-index:1; }
        .slide.entering { opacity:1; transform:translateX(0); z-index:3; }
        .slide img { max-width:90%; max-height:90%; width:auto; height:auto; object-fit:contain; border-radius:24px; box-shadow:0 30px 80px rgba(0,0,0,.6), 0 0 0 1px rgba(255,107,157,.2), 0 0 60px rgba(255,107,157,.08); transition:box-shadow .6s ease, transform .6s ease; transform-origin:center center; }
        .slide.active img { animation:float-gentle 6s ease-in-out infinite; }
        @keyframes float-gentle { 0%,100%{transform:translateY(0) scale(1)} 50%{transform:translateY(-8px) scale(1.01)} }
        .slide-caption { position:absolute; bottom:-50px; left:0; right:0; text-align:center; color:#ffe8f0; font-size:1rem; font-family:'Dancing Script',cursive; opacity:0; transform:translateY(15px); transition:opacity .4s ease .15s, transform .4s ease .15s; text-shadow:0 2px 12px rgba(176,18,69,.4); }
        .slide.active .slide-caption { opacity:1; transform:translateY(0); }
        .slideshow-nav { position:absolute; top:50%; transform:translateY(-50%); background:rgba(255,255,255,.12); border:1px solid rgba(255,107,157,.5); color:#fff; width:56px; height:56px; min-width:56px; min-height:56px; border-radius:999px; display:flex; align-items:center; justify-content:center; font-size:1.6rem; cursor:pointer; transition:all .2s ease; z-index:10; -webkit-tap-highlight-color:transparent; touch-action:manipulation; }
        .slideshow-nav:active { transform:translateY(-50%) scale(1.15); background:rgba(255,107,157,.25); border-color:#FF6B9D; box-shadow:0 0 24px rgba(255,107,157,.4); }
        .slideshow-prev { left:calc(-28px + env(safe-area-inset-left)); }
        .slideshow-next { right:calc(-28px + env(safe-area-inset-right)); }
        .slideshow-close { position:absolute; top:calc(12px + env(safe-area-inset-top)); right:calc(12px + env(safe-area-inset-right)); background:rgba(255,255,255,.1); border:1px solid rgba(255,107,157,.5); color:#fff; border-radius:999px; padding:12px 18px; font:500 .9rem Poppins,sans-serif; cursor:pointer; transition:all .2s ease; min-width:44px; min-height:44px; -webkit-tap-highlight-color:transparent; touch-action:manipulation; z-index:20; }
        .slideshow-close:active { transform:scale(1.1); background:rgba(255,107,157,.2); border-color:#FF6B9D; }
        .slideshow-dots { position:absolute; bottom:calc(-55px + env(safe-area-inset-bottom)); left:50%; transform:translateX(-50%); display:flex; gap:10px; z-index:10; }
        .slideshow-dot { width:12px; height:12px; min-width:12px; min-height:12px; border-radius:999px; background:rgba(255,107,157,.3); border:none; cursor:pointer; transition:all .3s ease; -webkit-tap-highlight-color:transparent; touch-action:manipulation; }
        .slideshow-dot.active { background:#FF6B9D; transform:scale(1.4); box-shadow:0 0 16px rgba(255,107,157,.7); }
        .slideshow-counter { position:absolute; top:calc(12px + env(safe-area-inset-top)); left:calc(12px + env(safe-area-inset-left)); color:rgba(255,232,240,.7); font-size:.85rem; font-family:'Dancing Script',cursive; z-index:20; }

        /* Slideshow particle effects */
        .slideshow-particles { position:absolute; inset:0; pointer-events:none; z-index:5; overflow:hidden; }
        .ss-particle { position:absolute; font-size:18px; animation:ss-float 2.5s ease-out forwards; opacity:0; filter:drop-shadow(0 0 8px rgba(255,107,157,.7)); }
        @keyframes ss-float {
            0% { opacity:0; transform:translateY(0) translateX(0) scale(0.5) rotate(0deg); }
            15% { opacity:1; }
            100% { opacity:0; transform:translateY(var(--dy)) translateX(var(--dx)) scale(1.2) rotate(var(--rot)); }
        }
        .ss-sparkle { position:absolute; width:6px; height:6px; border-radius:50%; background:radial-gradient(circle, #fff 0%, #FF6B9D 50%, transparent 70%); animation:ss-sparkle 1.5s ease-out forwards; opacity:0; }
        @keyframes ss-sparkle {
            0% { opacity:0; transform:scale(0.3); }
            30% { opacity:1; transform:scale(1); }
            100% { opacity:0; transform:scale(0.5) translateY(-30px); }
        }

        @media (max-width:480px) { .slideshow-inner { max-width:calc(100% - 32px); aspect-ratio:1/1; } .slideshow-nav { width:48px; height:48px; min-width:48px; min-height:48px; font-size:1.3rem; } .slideshow-prev { left:calc(8px + env(safe-area-inset-left)); } .slideshow-next { right:calc(8px + env(safe-area-inset-right)); } .slide img { max-width:95%; max-height:95%; } .slideshow-close { padding:10px 14px; font-size:.8rem; } .slide-caption { font-size:.9rem; bottom:-45px; } }
        @media (max-width:360px) { .slideshow-inner { max-width:calc(100% - 24px); } }
        .gallery { width:100%; max-width:440px; margin:12px auto 8px; }
        .gallery-title { font-family:'Dancing Script',cursive; font-size:clamp(1.45rem,5.5vw,1.9rem); color:#FF8FB3; margin:0 0 10px; }
        .gallery-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:8px; }
        .g-item { position:relative; border-radius:14px; overflow:hidden; aspect-ratio:1/1; background:rgba(255,255,255,.06); border:1px solid rgba(255,107,157,.28); cursor:pointer; transform:translateZ(0); transition:transform .18s ease, box-shadow .18s ease, border-color .18s ease; }
        .g-item img { width:100%; height:100%; object-fit:cover; display:block; transition:transform .35s ease, filter .35s ease; }
        .g-item::after { content:""; position:absolute; inset:0; background:linear-gradient(180deg,transparent 35%,rgba(176,18,69,.35)); opacity:0; transition:opacity .2s ease; pointer-events:none; }
        .g-item:active, .g-item.touched { transform:scale(.96); box-shadow:0 0 0 3px rgba(255,107,157,.28), 0 12px 28px rgba(176,18,69,.35); border-color:rgba(255,143,179,.65); }
        .g-item:active img, .g-item.touched img { transform:scale(1.08); filter:saturate(1.1) brightness(1.03); }
        .g-item:active::after, .g-item.touched::after { opacity:1; }

        /* Gallery animation when music plays */
        .gallery-grid { opacity: 1; transition: opacity 0.4s ease; }
        .g-item { opacity: 0; transform: translateY(30px) scale(0.92); transition: opacity 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94), transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94); will-change: opacity, transform; }
        .gallery-animate .g-item { opacity: 1; transform: translateY(0) scale(1); }
        .g-item:nth-child(1)  { transition-delay: 0ms; }
        .g-item:nth-child(2)  { transition-delay: 100ms; }
        .g-item:nth-child(3)  { transition-delay: 200ms; }
        .g-item:nth-child(4)  { transition-delay: 300ms; }
        .g-item:nth-child(5)  { transition-delay: 400ms; }
        .g-item:nth-child(6)  { transition-delay: 500ms; }
        .g-item:nth-child(7)  { transition-delay: 600ms; }
        .g-item:nth-child(8)  { transition-delay: 700ms; }
        .g-item:nth-child(9)  { transition-delay: 800ms; }
        .g-item:nth-child(10) { transition-delay: 900ms; }
        .g-item:nth-child(11) { transition-delay: 1000ms; }
        .g-item:nth-child(12) { transition-delay: 1100ms; }

        .viewer { position:fixed; inset:0; background:rgba(10,4,8,.92); display:none; align-items:center; justify-content:center; z-index:60; padding:16px; }
        .viewer.show { display:flex; animation:fade-in .18s ease; }
        .viewer img { max-width:100%; max-height:78vh; border-radius:18px; box-shadow:0 18px 60px rgba(0,0,0,.5); border:1px solid rgba(255,107,157,.25); }
        .viewer-close { position:absolute; top:calc(10px + env(safe-area-inset-top)); right:12px; border:1px solid rgba(255,107,157,.45); background:rgba(255,255,255,.08); color:#fff; border-radius:999px; padding:10px 14px; font:500 .9rem Poppins,sans-serif; }
        .viewer-cap { position:absolute; bottom:calc(14px + env(safe-area-inset-bottom)); left:50%; transform:translateX(-50%); width:calc(100% - 24px); max-width:440px; text-align:center; color:#ffd8e6; font-size:.92rem; }
        .big-heart-wrap { width:100%; display:flex; align-items:center; justify-content:center; min-height:72px; margin:0 0 4px; }
        .big-heart { display:inline-flex; align-items:center; justify-content:center; font-size:clamp(3rem,16vw,5rem); line-height:1; padding:8px; color:#ff2d55; text-shadow:0 0 22px rgba(255,45,85,.55); animation:heartbeat 1.5s ease-in-out infinite; cursor:pointer; user-select:none; -webkit-user-select:none; font-family:"Apple Color Emoji","Segoe UI Emoji","Noto Color Emoji",sans-serif; }
        .big-heart::before { content:"\2665"; }
        .card h2 { font-family:'Dancing Script',cursive; font-size:clamp(1.55rem,6.2vw,2.4rem); margin:0 0 10px; color:#FF8FB3; }
        .card p { font-size:clamp(.86rem,3.1vw,.98rem); line-height:1.7; margin:0 0 10px; font-weight:300; }
        .signature { font-family:'Dancing Script',cursive; font-size:clamp(1.2rem,4.8vw,1.6rem); margin-top:12px; color:#FF8FB3; }

        .surprise-grid { display:grid; grid-template-columns:1fr 1fr; gap:10px; width:100%; max-width:440px; margin:10px auto 6px; }
        .surprise-btn { background:rgba(255,255,255,.07); border:1px solid rgba(255,107,157,.35); color:#fff; border-radius:16px; padding:12px 10px; font:500 .88rem 'Poppins',sans-serif; min-height:58px; cursor:pointer; transition:transform .12s ease, background .2s; }
        .surprise-btn:active { transform:scale(.98); background:rgba(255,107,157,.18); }

        .message-pop { position:fixed; left:50%; bottom:calc(12px + env(safe-area-inset-bottom)); transform:translateX(-50%) translateY(20px); width:calc(100% - 24px); max-width:440px; background:rgba(30,8,18,.96); border:1px solid rgba(255,107,157,.45); border-radius:18px; padding:14px 16px; box-shadow:0 14px 40px rgba(0,0,0,.45); z-index:50; opacity:0; pointer-events:none; transition:opacity .25s ease, transform .25s ease; text-align:center; font-size:.95rem; line-height:1.5; }
        .message-pop.show { opacity:1; transform:translateX(-50%) translateY(0); pointer-events:auto; }
        .message-pop strong { color:#FF8FB3; }

        @keyframes heartbeat { 0%,100%{transform:scale(1)} 10%,30%{transform:scale(1.08)} 20%,40%{transform:scale(1)} }
        .tap-hint { font-size:.78rem; opacity:.65; margin:0 0 8px; }

        @media (max-width:360px) { .surprise-grid { grid-template-columns:1fr; } .card { padding:14px; } }
    </style>
</head>
<body>
    <div class="hearts-container" id="hearts"></div>
    <div id="sparkles"></div>

    <section class="screen active" id="intro">
        <h1 class="intro-title">For Myra Hazel Gerodiaz</h1>
        <p class="intro-sub">A little surprise made with all my heart</p>
        <p class="from-tag">From Kian Loui Apal</p>
        <button class="btn" id="openBtn">Open Your Surprise</button>
    </section>

    <section class="screen" id="main">
        <div class="card">
            <div class="photo-wrap"><img src="/images/myra.jpg" alt="Myra Hazel" loading="eager"></div>
            <div class="music-bar">
                <button class="music-btn" id="musicBtn" type="button">Play Music</button>
            </div>
            <p class="music-hint" id="musicHint">Tap play for music</p>
            <audio id="bgMusic" preload="none" loop playsinline></audio>
            <div class="big-heart-wrap"><div class="big-heart" id="bigHeart" role="button" aria-label="Tap heart"></div></div>
            <p class="tap-hint">Tap the heart for a surprise</p>
            <h2>My Dearest Myra Hazel</h2>
            <p>I made this little page just for you. You make ordinary moments feel special, and I am grateful for you more than words can say.</p>
            <p>Whenever you open this, I hope it reminds you that you are loved, appreciated, and always on my mind.</p>
            <p class="signature">With love, Kian Loui Apal</p>
        </div>

        <div class="surprise-grid" aria-label="Sweet surprises">
            <button class="surprise-btn" data-msg="You have the kind of smile that can make my whole day better.">Tap for a smile</button>
            <button class="surprise-btn" data-msg="If I could give you one thing, it would be the ability to see yourself through my eyes.">Tap for a truth</button>
            <button class="surprise-btn" data-msg="Thank you for being you, Myra Hazel. You are truly special to me.">Tap for thanks</button>
            <button class="surprise-btn" data-msg="No matter where life goes, I hope you always remember how loved you are.">Tap for a promise</button>
        </div>

        <div class="gallery" aria-label="Gallery" id="gallerySection" style="display:none;">
            <h3 class="gallery-title">Myra Hazel Gallery</h3>
            <div class="gallery-grid">
                <div class="g-item"><img src="/images/gallery-1.jpg" alt="Myra Hazel" loading="lazy"></div>
                <div class="g-item"><img src="/images/gallery-2.jpg" alt="Myra Hazel" loading="lazy"></div>
                <div class="g-item"><img src="/images/gallery-3.jpg" alt="Myra Hazel" loading="lazy"></div>
                <div class="g-item"><img src="/images/gallery-4.jpg" alt="Myra Hazel" loading="lazy"></div>
                <div class="g-item"><img src="/images/gallery-5.jpg" alt="Myra Hazel" loading="lazy"></div>
                <div class="g-item"><img src="/images/gallery-6.jpg" alt="Myra Hazel" loading="lazy"></div>
                <div class="g-item"><img src="/images/gallery-7.jpg" alt="Myra Hazel" loading="lazy"></div>
                <div class="g-item"><img src="/images/gallery-8.jpg" alt="Myra Hazel" loading="lazy"></div>
                <div class="g-item"><img src="/images/gallery-9.jpg" alt="Myra Hazel" loading="lazy"></div>
            </div>
        </div>

        <div class="slideshow" id="slideshow" aria-hidden="true" role="dialog" aria-label="Myra Hazel Photos">
            <div class="slideshow-particles" id="ssParticles"></div>
            <button class="slideshow-close" id="ssClose" type="button">Close</button>
            <button class="slideshow-nav slideshow-prev" id="ssPrev" type="button" aria-label="Previous">‹</button>
            <button class="slideshow-nav slideshow-next" id="ssNext" type="button" aria-label="Next">›</button>
            <div class="slideshow-inner" id="slideshowInner"></div>
            <div class="slideshow-dots" id="slideshowDots"></div>
            <div class="slideshow-counter" id="ssCounter">1 / 9</div>
        </div>

        <button class="btn secondary" id="anotherBtn" style="margin-top:8px;">Another sweet message</button>
        <button class="btn secondary" id="stayBtn" style="margin-top:8px; opacity:.85;">No going back, just love</button>
    </section>

    <div class="viewer" id="viewer" aria-hidden="true">
        <button class="viewer-close" id="viewerClose" type="button">Close</button>
        <img id="viewerImg" alt="Myra Hazel">
        <div class="viewer-cap" id="viewerCap">Myra Hazel, you are beautiful.</div>
    </div>

    <div class="message-pop" id="pop" role="status" aria-live="polite"></div>

    <script>
        (function () {
            var messages = [
                'Myra Hazel, you are one of the best parts of my day.',
                'I feel lucky to know someone as wonderful as you.',
                'You deserve happiness, peace, and so much love.',
                'Every time I think of you, my heart feels lighter.',
                'You are beautiful in ways that go far beyond what eyes can see.',
                'I hope this message makes you smile right now.'
            ];
            var heartMessages = [
                'Sending you a big hug and all my love.',
                'You mean so much to me, Myra Hazel.',
                'This heart beats a little happier because of you.',
                'You are loved today and always.'
            ];

            function createHearts() {
                var c = document.getElementById('hearts');
                var items = ['❤', '♥', '♡'];
                var count = window.innerWidth < 480 ? 12 : 18;
                for (var i = 0; i < count; i++) {
                    var h = document.createElement('div');
                    h.className = 'heart';
                    h.textContent = items[Math.floor(Math.random() * items.length)];
                    h.style.left = Math.random() * 100 + 'vw';
                    h.style.animationDuration = (9 + Math.random() * 10) + 's';
                    h.style.animationDelay = (Math.random() * 6) + 's';
                    h.style.fontSize = (14 + Math.random() * 14) + 'px';
                    h.style.setProperty('--drift', (Math.random() * 80 - 40) + 'px');
                    c.appendChild(h);
                }
            }
            function createSparkles() {
                var c = document.getElementById('sparkles');
                var count = window.innerWidth < 480 ? 18 : 28;
                for (var i = 0; i < count; i++) {
                    var s = document.createElement('div');
                    s.className = 'sparkle';
                    s.style.left = Math.random() * 100 + 'vw';
                    s.style.top = Math.random() * 100 + 'vh';
                    s.style.animationDelay = (Math.random() * 2) + 's';
                    c.appendChild(s);
                }
            }

            var pop = document.getElementById('pop');
            var popTimer;
            function showPop(text) {
                pop.innerHTML = '<strong>For you:</strong> ' + text;
                pop.classList.add('show');
                clearTimeout(popTimer);
                popTimer = setTimeout(function () { pop.classList.remove('show'); }, 3200);
            }
            pop.addEventListener('click', function () { pop.classList.remove('show'); });

            document.getElementById('openBtn').addEventListener('click', function () {
                document.getElementById('intro').classList.remove('active');
                try { history.pushState({ page: 'surprise' }, '', '#surprise'); history.pushState({ page: 'lock' }, '', '#surprise'); } catch (e) {}
                setTimeout(function () {
                    document.getElementById('main').classList.add('active');
                    showPop('Hi Myra Hazel. This surprise is from Kian Loui Apal.');
                }, 350);
            });
            window.addEventListener('popstate', function () {
                if (document.getElementById('main').classList.contains('active')) {
                    try { history.pushState({ page: 'lock' }, '', '#surprise'); } catch (e) {}
                }
            });

            document.getElementById('bigHeart').addEventListener('click', function () {
                showPop(heartMessages[Math.floor(Math.random() * heartMessages.length)]);
                this.style.transform = 'scale(1.15)';
                var el = this;
                setTimeout(function () { el.style.transform = ''; }, 180);
            });

            var btns = document.querySelectorAll('.surprise-btn');
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener('click', function () {
                    showPop(this.getAttribute('data-msg'));
                });
            }
            document.getElementById('anotherBtn').addEventListener('click', function () {
                showPop(messages[Math.floor(Math.random() * messages.length)]);
            });
            document.getElementById('stayBtn').addEventListener('click', function () {
                showPop('You are right where you should be, Myra Hazel. This page is all for you.');
            });

            var music = document.getElementById('bgMusic');
            var musicBtn = document.getElementById('musicBtn');
            var musicHint = document.getElementById('musicHint');
            function musicStatus(msg) { if (musicHint) musicHint.textContent = msg; }
            function setMusicSrc() {
                if (!music) return;
                // Use the file currently in public/audio (song.mp3)
                music.src = '/audio/song.mp3';
                music.loop = true;
            }
            if (musicBtn && music) {
                setMusicSrc();
                music.addEventListener('loadedmetadata', function () { musicStatus('Ready. Tap play for music.'); });
                music.addEventListener('playing', function () { musicBtn.textContent = 'Pause Music'; musicStatus('Music is playing.'); });
                music.addEventListener('pause', function () { musicBtn.textContent = 'Play Music'; if (!music.ended) musicStatus('Paused. Tap play for music.'); });
                music.addEventListener('ended', function () { music.currentTime = 0; music.play().catch(function(){}); });
                music.addEventListener('error', function () {
                    var err = music.error;
                    var code = err ? err.code : 0;
                    musicStatus('Could not play audio (code ' + code + '). Try another MP3 file.');
                    musicBtn.textContent = 'Play Music';
                    showPop('Audio error. File may be unsupported; try replacing public/audio/song.mp3 with a standard MP3.');
                });
                musicBtn.addEventListener('click', function () {
                    if (!music.src) setMusicSrc();
                    if (music.paused) {
                        musicStatus('Starting...');
                        musicHint.classList.add('show');
                        try { music.currentTime = 0; } catch(e){}
                        var playPromise = music.play();
                        if (playPromise && playPromise.catch) {
                            playPromise.catch(function (e) {
                                musicBtn.textContent = 'Play Music';
                                musicBtn.classList.remove('playing');
                                musicStatus('Tap again to allow music.');
                                musicHint.classList.remove('show');
                                showPop('Playback blocked or failed: ' + (e && e.name ? e.name : 'unknown'));
                            });
                        }
                    } else {
                        music.pause();
                        musicBtn.classList.remove('playing');
                        musicHint.classList.remove('show');
                    }
                });
                // Animate gallery when music starts playing
                music.addEventListener('playing', function () {
                    musicBtn.textContent = 'Pause Music';
                    musicBtn.classList.add('playing');
                    musicHint.classList.add('show');
                    openSlideshow();
                    showPop('Your photos dancing to the music...');
                });
                music.addEventListener('pause', function () {
                    musicBtn.textContent = 'Play Music';
                    musicBtn.classList.remove('playing');
                    musicHint.classList.remove('show');
                });
                music.addEventListener('ended', function () {
                    music.currentTime = 0;
                    music.play().catch(function(){});
                });
            }

            var caps = [
                'Myra Hazel, your smile is my favorite view.',
                'Every photo of you is a beautiful memory.',
                'You shine in every moment.',
                'Simply stunning, Myra Hazel.',
                'A little reminder of how special you are.'
            ];
            var items = document.querySelectorAll('.g-item');
            var viewer = document.getElementById('viewer');
            var viewerImg = document.getElementById('viewerImg');
            var viewerCap = document.getElementById('viewerCap');
            var viewerClose = document.getElementById('viewerClose');
            function openViewer(src) {
                viewerImg.src = src;
                viewerCap.textContent = caps[Math.floor(Math.random() * caps.length)];
                viewer.classList.add('show');
                viewer.setAttribute('aria-hidden', 'false');
                showPop('A beautiful moment of Myra Hazel.');
            }
            function closeViewer() {
                viewer.classList.remove('show');
                viewer.setAttribute('aria-hidden', 'true');
            }
            for (var gi = 0; gi < items.length; gi++) {
                (function (item) {
                    var img = item.querySelector('img');
                    item.addEventListener('touchstart', function () { item.classList.add('touched'); }, { passive: true });
                    item.addEventListener('touchend', function () { setTimeout(function(){ item.classList.remove('touched'); }, 180); }, { passive: true });
                    item.addEventListener('touchcancel', function () { item.classList.remove('touched'); }, { passive: true });
                    item.addEventListener('click', function () { if (img) openViewer(img.src); });
                })(items[gi]);
            }
            if (viewerClose) viewerClose.addEventListener('click', closeViewer);
            if (viewer) viewer.addEventListener('click', function (e) { if (e.target === viewer) closeViewer(); });

            // Slideshow
            var galleryImages = [
                '/images/gallery-1.jpg',
                '/images/gallery-2.jpg',
                '/images/gallery-3.jpg',
                '/images/gallery-4.jpg',
                '/images/gallery-5.jpg',
                '/images/gallery-6.jpg',
                '/images/gallery-7.jpg',
                '/images/gallery-8.jpg',
                '/images/gallery-9.jpg'
            ];
            var slideshow = document.getElementById('slideshow');
            var ssInner = document.getElementById('slideshowInner');
            var ssDots = document.getElementById('slideshowDots');
            var ssPrev = document.getElementById('ssPrev');
            var ssNext = document.getElementById('ssNext');
            var ssClose = document.getElementById('ssClose');
            var ssIndex = 0;
            var ssAutoTimer = null;
            function buildSlideshow() {
                ssInner.innerHTML = '';
                ssDots.innerHTML = '';
                for (var si = 0; si < galleryImages.length; si++) {
                    var slide = document.createElement('div');
                    slide.className = 'slide' + (si === 0 ? ' active' : '');
                    slide.innerHTML = '<img src="' + galleryImages[si] + '" alt="Myra Hazel" loading="lazy"><div class="slide-caption">' + (caps[si % caps.length]) + '</div>';
                    ssInner.appendChild(slide);
                    var dot = document.createElement('button');
                    dot.className = 'slideshow-dot' + (si === 0 ? ' active' : '');
                    dot.setAttribute('aria-label', 'Photo ' + (si + 1));
                    dot.addEventListener('click', function (idx) { return function () { goToSlide(idx); }; }(si));
                    ssDots.appendChild(dot);
                }
            }
            function spawnSlideParticles(count) {
                var container = document.getElementById('ssParticles');
                if (!container) return;
                var hearts = ['❤', '♥', '♡', '💕', '💖', '💗', '💘', '✨', '❣️', '💓'];
                for (var p = 0; p < count; p++) {
                    var el = document.createElement('span');
                    el.className = 'ss-particle';
                    el.textContent = hearts[Math.floor(Math.random() * hearts.length)];
                    var startX = 50 + (Math.random() - 0.5) * 40;
                    var startY = 50 + (Math.random() - 0.5) * 40;
                    el.style.left = startX + '%';
                    el.style.top = startY + '%';
                    el.style.fontSize = (14 + Math.random() * 10) + 'px';
                    var dx = (Math.random() - 0.5) * 120;
                    var dy = -60 - Math.random() * 80;
                    var rot = (Math.random() - 0.5) * 720;
                    el.style.setProperty('--dx', dx + 'px');
                    el.style.setProperty('--dy', dy + 'px');
                    el.style.setProperty('--rot', rot + 'deg');
                    container.appendChild(el);
                    setTimeout(function (node) { if (node.parentNode) node.parentNode.removeChild(node); }, 3000, el);
                }
                // Sparkles
                for (var s = 0; s < count / 2; s++) {
                    var sp = document.createElement('span');
                    sp.className = 'ss-sparkle';
                    sp.style.left = (50 + (Math.random() - 0.5) * 60) + '%';
                    sp.style.top = (50 + (Math.random() - 0.5) * 60) + '%';
                    sp.style.animationDelay = (Math.random() * 0.5) + 's';
                    container.appendChild(sp);
                    setTimeout(function (node) { if (node.parentNode) node.parentNode.removeChild(node); }, 2000, sp);
                }
            }
function goToSlide(idx) {
                var slides = ssInner.querySelectorAll('.slide');
                var dots = ssDots.querySelectorAll('.slideshow-dot');
                var oldIndex = ssIndex;
                var newIndex = (idx + slides.length) % slides.length;
                
                // Clear all transition classes first
                for (var s = 0; s < slides.length; s++) {
                    slides[s].classList.remove('active', 'prev', 'next', 'leaving', 'entering');
                }
                
                if (slides[oldIndex]) {
                    // Old slide moves out
                    if (newIndex > oldIndex || (oldIndex === slides.length - 1 && newIndex === 0)) {
                        slides[oldIndex].classList.add('leaving');
                    } else {
                        slides[oldIndex].classList.add('leaving');
                    }
                }
                
                ssIndex = newIndex;
                
                // New slide comes in
                if (slides[ssIndex]) slides[ssIndex].classList.add('active');
                
                // Pre-position adjacent slides
                var prevIdx = (ssIndex - 1 + slides.length) % slides.length;
                var nextIdx = (ssIndex + 1) % slides.length;
                if (slides[prevIdx] && prevIdx !== oldIndex) slides[prevIdx].classList.add('prev');
                if (slides[nextIdx] && nextIdx !== oldIndex) slides[nextIdx].classList.add('next');
                
                if (dots[oldIndex]) dots[oldIndex].classList.remove('active');
                if (dots[ssIndex]) dots[ssIndex].classList.add('active');
                
                var counter = document.getElementById('ssCounter');
                if (counter) counter.textContent = (ssIndex + 1) + ' / ' + slides.length;
                
                spawnSlideParticles(8);
            }
            function nextSlide() { goToSlide(ssIndex + 1); stopAutoAdvance(); startAutoAdvance(); }
            function prevSlide() { goToSlide(ssIndex - 1); stopAutoAdvance(); startAutoAdvance(); }
            function startAutoAdvance() { stopAutoAdvance(); ssAutoTimer = setInterval(nextSlide, 4000); }
            function stopAutoAdvance() { if (ssAutoTimer) { clearInterval(ssAutoTimer); ssAutoTimer = null; } }
            function openSlideshow() {
                buildSlideshow();
                ssIndex = 0;
                // Show first slide with entrance animation
                var slides = ssInner.querySelectorAll('.slide');
                if (slides[0]) slides[0].classList.add('entering-first');
                // Set up prev/next
                var len = slides.length;
                if (slides[len - 1]) slides[len - 1].classList.add('prev');
                if (slides[1]) slides[1].classList.add('next');
                
                var dots = ssDots.querySelectorAll('.slideshow-dot');
                if (dots[0]) dots[0].classList.add('active');
                
                var counter = document.getElementById('ssCounter');
                if (counter) counter.textContent = '1 / ' + len;
                
                slideshow.classList.add('show');
                slideshow.setAttribute('aria-hidden', 'false');
                startAutoAdvance();
                // Big entrance burst
                setTimeout(function () { spawnSlideParticles(18); }, 200);
                
                // After entrance animation, switch to normal active class
                setTimeout(function () {
                    if (slides[0]) {
                        slides[0].classList.remove('entering-first');
                        slides[0].classList.add('active');
                    }
                }, 600);
            }
            function closeSlideshow() {
                slideshow.classList.remove('show');
                slideshow.setAttribute('aria-hidden', 'true');
                stopAutoAdvance();
                // Show gallery after slideshow closes
                var gallery = document.getElementById('gallerySection');
                if (gallery && gallery.style.display === 'none') {
                    gallery.style.display = 'block';
                    // Animate gallery items in
                    setTimeout(function () { gallery.classList.add('gallery-animate'); }, 50);
                    showPop('All Myra Hazel memories...');
                }
            }
            if (ssPrev) ssPrev.addEventListener('click', function (e) { e.stopPropagation(); prevSlide(); });
            if (ssNext) ssNext.addEventListener('click', function (e) { e.stopPropagation(); nextSlide(); });
            if (ssClose) ssClose.addEventListener('click', closeSlideshow);
            if (slideshow) slideshow.addEventListener('click', function (e) { if (e.target === slideshow) closeSlideshow(); });
            // Swipe support
            var touchStartX = 0, touchStartY = 0;
            if (slideshow) {
                slideshow.addEventListener('touchstart', function (e) { touchStartX = e.touches[0].clientX; touchStartY = e.touches[0].clientY; }, { passive: true });
                slideshow.addEventListener('touchend', function (e) {
                    var dx = e.changedTouches[0].clientX - touchStartX;
                    var dy = e.changedTouches[0].clientY - touchStartY;
                    if (Math.abs(dx) > Math.abs(dy) && Math.abs(dx) > 50) {
                        if (dx < 0) nextSlide(); else prevSlide();
                    }
                }, { passive: true });
            }
            document.addEventListener('keydown', function (e) {
                if (!slideshow.classList.contains('show')) return;
                if (e.key === 'ArrowRight') { prevSlide(); }
                else if (e.key === 'ArrowLeft') { nextSlide(); }
                else if (e.key === 'Escape') closeSlideshow();
            });

            createHearts();
            createSparkles();
        })();
    </script>
</body>
</html>
