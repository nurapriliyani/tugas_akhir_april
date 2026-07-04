<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selendang Puan Dharma Ayu — Platform Pengaduan Terpercaya</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --cream: #f7f1e7;
            --cream-dark: #ede5d6;
            --forest: #253320;
            --forest-mid: #3a4f32;
            --forest-light: #5a7a48;
            --sage: #8fa67a;
            --sage-light: #c4d9af;
            --sage-pale: #e8f0df;
            --gold: #c5922a;
            --gold-light: #e8c97a;
            --text-dark: #1e1a13;
            --text-mid: #5a4e3a;
            --text-muted: #9a8a70;
            --white: #ffffff;
            --card-border: rgba(140,120,90,0.15);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--cream);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* ─── TEXTURE OVERLAY ─── */
        body::before {
            content: '';
            position: fixed; inset: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(143,166,122,0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(197,146,42,0.06) 0%, transparent 40%);
            pointer-events: none;
            z-index: 0;
        }

        /* ─── NAV ─── */
        nav {
            position: sticky; top: 0; z-index: 100;
            background: rgba(247,241,231,0.88);
            backdrop-filter: blur(16px) saturate(180%);
            border-bottom: 1px solid rgba(140,120,90,0.12);
            padding: 0 56px; height: 68px;
            display: flex; align-items: center; justify-content: space-between;
            transition: box-shadow 0.3s;
        }
        nav.scrolled {
            box-shadow: 0 2px 24px rgba(37,51,32,0.08);
        }
        .nav-brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .nav-logo {
            width: 38px; height: 38px;
            background: var(--forest);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            color: var(--sage-light);
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            position: relative; overflow: hidden;
        }
        .nav-logo::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, transparent 60%);
        }
        .nav-name {
            font-family: 'Playfair Display', serif;
            font-size: 14px; color: var(--text-dark);
            line-height: 1.3;
        }
        .nav-name small {
            display: block;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 10px; color: var(--text-muted);
            font-weight: 500; letter-spacing: 0.5px;
            font-style: normal;
        }
        .nav-links { display: flex; align-items: center; gap: 4px; }
        .nav-link-ghost {
            font-size: 13px; font-weight: 500; color: var(--text-mid);
            padding: 8px 16px; border-radius: 8px; text-decoration: none;
            transition: all 0.15s;
        }
        .nav-link-ghost:hover { background: rgba(37,51,32,0.06); color: var(--text-dark); }
        .nav-link-solid {
            font-size: 13px; font-weight: 600;
            background: var(--forest); color: var(--sage-light);
            padding: 9px 20px; border-radius: 8px; text-decoration: none;
            transition: all 0.2s;
            position: relative; overflow: hidden;
        }
        .nav-link-solid::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, transparent 60%);
            opacity: 0; transition: opacity 0.2s;
        }
        .nav-link-solid:hover { opacity: 0.88; }
        .nav-link-solid:hover::after { opacity: 1; }

        /* ─── HERO ─── */
        .hero-section {
            max-width: 100%; margin: 0 auto;
            padding: 52px 80px 64px;
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 64px; align-items: center;
            position: relative;
        }
        /* decorative batik-ish ornament */
        .hero-section::before {
            content: '';
            position: absolute;
            right: 80px; top: 64px;
            width: 320px; height: 320px;
            background: radial-gradient(circle, rgba(143,166,122,0.1) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--sage-pale);
            border: 1px solid var(--sage-light);
            border-radius: 24px; padding: 6px 14px;
            font-size: 11px; font-weight: 600; color: #3d5e2c;
            letter-spacing: 0.7px; text-transform: uppercase;
            margin-bottom: 24px;
        }
        .badge-dot {
            width: 6px; height: 6px; background: var(--forest-light);
            border-radius: 50%;
            animation: pulse 2.2s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(1.4); }
        }

        .hero-left h1 {
            font-family: 'Playfair Display', serif;
            font-size: 52px; font-weight: 400;
            color: var(--text-dark); line-height: 1.1;
            letter-spacing: -1.5px; margin-bottom: 20px;
        }
        .hero-left h1 em {
            font-style: italic; color: var(--forest-light);
            position: relative;
        }
        .hero-left h1 em::after {
            content: '';
            position: absolute; left: 0; bottom: -4px;
            width: 100%; height: 2px;
            background: linear-gradient(90deg, var(--sage), transparent);
        }
        .hero-left p {
            font-size: 15.5px; color: var(--text-muted);
            line-height: 1.85; margin-bottom: 36px;
            max-width: 440px;
        }
        .hero-btns { display: flex; gap: 10px; flex-wrap: wrap; }
        .btn-dark {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--forest); color: var(--sage-light);
            font-size: 13.5px; font-weight: 600;
            padding: 13px 24px; border-radius: 9px;
            text-decoration: none;
            transition: all 0.2s;
            box-shadow: 0 4px 16px rgba(37,51,32,0.2);
        }
        .btn-dark:hover {
            background: var(--forest-mid);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(37,51,32,0.28);
        }
        .btn-dark svg { transition: transform 0.2s; }
        .btn-dark:hover svg { transform: translateX(3px); }
        .btn-outline {
            display: inline-flex; align-items: center; gap: 7px;
            background: var(--white); color: var(--text-mid);
            font-size: 13.5px; font-weight: 600;
            padding: 13px 24px; border-radius: 9px;
            border: 1.5px solid var(--card-border);
            text-decoration: none; transition: all 0.2s;
        }
        .btn-outline:hover {
            border-color: var(--sage);
            color: var(--text-dark);
            background: var(--sage-pale);
        }

        /* ─── HERO CARD ─── */
        .hero-visual {
            background: var(--white);
            border-radius: 20px;
            border: 1px solid var(--card-border);
            padding: 28px;
            box-shadow: 0 8px 40px rgba(37,51,32,0.07), 0 1px 4px rgba(37,51,32,0.04);
            position: relative;
        }
        .hero-visual::before {
            content: '';
            position: absolute;
            top: -28px; right: -28px;
            width: 140px; height: 140px;
            background: rgba(143,166,122,0.1);
            border-radius: 50%;
            pointer-events: none;
        }
        .hero-visual::after {
            content: '';
            position: absolute;
            bottom: -16px; left: -16px;
            width: 80px; height: 80px;
            background: rgba(197,146,42,0.07);
            border-radius: 50%;
            pointer-events: none;
        }
        .visual-header {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 20px; padding-bottom: 16px;
            border-bottom: 1px solid rgba(140,120,90,0.1);
        }
        .visual-title {
            font-family: 'Playfair Display', serif;
            font-size: 14.5px; color: var(--text-dark);
        }
        .visual-badge {
            display: flex; align-items: center; gap: 5px;
            font-size: 10px; font-weight: 600;
            background: var(--sage-pale); color: #3d5e2c;
            padding: 4px 10px; border-radius: 12px;
            border: 1px solid var(--sage-light);
        }
        .visual-badge span {
            width: 5px; height: 5px; background: #4a8036;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        .visual-item {
            display: flex; align-items: center; gap: 12px;
            padding: 11px 0;
            border-bottom: 1px solid rgba(140,120,90,0.07);
            transition: background 0.15s;
        }
        .visual-item:last-of-type { border-bottom: none; }
        .vi-dot { width: 9px; height: 9px; border-radius: 50%; flex-shrink: 0; }
        .vi-dot.g { background: var(--forest-light); }
        .vi-dot.c { background: var(--gold); }
        .vi-dot.s { background: #a89e8a; }
        .vi-text { font-size: 13px; color: var(--text-mid); flex: 1; line-height: 1.4; }
        .vi-status {
            font-size: 10.5px; font-weight: 600;
            padding: 3px 10px; border-radius: 10px; white-space: nowrap;
        }
        .vi-status.g { background: var(--sage-pale); color: #3d5e2c; }
        .vi-status.c { background: #fdf0de; color: #a06b1a; }
        .vi-status.s { background: #f4f0ea; color: #8a7a60; }
        .visual-footer {
            margin-top: 18px; padding-top: 14px;
            border-top: 1px solid rgba(140,120,90,0.1);
            display: flex; justify-content: space-between; align-items: center;
        }
        .visual-footer-left { font-size: 11px; color: var(--text-muted); }
        .visual-footer-right {
            font-size: 11px; font-weight: 600;
            color: var(--forest-light);
            display: flex; align-items: center; gap: 4px;
        }

        /* ─── STATS STRIP ─── */
        .stats-strip {
            background: var(--forest);
            padding: 0 56px;
            position: relative; overflow: hidden;
        }
        .stats-strip::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.03) 0%, transparent 60%);
        }
        .stats-inner {
            max-width: 1160px; margin: 0 auto;
            display: grid; grid-template-columns: repeat(4, 1fr);
            border-left: 1px solid rgba(255,255,255,0.06);
        }
        .stat-item {
            padding: 36px 32px;
            border-right: 1px solid rgba(255,255,255,0.06);
            border-top: 1px solid rgba(255,255,255,0.06);
            border-bottom: 1px solid rgba(255,255,255,0.06);
            transition: background 0.2s;
        }
        .stat-item:hover { background: rgba(255,255,255,0.03); }
        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 36px; font-weight: 600;
            color: var(--sage-light);
            line-height: 1; margin-bottom: 6px;
        }
        .stat-number sup {
            font-size: 18px; vertical-align: super;
        }
        .stat-label {
            font-size: 12px; color: rgba(255,255,255,0.35);
            font-weight: 500; line-height: 1.4;
        }

        /* ─── STEPS ─── */
        .steps-section {
            background: var(--forest-mid);
            padding: 88px 56px;
            position: relative; overflow: hidden;
        }
        .steps-section::before {
            content: '';
            position: absolute;
            left: -100px; bottom: -100px;
            width: 400px; height: 400px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.04);
        }
        .steps-section::after {
            content: '';
            position: absolute;
            right: -60px; top: -60px;
            width: 240px; height: 240px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.03);
        }
        .section-head { text-align: center; margin-bottom: 56px; }
        .section-eyebrow {
            display: inline-block;
            font-size: 10.5px; font-weight: 700;
            letter-spacing: 2px; text-transform: uppercase;
            color: var(--sage);
            margin-bottom: 12px;
        }
        .section-head h2 {
            font-family: 'Playfair Display', serif;
            font-size: 34px; font-weight: 400;
            color: #e8e0d0; letter-spacing: -0.5px;
            margin-bottom: 12px;
        }
        .section-head p { font-size: 14px; color: rgba(255,255,255,0.32); line-height: 1.75; }

        .steps-grid {
            max-width: 1160px; margin: 0 auto;
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 2px;
        }
        .step-card {
            background: rgba(255,255,255,0.035);
            border: 1px solid rgba(255,255,255,0.06);
            padding: 32px;
            position: relative; overflow: hidden;
            transition: all 0.25s;
        }
        .step-card:first-child { border-radius: 14px 0 0 14px; }
        .step-card:last-child { border-radius: 0 14px 14px 0; }
        .step-card:hover { background: rgba(255,255,255,0.06); }
        .step-card::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(143,166,122,0.4), transparent);
            opacity: 0; transition: opacity 0.25s;
        }
        .step-card:hover::before { opacity: 1; }
        .step-num {
            width: 42px; height: 42px;
            background: rgba(143,166,122,0.15);
            border: 1px solid rgba(143,166,122,0.25);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 18px; color: var(--sage-light);
            margin-bottom: 18px;
        }
        .step-connector {
            display: none;
        }
        .step-title {
            font-family: 'Playfair Display', serif;
            font-size: 17px; color: #e8e0d0;
            margin-bottom: 10px;
        }
        .step-desc { font-size: 13.5px; color: rgba(255,255,255,0.32); line-height: 1.75; }

        /* ─── WHY ─── */
        .why-section {
            max-width: 1160px; margin: 0 auto;
            padding: 88px 56px;
        }
        .why-section .section-eyebrow { color: var(--forest-light); }
        .why-section .section-head h2 { color: var(--text-dark); }
        .why-section .section-head p { color: var(--text-muted); }

        .why-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }
        .why-card {
            background: var(--white);
            border-radius: 14px;
            border: 1px solid var(--card-border);
            padding: 24px 22px;
            transition: all 0.25s;
            position: relative; overflow: hidden;
        }
        .why-card::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(143,166,122,0.04) 0%, transparent 60%);
            opacity: 0; transition: opacity 0.25s;
        }
        .why-card:hover {
            border-color: var(--sage-light);
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(37,51,32,0.08);
        }
        .why-card:hover::before { opacity: 1; }
        .why-ico {
            width: 44px; height: 44px;
            background: var(--sage-pale);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; margin-bottom: 14px;
        }
        .why-title {
            font-family: 'Playfair Display', serif;
            font-size: 15px; color: var(--text-dark);
            margin-bottom: 8px;
        }
        .why-desc { font-size: 13px; color: var(--text-muted); line-height: 1.75; }

        /* ─── TESTIMONIALS ─── */
        .testimonials-section {
            background: var(--cream-dark);
            border-top: 1px solid rgba(140,120,90,0.12);
            border-bottom: 1px solid rgba(140,120,90,0.12);
            padding: 88px 56px;
        }
        .testimonials-inner { max-width: 1160px; margin: 0 auto; }
        .testimonials-inner .section-eyebrow { color: var(--forest-light); }
        .testimonials-inner .section-head h2 { color: var(--text-dark); }
        .testimonials-inner .section-head p { color: var(--text-muted); }

        .testimonials-grid {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }
        .testi-card {
            background: var(--white);
            border-radius: 14px;
            border: 1px solid var(--card-border);
            padding: 26px 24px;
            transition: all 0.25s;
        }
        .testi-card:hover {
            box-shadow: 0 8px 32px rgba(37,51,32,0.07);
            transform: translateY(-1px);
        }
        .testi-stars {
            display: flex; gap: 3px; margin-bottom: 14px;
        }
        .star {
            color: var(--gold);
            font-size: 13px;
        }
        .testi-text {
            font-size: 13.5px; color: var(--text-mid);
            line-height: 1.8; margin-bottom: 20px;
            font-style: italic;
        }
        .testi-author {
            display: flex; align-items: center; gap: 10px;
        }
        .testi-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: var(--forest);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 13px; color: var(--sage-light);
            flex-shrink: 0;
        }
        .testi-name {
            font-size: 13px; font-weight: 600; color: var(--text-dark);
        }
        .testi-role {
            font-size: 11.5px; color: var(--text-muted);
        }

        /* ─── EMERGENCY BANNER ─── */
        .emergency-banner {
            background: #fff9f0;
            border: 1px solid #f5ddb8;
            max-width: 1160px; margin: 0 auto 0;
            border-radius: 14px;
            padding: 20px 28px;
            display: flex; align-items: center; gap: 16px;
            margin: 0 56px;
        }
        .emergency-icon {
            width: 42px; height: 42px; flex-shrink: 0;
            background: #fef3e2;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
        }
        .emergency-text strong {
            display: block;
            font-size: 13.5px; font-weight: 600;
            color: #8a5a1a; margin-bottom: 2px;
        }
        .emergency-text span {
            font-size: 12.5px; color: #b07a3a;
        }
        .emergency-btn {
            margin-left: auto;
            font-size: 12.5px; font-weight: 600;
            color: #8a5a1a;
            background: #fde8be;
            padding: 8px 18px; border-radius: 8px;
            text-decoration: none;
            border: 1px solid #f5c878;
            white-space: nowrap;
            transition: all 0.15s;
        }
        .emergency-btn:hover {
            background: #fad99a;
        }

        /* ─── FAQ ─── */
        .faq-section {
            max-width: 780px; margin: 0 auto;
            padding: 88px 56px;
        }
        .faq-section .section-eyebrow { color: var(--forest-light); }
        .faq-section .section-head h2 { color: var(--text-dark); }
        .faq-section .section-head p { color: var(--text-muted); }

        .faq-list { display: flex; flex-direction: column; gap: 8px; }
        .faq-item {
            background: var(--white);
            border-radius: 12px;
            border: 1px solid var(--card-border);
            overflow: hidden;
        }
        .faq-question {
            width: 100%;
            display: flex; align-items: center; justify-content: space-between;
            padding: 18px 20px;
            background: none; border: none; cursor: pointer;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px; font-weight: 600;
            color: var(--text-dark);
            text-align: left;
            gap: 12px;
        }
        .faq-question:hover { color: var(--forest-light); }
        .faq-arrow {
            font-size: 16px; color: var(--sage);
            transition: transform 0.25s; flex-shrink: 0;
        }
        .faq-item.open .faq-arrow { transform: rotate(180deg); }
        .faq-answer {
            font-size: 13.5px; color: var(--text-muted);
            line-height: 1.8;
            max-height: 0; overflow: hidden;
            transition: max-height 0.3s ease, padding 0.25s;
            padding: 0 20px;
        }
        .faq-item.open .faq-answer {
            max-height: 200px;
            padding: 0 20px 18px;
        }

        /* ─── CTA ─── */
        .cta-section {
            background: var(--forest);
            padding: 88px 56px;
            text-align: center;
            position: relative; overflow: hidden;
        }
        .cta-section::before {
            content: '';
            position: absolute;
            left: 50%; top: 50%;
            transform: translate(-50%, -50%);
            width: 600px; height: 600px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.04);
        }
        .cta-section::after {
            content: '';
            position: absolute;
            left: 50%; top: 50%;
            transform: translate(-50%, -50%);
            width: 900px; height: 900px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.025);
        }
        .cta-inner { position: relative; z-index: 1; max-width: 560px; margin: 0 auto; }
        .cta-eyebrow {
            display: inline-block;
            font-size: 10.5px; font-weight: 700;
            letter-spacing: 2px; text-transform: uppercase;
            color: var(--sage);
            margin-bottom: 16px;
        }
        .cta-section h2 {
            font-family: 'Playfair Display', serif;
            font-size: 36px; font-weight: 400;
            color: #f0e8d8; letter-spacing: -0.5px;
            margin-bottom: 14px; line-height: 1.2;
        }
        .cta-section p {
            font-size: 15px; color: rgba(255,255,255,0.35);
            margin-bottom: 36px; line-height: 1.75;
        }
        .cta-btns {
            display: flex; gap: 10px;
            justify-content: center; flex-wrap: wrap;
        }
        .btn-light {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--sage-light); color: var(--forest);
            font-size: 13.5px; font-weight: 700;
            padding: 13px 26px; border-radius: 9px;
            text-decoration: none; transition: all 0.2s;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .btn-light:hover {
            background: #d2e6bb;
            transform: translateY(-1px);
            box-shadow: 0 6px 24px rgba(0,0,0,0.28);
        }
        .btn-ghost-white {
            display: inline-flex; align-items: center;
            background: rgba(255,255,255,0.06);
            color: rgba(255,255,255,0.6);
            font-size: 13.5px; font-weight: 600;
            padding: 13px 26px; border-radius: 9px;
            border: 1px solid rgba(255,255,255,0.1);
            text-decoration: none; transition: all 0.2s;
        }
        .btn-ghost-white:hover {
            background: rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.85);
            border-color: rgba(255,255,255,0.18);
        }
        .cta-trust {
            margin-top: 28px;
            display: flex; align-items: center; justify-content: center;
            gap: 20px; flex-wrap: wrap;
        }
        .trust-item {
            display: flex; align-items: center; gap: 6px;
            font-size: 11.5px; color: rgba(255,255,255,0.3);
        }
        .trust-icon { font-size: 14px; }

        /* ─── FOOTER ─── */
        footer {
            background: #1a2117;
            padding: 64px 56px 40px;
        }
        .footer-inner { max-width: 1160px; margin: 0 auto; }
        .footer-top {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 48px;
            margin-bottom: 48px;
            padding-bottom: 48px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .footer-brand .fn {
            font-family: 'Playfair Display', serif;
            font-size: 15px; color: #e8e0d0;
            margin-bottom: 10px;
        }
        .footer-brand .fd {
            font-size: 12.5px; color: rgba(255,255,255,0.28);
            line-height: 1.75; max-width: 220px;
            margin-bottom: 20px;
        }
        .footer-social {
            display: flex; gap: 8px;
        }
        .social-btn {
            width: 32px; height: 32px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            color: rgba(255,255,255,0.35);
            text-decoration: none; font-size: 14px;
            transition: all 0.15s;
        }
        .social-btn:hover {
            background: rgba(143,166,122,0.15);
            border-color: rgba(143,166,122,0.25);
            color: var(--sage-light);
        }
        .footer-col-title {
            font-size: 11px; font-weight: 700;
            letter-spacing: 1.5px; text-transform: uppercase;
            color: rgba(255,255,255,0.25);
            margin-bottom: 16px;
        }
        .footer-links-col {
            display: flex; flex-direction: column; gap: 10px;
        }
        .footer-links-col a {
            font-size: 13px;
            color: rgba(255,255,255,0.38);
            text-decoration: none;
            transition: color 0.15s;
        }
        .footer-links-col a:hover { color: var(--sage-light); }
        .footer-bottom {
            display: flex; align-items: center;
            justify-content: space-between; flex-wrap: wrap; gap: 12px;
        }
        .footer-copy {
            font-size: 11px;
            color: rgba(255,255,255,0.18);
            letter-spacing: 0.5px;
        }
        .footer-bottom-links {
            display: flex; gap: 16px;
        }
        .footer-bottom-links a {
            font-size: 11px; color: rgba(255,255,255,0.22);
            text-decoration: none; transition: color 0.15s;
        }
        .footer-bottom-links a:hover { color: rgba(255,255,255,0.5); }

        /* ─── ANIMATIONS ─── */
        .fade-up {
            opacity: 0; transform: translateY(24px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .fade-up.visible {
            opacity: 1; transform: translateY(0);
        }
        .fade-up:nth-child(2) { transition-delay: 0.1s; }
        .fade-up:nth-child(3) { transition-delay: 0.2s; }
        .fade-up:nth-child(4) { transition-delay: 0.3s; }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 900px) {
            nav { padding: 0 24px; }
            .hero-section { grid-template-columns: 1fr; padding: 48px 24px 48px; gap: 40px; }
            .hero-left h1 { font-size: 38px; }
            .stats-inner { grid-template-columns: repeat(2, 1fr); }
            .steps-section, .testimonials-section, .cta-section { padding: 60px 24px; }
            .steps-grid, .why-grid, .testimonials-grid { grid-template-columns: 1fr; }
            .step-card:first-child { border-radius: 14px 14px 0 0; }
            .step-card:last-child { border-radius: 0 0 14px 14px; }
            .why-section, .faq-section { padding: 60px 24px; }
            footer { padding: 48px 24px 32px; }
            .footer-top { grid-template-columns: 1fr 1fr; }
            .emergency-banner { margin: 0 24px; flex-wrap: wrap; }
            .emergency-btn { margin-left: 0; }
        }
        @media (max-width: 560px) {
            .stats-inner { grid-template-columns: 1fr 1fr; }
            .footer-top { grid-template-columns: 1fr; }
            .hero-left h1 { font-size: 32px; }
        }
        .nav-about-btn {
            cursor: pointer; border: none; background: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* ─── ABOUT MODAL ─── */
        .modal-overlay {
            position: fixed; inset: 0; z-index: 200;
            background: rgba(20,26,17,0.55);
            backdrop-filter: blur(6px);
            display: flex; align-items: center; justify-content: center;
            padding: 24px;
            opacity: 0; pointer-events: none;
            transition: opacity 0.3s;
        }
        .modal-overlay.open {
            opacity: 1; pointer-events: all;
        }
        .modal-box {
            background: var(--cream);
            border-radius: 20px;
            border: 1px solid var(--card-border);
            width: 100%; max-width: 720px;
            max-height: 88vh;
            overflow-y: auto;
            box-shadow: 0 24px 80px rgba(20,26,17,0.25);
            transform: translateY(20px) scale(0.98);
            transition: transform 0.3s;
            position: relative;
        }
        .modal-overlay.open .modal-box {
            transform: translateY(0) scale(1);
        }
        .modal-close {
            position: absolute; top: 20px; right: 20px;
            width: 34px; height: 34px;
            background: rgba(37,51,32,0.07);
            border: none; border-radius: 50%;
            cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            color: var(--text-mid); font-size: 18px;
            transition: all 0.15s;
        }
        .modal-close:hover { background: rgba(37,51,32,0.14); color: var(--text-dark); }
        .modal-header {
            padding: 32px 36px 24px;
            border-bottom: 1px solid var(--card-border);
        }
        .modal-eyebrow {
            font-size: 10.5px; font-weight: 700;
            letter-spacing: 2px; text-transform: uppercase;
            color: var(--forest-light); margin-bottom: 8px;
        }
        .modal-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 28px; font-weight: 400;
            color: var(--text-dark); line-height: 1.2;
            letter-spacing: -0.5px;
        }
        .modal-header p {
            font-size: 14px; color: var(--text-muted);
            line-height: 1.75; margin-top: 8px;
        }
        .modal-body { padding: 28px 36px 36px; }
        .modal-section { margin-bottom: 28px; }
        .modal-section:last-child { margin-bottom: 0; }
        .modal-section-title {
            font-family: 'Playfair Display', serif;
            font-size: 16px; color: var(--text-dark);
            margin-bottom: 10px;
            display: flex; align-items: center; gap: 8px;
        }
        .modal-section-title span {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 18px;
        }
        .modal-section p {
            font-size: 13.5px; color: var(--text-muted);
            line-height: 1.8;
        }
        .modal-pillars {
            display: grid; grid-template-columns: repeat(2, 1fr);
            gap: 10px; margin-top: 4px;
        }
        .modal-pillar {
            background: var(--white);
            border: 1px solid var(--card-border);
            border-radius: 10px; padding: 14px 16px;
        }
        .modal-pillar-ico { font-size: 18px; margin-bottom: 6px; }
        .modal-pillar-title {
            font-family: 'Playfair Display', serif;
            font-size: 13.5px; color: var(--text-dark);
            margin-bottom: 4px;
        }
        .modal-pillar-desc { font-size: 12px; color: var(--text-muted); line-height: 1.6; }
        .modal-contact {
            background: var(--forest);
            border-radius: 12px; padding: 20px 22px;
            display: flex; align-items: center; justify-content: space-between;
            gap: 16px; flex-wrap: wrap;
        }
        .modal-contact-text strong {
            display: block; font-size: 13.5px; font-weight: 600;
            color: var(--sage-light); margin-bottom: 3px;
        }
        .modal-contact-text span {
            font-size: 12.5px; color: rgba(255,255,255,0.38);
        }
        .modal-contact-wa {
            display: inline-flex; align-items: center; gap: 7px;
            background: #25D366; color: #fff;
            font-size: 13px; font-weight: 600;
            padding: 9px 18px; border-radius: 8px;
            text-decoration: none; transition: all 0.15s;
            white-space: nowrap;
        }
        .modal-contact-wa:hover { background: #1ebe5c; }
        .modal-divider {
            height: 1px; background: var(--card-border);
            margin: 20px 0;
        }
        .modal-struktur {
            display: flex; flex-wrap: wrap; gap: 8px;
        }
        .modal-tag {
            font-size: 12px; font-weight: 500;
            background: var(--sage-pale);
            border: 1px solid var(--sage-light);
            color: #3d5e2c;
            padding: 5px 12px; border-radius: 20px;
        }

        @media (max-width: 560px) {
            .modal-box { border-radius: 14px; }
            .modal-header, .modal-body { padding-left: 20px; padding-right: 20px; }
            .modal-pillars { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

{{-- NAV --}}
<nav id="main-nav">
    <a href="/" class="nav-brand">
        <img src="{{ asset('images/logo.JPG') }}" alt="Logo" style="width:38px;height:38px;border-radius:10px;object-fit:cover;">
        <span class="nav-name">
            Selendang Puan
            <small>Dharma Ayu</small>
        </span>
    </a>
    <div class="nav-links">
        <a href="#cara-kerja" class="nav-link-ghost">Cara Kerja</a>
        <a href="#faq" class="nav-link-ghost">FAQ</a>
        <button class="nav-link-ghost nav-about-btn" onclick="openAbout()">Tentang Kami</button>
        <a href="/login" class="nav-link-ghost">Masuk</a>
        <a href="/register" class="nav-link-solid">Buat Laporan</a>
    </div>
</nav>

{{-- ABOUT MODAL --}}
<div class="modal-overlay" id="about-modal" onclick="handleOverlayClick(event)">
    <div class="modal-box">
        <button class="modal-close" onclick="closeAbout()" aria-label="Tutup">✕</button>
        <div class="modal-header">
            <div class="modal-eyebrow">Tentang Komunitas</div>
            <h2>Selendang Puan Dharma Ayu</h2>
            <p>Organisasi masyarakat sipil yang berdedikasi melindungi hak-hak perempuan, anak, dan kelompok rentan di Kabupaten Indramayu, Jawa Barat.</p>
        </div>
        <div class="modal-body">

            <div class="modal-section">
                <div class="modal-section-title"><span>🌱</span> Sejarah Singkat</div>
                <p>Selendang Puan Dharma Ayu berdiri sejak 2018 sebagai respons atas tingginya angka kasus kekerasan terhadap perempuan di Indramayu. Didirikan oleh sekelompok aktivis lokal yang percaya bahwa perubahan dimulai dari dalam komunitas itu sendiri. Nama "Selendang Puan" mengambil simbol selendang — kain yang melindungi dan memeluk — sebagai representasi perlindungan yang kami berikan kepada para pelapor.</p>
            </div>

            <div class="modal-divider"></div>

            <div class="modal-section">
                <div class="modal-section-title"><span>🎯</span> Visi & Misi</div>
                <p style="margin-bottom:10px;"><strong style="color:var(--text-dark);font-size:13px;">Visi:</strong> Mewujudkan Indramayu yang aman, adil, dan bermartabat bagi seluruh lapisan masyarakat tanpa terkecuali.</p>
                <p><strong style="color:var(--text-dark);font-size:13px;">Misi:</strong> Menyediakan platform pengaduan yang aman dan terpercaya, memberikan pendampingan hukum dan psikologis, serta mendorong perubahan kebijakan melalui advokasi berbasis data.</p>
            </div>

            <div class="modal-divider"></div>

            <div class="modal-section">
                <div class="modal-section-title"><span>🏛</span> Pilar Program</div>
                <div class="modal-pillars">
                    <div class="modal-pillar">
                        <div class="modal-pillar-ico">📣</div>
                        <div class="modal-pillar-title">Pengaduan & Pelaporan</div>
                        <div class="modal-pillar-desc">Platform digital aman untuk menerima dan menindaklanjuti laporan kasus kekerasan dan diskriminasi.</div>
                    </div>
                    <div class="modal-pillar">
                        <div class="modal-pillar-ico">⚖️</div>
                        <div class="modal-pillar-title">Pendampingan Hukum</div>
                        <div class="modal-pillar-desc">Akses gratis ke konsultasi dan bantuan hukum melalui jaringan pengacara mitra kami.</div>
                    </div>
                    <div class="modal-pillar">
                        <div class="modal-pillar-ico">🧠</div>
                        <div class="modal-pillar-title">Pemulihan Psikologis</div>
                        <div class="modal-pillar-desc">Layanan konseling dan dukungan psikologis bagi korban yang membutuhkan pendampingan emosional.</div>
                    </div>
                    <div class="modal-pillar">
                        <div class="modal-pillar-ico">📚</div>
                        <div class="modal-pillar-title">Edukasi Komunitas</div>
                        <div class="modal-pillar-desc">Workshop, seminar, dan program literasi hukum untuk meningkatkan kesadaran masyarakat.</div>
                    </div>
                </div>
            </div>

            <div class="modal-divider"></div>

            <div class="modal-section">
                <div class="modal-section-title"><span>👥</span> Jangkauan Wilayah</div>
                <p style="margin-bottom:10px;">Kami aktif melayani masyarakat di seluruh kecamatan Kabupaten Indramayu, dengan titik fokus di:</p>
                <div class="modal-struktur">
                    <span class="modal-tag">Indramayu Kota</span>
                    <span class="modal-tag">Jatibarang</span>
                    <span class="modal-tag">Haurgeulis</span>
                    <span class="modal-tag">Kandanghaur</span>
                    <span class="modal-tag">Losarang</span>
                    <span class="modal-tag">Patrol</span>
                    <span class="modal-tag">Anjatan</span>
                    <span class="modal-tag">Bongas</span>
                    <span class="modal-tag">Krangkeng</span>
                    <span class="modal-tag">Sliyeg</span>
                    <span class="modal-tag">+29 Kecamatan lainnya</span>
                </div>
            </div>

            <div class="modal-divider"></div>

            <div class="modal-contact">
                <div class="modal-contact-text">
                    <strong>Hubungi Tim Kami</strong>
                    <span>Tersedia Senin–Sabtu, 08.00–17.00 WIB</span>
                </div>
                <a href="https://wa.me/6281779080524?text=Halo%20Selendang%20Puan%2C%20saya%20ingin%20bertanya%20mengenai%20komunitas%20ini." target="_blank" rel="noopener" class="modal-contact-wa">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.553 4.116 1.522 5.843L.054 23.215a.75.75 0 00.904.904l5.372-1.468A11.95 11.95 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.97 0-3.81-.538-5.387-1.473l-.386-.228-3.19.871.871-3.19-.228-.386A9.955 9.955 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
                    Chat di WhatsApp
                </a>
            </div>

        </div>
    </div>
</div>

{{-- HERO --}}
<section>
    <div class="hero-section">
        <div class="hero-left">
            <div class="hero-badge">
                <span class="badge-dot"></span>
                Layanan Pengaduan Aktif
            </div>
            <h1>Suaramu Adalah<br><em>Kekuatan Kami.</em></h1>
            <p>Jangan ragu untuk melapor. Yayasan Selendang Puan Dharma Ayu menyediakan wadah aman bagi masyarakat Indramayu untuk menciptakan lingkungan yang adil dan terlindungi.</p>
            <div class="hero-btns">
                <a href="/register" class="btn-dark">
                    Mulai Melapor
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <a href="#cara-kerja" class="btn-outline">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Panduan Keamanan
                </a>
            </div>
        </div>
        <div class="hero-visual">
            <div class="visual-header">
                <span class="visual-title">Status Laporan</span>
                <span class="visual-badge"><span></span> Live</span>
            </div>
            <div class="visual-item">
                <div class="vi-dot g"></div>
                <div class="vi-text">Kekerasan dalam rumah tangga</div>
                <span class="vi-status g">Selesai</span>
            </div>
            <div class="visual-item">
                <div class="vi-dot c"></div>
                <div class="vi-text">Diskriminasi di lingkungan kerja</div>
                <span class="vi-status c">Diproses</span>
            </div>
            <div class="visual-item">
                <div class="vi-dot s"></div>
                <div class="vi-text">Laporan pelecehan fasilitas umum</div>
                <span class="vi-status s">Menunggu</span>
            </div>
            <div class="visual-footer">
                <span class="visual-footer-left">Semua laporan terenkripsi</span>
                <span class="visual-footer-right">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    Aman & Terlindungi
                </span>
            </div>
        </div>
    </div>
</section>

{{-- STATS STRIP --}}
<section class="stats-strip">
    <div class="stats-inner">
        <div class="stat-item">
            <div class="stat-number">1.2<sup>K</sup></div>
            <div class="stat-label">Laporan ditangani<br>sejak 2021</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">97%</div>
            <div class="stat-label">Kasus mendapat<br>tindak lanjut</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">&lt;24<sup>j</sup></div>
            <div class="stat-label">Rata-rata waktu<br>respons tim</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">100%</div>
            <div class="stat-label">Kerahasiaan<br>pelapor terjamin</div>
        </div>
    </div>
</section>

{{-- STEPS --}}
<section class="steps-section" id="cara-kerja">
    <div class="section-head">
        <div class="section-eyebrow">Alur Pelaporan</div>
        <h2>Cara Kerja Pelaporan</h2>
        <p>Laporan Anda diproses dengan kerahasiaan tinggi melalui 3 tahap sederhana.</p>
    </div>
    <div class="steps-grid">
        <div class="step-card fade-up">
            <div class="step-num">1</div>
            <div class="step-title">Tulis Laporan</div>
            <div class="step-desc">Ceritakan kejadian secara detail dan lampirkan bukti jika tersedia. Identitas Anda aman bersama kami. Anda juga dapat melapor secara anonim.</div>
        </div>
        <div class="step-card fade-up">
            <div class="step-num">2</div>
            <div class="step-title">Verifikasi Tim</div>
            <div class="step-desc">Tim kami akan memeriksa kebenaran laporan dalam waktu maksimal 24 jam dan menghubungi Anda jika diperlukan.</div>
        </div>
        <div class="step-card fade-up">
            <div class="step-num">3</div>
            <div class="step-title">Tindak Lanjut</div>
            <div class="step-desc">Laporan diteruskan ke pihak terkait dan Anda dapat memantau perkembangan statusnya secara real-time melalui dashboard.</div>
        </div>
    </div>
</section>

{{-- EMERGENCY BANNER --}}
<div style="padding: 28px 56px 0; position: relative; z-index: 1;">
    <div class="emergency-banner">
        <div class="emergency-icon">🚨</div>
        <div class="emergency-text">
            <strong>Butuh bantuan darurat?</strong>
            <span>Hubungi hotline kami 24/7 — kami selalu siap mendampingi Anda.</span>
        </div>
        <a href="https://wa.me/6281779080524?text=Halo%20Selendang%20Puan%2C%20saya%20butuh%20bantuan%20darurat." class="emergency-btn" target="_blank" rel="noopener">Chat WhatsApp</a>
    </div>
</div>

{{-- WHY --}}
<section class="why-section">
    <div class="section-head">
        <div class="section-eyebrow">Keunggulan Kami</div>
        <h2>Mengapa Selendang Puan?</h2>
        <p class="why-sub" style="font-size:14px;color:var(--text-muted);margin-top:0;">Kami hadir dengan komitmen penuh untuk melindungi setiap laporan dan pelapor.</p>
    </div>
    <div class="why-grid">
        <div class="why-card fade-up">
            <div class="why-ico">🔒</div>
            <div class="why-title">Kerahasiaan Terjamin</div>
            <div class="why-desc">Identitas pelapor sepenuhnya dilindungi. Anda bisa memilih untuk melapor secara anonim tanpa khawatir.</div>
        </div>
        <div class="why-card fade-up">
            <div class="why-ico">🌿</div>
            <div class="why-title">Tim yang Peduli</div>
            <div class="why-desc">Setiap laporan ditangani oleh tim profesional yang berpengalaman dalam pendampingan korban.</div>
        </div>
        <div class="why-card fade-up">
            <div class="why-ico">📊</div>
            <div class="why-title">Transparansi Status</div>
            <div class="why-desc">Pantau perkembangan laporan Anda secara real-time melalui dashboard yang mudah digunakan.</div>
        </div>
        <div class="why-card fade-up">
            <div class="why-ico">⚡</div>
            <div class="why-title">Respons Cepat</div>
            <div class="why-desc">Laporan diproses dalam waktu 24 jam dengan prioritas berdasarkan tingkat urgensi kasus.</div>
        </div>
        <div class="why-card fade-up">
            <div class="why-ico">🤝</div>
            <div class="why-title">Pendampingan Hukum</div>
            <div class="why-desc">Dapatkan akses ke layanan pendampingan hukum gratis melalui jaringan mitra kami.</div>
        </div>
        <div class="why-card fade-up">
            <div class="why-ico">🗓</div>
            <div class="why-title">Agenda Komunitas</div>
            <div class="why-desc">Ikuti program sosialisasi dan workshop pemberdayaan yang kami adakan secara rutin.</div>
        </div>
    </div>
</section>

{{-- TESTIMONIALS --}}
<section class="testimonials-section">
    <div class="testimonials-inner">
        <div class="section-head">
            <div class="section-eyebrow">Suara Mereka</div>
            <h2>Apa Kata Masyarakat</h2>
            <p>Kepercayaan Anda adalah motivasi kami untuk terus bergerak.</p>
        </div>
        <div class="testimonials-grid">
            <div class="testi-card fade-up">
                <div class="testi-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
                <p class="testi-text">"Saya awalnya takut untuk melapor, tapi tim Selendang Puan sangat membantu dan memastikan privasi saya terjaga sepenuhnya."</p>
                <div class="testi-author">
                    <div class="testi-avatar">SR</div>
                    <div>
                        <div class="testi-name">Siti R.</div>
                        <div class="testi-role">Pelapor Anonim, Indramayu</div>
                    </div>
                </div>
            </div>
            <div class="testi-card fade-up">
                <div class="testi-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
                <p class="testi-text">"Prosesnya cepat dan transparan. Saya bisa memantau perkembangan laporan saya setiap saat. Sangat membantu."</p>
                <div class="testi-author">
                    <div class="testi-avatar">BH</div>
                    <div>
                        <div class="testi-name">Budi H.</div>
                        <div class="testi-role">Warga Haurgeulis</div>
                    </div>
                </div>
            </div>
            <div class="testi-card fade-up">
                <div class="testi-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
                <p class="testi-text">"Platform yang benar-benar memihak masyarakat. Respons kurang dari 12 jam dan pendampingan hukum gratis. Luar biasa."</p>
                <div class="testi-author">
                    <div class="testi-avatar">DP</div>
                    <div>
                        <div class="testi-name">Dewi P.</div>
                        <div class="testi-role">Aktivis Perempuan, Jatibarang</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="faq-section" id="faq">
    <div class="section-head">
        <div class="section-eyebrow">Pertanyaan Umum</div>
        <h2>Ada yang Ingin Ditanyakan?</h2>
        <p>Temukan jawaban atas pertanyaan yang paling sering kami terima.</p>
    </div>
    <div class="faq-list">
        <div class="faq-item">
            <button class="faq-question" onclick="toggleFAQ(this)">
                Apakah laporan saya benar-benar anonim?
                <span class="faq-arrow">▾</span>
            </button>
            <div class="faq-answer">Ya. Anda dapat memilih opsi anonim saat membuat laporan. Dalam mode ini, tidak ada data identitas yang disimpan atau disebarluaskan. Tim kami tidak dapat mengidentifikasi Anda kecuali Anda memberikan informasi secara sukarela.</div>
        </div>
        <div class="faq-item">
            <button class="faq-question" onclick="toggleFAQ(this)">
                Berapa lama laporan saya akan diproses?
                <span class="faq-arrow">▾</span>
            </button>
            <div class="faq-answer">Tim kami berkomitmen untuk memverifikasi setiap laporan dalam maksimal 24 jam. Untuk kasus darurat, kami memprioritaskan penanganan dalam 2–6 jam pertama sejak laporan masuk.</div>
        </div>
        <div class="faq-item">
            <button class="faq-question" onclick="toggleFAQ(this)">
                Jenis kasus apa saja yang dapat dilaporkan?
                <span class="faq-arrow">▾</span>
            </button>
            <div class="faq-answer">Kami menerima laporan terkait kekerasan dalam rumah tangga, pelecehan seksual, diskriminasi, kekerasan terhadap anak dan perempuan, serta pelanggaran hak-hak dasar lainnya di wilayah Indramayu dan sekitarnya.</div>
        </div>
        <div class="faq-item">
            <button class="faq-question" onclick="toggleFAQ(this)">
                Apakah layanan pendampingan hukum benar-benar gratis?
                <span class="faq-arrow">▾</span>
            </button>
            <div class="faq-answer">Ya. Melalui jaringan mitra hukum kami, pelapor yang memenuhi syarat dapat mengakses layanan konsultasi dan pendampingan hukum tanpa biaya. Syarat dan ketersediaan dapat bervariasi berdasarkan jenis kasus.</div>
        </div>
        <div class="faq-item">
            <button class="faq-question" onclick="toggleFAQ(this)">
                Bagaimana cara memantau perkembangan laporan?
                <span class="faq-arrow">▾</span>
            </button>
            <div class="faq-answer">Setelah membuat laporan, Anda akan mendapat nomor referensi unik. Masukkan nomor tersebut di halaman "Cek Status" atau login ke akun Anda untuk melihat pembaruan secara real-time di dashboard.</div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="cta-section">
    <div class="cta-inner">
        <div class="cta-eyebrow">Bergabung Bersama Kami</div>
        <h2>Siap untuk Bersuara?</h2>
        <p>Bergabunglah dengan ribuan masyarakat Indramayu yang telah mempercayakan laporan mereka kepada kami.</p>
        <div class="cta-btns">
            <a href="/register" class="btn-light">
                Buat Laporan Sekarang
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
            <a href="/login" class="btn-ghost-white">Sudah Punya Akun</a>
        </div>
        <div class="cta-trust">
            <span class="trust-item"><span class="trust-icon">🔒</span> Laporan Terenkripsi</span>
            <span class="trust-item"><span class="trust-icon">🛡</span> Data Terlindungi</span>
            <span class="trust-item"><span class="trust-icon">⚡</span> Respons 24 Jam</span>
        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer>
    <div class="footer-inner">
        <div class="footer-top">
            <div class="footer-brand">
                <div class="fn">Selendang Puan Dharma Ayu</div>
                <div class="fd">Mewujudkan Indramayu yang aman, adil, dan ramah bagi semua lapisan masyarakat.</div>
                <div class="footer-social">
                    <a href="#" class="social-btn" aria-label="Instagram">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" stroke-width="2"/><circle cx="12" cy="12" r="4" stroke-width="2"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
                    </a>
                    <a href="#" class="social-btn" aria-label="Facebook">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="#" class="social-btn" aria-label="Twitter/X">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                </div>
            </div>
            <div>
                <div class="footer-col-title">Platform</div>
                <div class="footer-links-col">
                    <a href="/register">Buat Laporan</a>
                    <a href="/login">Masuk</a>
                    <a href="#cara-kerja">Cara Kerja</a>
                    <a href="#faq">FAQ</a>
                </div>
            </div>
            <div>
                <div class="footer-col-title">Tentang</div>
                <div class="footer-links-col">
                    <a href="#">Tentang Kami</a>
                    <a href="#">Program</a>
                    <a href="#">Mitra Hukum</a>
                    <a href="#">Blog</a>
                </div>
            </div>
            <div>
                <div class="footer-col-title">Legal</div>
                <div class="footer-links-col">
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">Syarat & Ketentuan</a>
                    <a href="#">Kontak Darurat</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-copy">© 2026 Selendang Puan Dharma Ayu. All Rights Reserved.</div>
            <div class="footer-bottom-links">
                <a href="#">Kebijakan Privasi</a>
                <a href="#">Syarat Penggunaan</a>
            </div>
        </div>
    </div>
</footer>

<script>
    /* About modal */
    function openAbout() {
        document.getElementById('about-modal').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeAbout() {
        document.getElementById('about-modal').classList.remove('open');
        document.body.style.overflow = '';
    }
    function handleOverlayClick(e) {
        if (e.target === document.getElementById('about-modal')) closeAbout();
    }
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeAbout(); });

    /* Sticky nav shadow */
    const nav = document.getElementById('main-nav');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 20);
    });

    /* Scroll reveal */
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                observer.unobserve(e.target);
            }
        });
    }, { threshold: 0.12 });
    document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

    /* FAQ accordion */
    function toggleFAQ(btn) {
        const item = btn.closest('.faq-item');
        const isOpen = item.classList.contains('open');
        document.querySelectorAll('.faq-item.open').forEach(i => i.classList.remove('open'));
        if (!isOpen) item.classList.add('open');
    }
</script>

</body>
</html>