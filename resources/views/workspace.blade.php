<!DOCTYPE html>
<html lang="th">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Workspace | เขียนดี</title>@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body class="workspace-page">
    <header class="workspace-header shell"><a class="brand" href="{{ url('/') }}"><span class="brand-mark">ข</span> เขียนดี</a><span class="workspace-status"><i></i> บันทึกในเบราว์เซอร์นี้</span><a class="text-link" href="{{ url('/') }}">กลับหน้าแรก</a></header>
    <main class="workspace-shell shell">
        <aside class="workspace-sidebar"><p class="eyebrow">เริ่มต้นบทความ</p><h1>เล่าเรื่องที่<br>อยากเล่า</h1><label for="article-type">ประเภทบทความ</label><select id="article-type"><option value="การทำงาน">การทำงาน</option><option value="ความรัก">ความรัก</option><option value="การต่อสู้ชีวิต">การต่อสู้ชีวิต</option><option value="การดำรงชีวิต">การดำรงชีวิต</option><option value="นิยาย">นิยาย</option><option value="หนังสือพิมพ์">หนังสือพิมพ์</option><option value="การศึกษา">การศึกษา</option><option value="เทคโนโลยี">เทคโนโลยี</option><option value="สุขภาพ">สุขภาพ</option><option value="ธุรกิจ">ธุรกิจ</option></select><label for="article-idea">หัวข้อหรือแนวคิด</label><textarea id="article-idea" placeholder="เช่น ความสัมพันธ์ที่เริ่มห่างกัน..."></textarea><button class="button button-primary workspace-button" id="quick-ai-write" type="button" style="margin: 8px 0 16px 0; background: linear-gradient(135deg, #7a5af8, #6941e8); color: white; font-weight: bold; font-size: 0.95rem; box-shadow: 0 4px 12px rgba(122,90,248,0.3); border: none; cursor: pointer; padding: 10px 14px; border-radius: 8px; width: 100%;">✨ ให้ AI เริ่มเขียนบทความทันที</button><label for="article-keywords">Keyword</label><input id="article-keywords" type="text" placeholder="เช่น ความเข้าใจ, การเติบโต"><label for="article-audience">กลุ่มผู้อ่าน</label><input id="article-audience" type="text" placeholder="เช่น คนทำงานวัยเริ่มต้น"><label for="article-tone">Tone</label><select id="article-tone"><option>เป็นกันเอง</option><option>มืออาชีพ</option><option>อบอุ่น</option><option>สร้างแรงบันดาลใจ</option></select><label for="article-length">ความยาว</label><select id="article-length"><option>สั้น</option><option selected>ปานกลาง</option><option>ยาว</option></select><button class="button button-primary workspace-button" id="new-article" type="button">บทความใหม่ <span>＋</span></button><p class="workspace-hint">ข้อมูลจะถูกเก็บไว้ในเบราว์เซอร์นี้โดยไม่ต้อง Login</p></aside>
        <section class="editor-area"><div class="editor-toolbar"><span id="draft-label">ร่างใหม่</span><span class="save-state"><i></i> บันทึกอัตโนมัติ</span></div><input id="article-title" class="title-input" type="text" placeholder="ตั้งชื่อบทความของคุณ"><button type="button" id="editor-ai-write" class="tool-button" style="margin: 0 0 12px 0; background: #efeaff; color: #6941e8; border: 1px solid #d0c2ff; font-weight: bold; padding: 8px 14px; border-radius: 6px; cursor: pointer;">✨ พิมพ์ชื่อหรือแนวคิดแล้ว กดให้ AI เริ่มเขียนบทความทันที</button><div id="editor-content" class="editor-content" contenteditable="true" aria-label="พื้นที่เขียนบทความ"><p>เริ่มเขียนตรงนี้...</p><p class="editor-placeholder">หรือให้ AI ช่วยสร้างโครงร่างจากแนวคิดของคุณ</p></div><div class="editor-footer"><span id="word-count">0 คำ</span><div><button class="tool-button" id="preview-article" type="button">ดูตัวอย่าง</button><button class="tool-button" id="public-article" type="button" style="margin-left: 6px; background: #efeaff; color: #6941e8; border-color: #d0c2ff;">เปิดหน้าอ่านบทความ (Public)</button><button class="tool-button" id="export-pdf-article" type="button" style="margin-left: 6px; background: #fef2f2; color: #dc2626; border-color: #fca5a5;">📄 PDF</button><button class="tool-button" id="export-word-article" type="button" style="margin-left: 6px; background: #eff6ff; color: #2563eb; border-color: #93c5fd;">📝 Word</button><button class="button button-dark" id="save-article" type="button" style="margin-left: 6px;">บันทึกฉบับร่าง</button></div></div>
        
        <!-- Articles Table Section (Moved below creation form) -->
        <div class="articles-table-card" style="background: #ffffff; border-radius: 16px; padding: 24px; margin-top: 32px; border: 1px solid #e2e8f0; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="margin: 0; font-size: 1.2rem; font-weight: 700; color: #1e293b; display: flex; align-items: center; gap: 8px;">
                    <span style="background: #efeaff; color: #6941e8; width: 32px; height: 32px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; font-size: 1rem;">📚</span> 
                    บทความของฉัน (My Articles)
                </h3>
                <button class="button button-primary" id="table-new-article" type="button" style="padding: 8px 16px; font-size: 0.88rem; border-radius: 8px; background: #0f172a; color: white; border: none; cursor: pointer; font-weight: 600;">＋ สร้างบทความใหม่</button>
            </div>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.92rem;">
                    <thead>
                        <tr style="border-bottom: 2px solid #f1f5f9; background: #f8fafc; color: #475569;">
                            <th style="padding: 12px 16px; border-top-left-radius: 8px;">#</th>
                            <th style="padding: 12px 16px;">ชื่อบทความ</th>
                            <th style="padding: 12px 16px;">หมวดหมู่</th>
                            <th style="padding: 12px 16px;">แก้ไขล่าสุด</th>
                            <th style="padding: 12px 16px;">สถานะ</th>
                            <th style="padding: 12px 16px; text-align: right; border-top-right-radius: 8px;">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody id="article-table-body">
                        <tr>
                            <td colspan="6" style="padding: 24px; text-align: center; color: #94a3b8;">กำลังโหลดรายการบทความ...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </section>
        <aside class="ai-sidebar"><p class="eyebrow">ผู้ช่วย AI</p><h2>ให้ไอเดีย<br>เดินหน้าต่อ</h2><p class="workspace-hint">เลือกเครื่องมือเพื่อเริ่มพัฒนาบทความของคุณ</p><div class="ai-tools"><button type="button" data-ai-action="title">สร้างชื่อเรื่อง ✦</button><button type="button" data-ai-action="outline">สร้าง Outline ✦</button><button type="button" data-ai-action="write">เขียนบทความ ✦</button><button type="button" data-ai-action="continue">เขียนต่อ ✦</button><button type="button" data-ai-action="summarize">สรุปเนื้อหา ✦</button><button type="button" data-ai-action="rewrite">ปรับภาษา ✦</button></div><div id="ai-message" class="ai-message" hidden></div></aside>
    </main>
    <script>
        const apiBase = '{{ url('/api') }}';
        const sessionKey = 'bloger-session-id';
        const sessionId = localStorage.getItem(sessionKey) || crypto.randomUUID();
        localStorage.setItem(sessionKey, sessionId);
        let currentArticleId = null;
        let currentArticleSlug = null;
        const fields = { type: document.querySelector('#article-type'), idea: document.querySelector('#article-idea'), keywords: document.querySelector('#article-keywords'), audience: document.querySelector('#article-audience'), tone: document.querySelector('#article-tone'), length: document.querySelector('#article-length'), title: document.querySelector('#article-title'), content: document.querySelector('#editor-content') };
        const request = (path, options = {}) => fetch(apiBase + path, { ...options, headers: { Accept: 'application/json', 'Content-Type': 'application/json', 'X-Session-Id': sessionId, ...(options.headers || {}) } }).then(async (response) => { if (!response.ok) throw new Error((await response.json()).message || 'เกิดข้อผิดพลาด'); return response.status === 204 ? null : response.json(); });
        const showMessage = (message) => { const box = document.querySelector('#ai-message'); box.hidden = false; box.textContent = message; };
        const mdToHtml = (md) => { if (!md) return ''; return md.replace(/^### (.*$)/gim, '<h3>$1</h3>').replace(/^## (.*$)/gim, '<h2>$1</h2>').replace(/^# (.*$)/gim, '<h1>$1</h1>').replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>').replace(/\*(.*?)\*/g, '<em>$1</em>').replace(/^- (.*$)/gim, '<li>$1</li>').replace(/\n\n/g, '</p><p>').replace(/\n/g, '<br>'); };
        const resetEditor = () => { currentArticleId = null; currentArticleSlug = null; fields.title.value = ''; fields.idea.value = ''; fields.keywords.value = ''; fields.audience.value = ''; fields.content.innerHTML = '<p>เริ่มเขียนตรงนี้...</p><p class="editor-placeholder">หรือให้ AI ช่วยสร้างโครงร่างจากแนวคิดของคุณ</p>'; document.querySelector('#draft-label').textContent = 'ร่างใหม่'; document.querySelector('#word-count').textContent = '0 คำ'; };
        const fillEditor = (article) => { currentArticleId = article.id; currentArticleSlug = article.slug; fields.type.value = article.article_type_id || ''; fields.title.value = article.title || ''; fields.idea.value = article.excerpt || ''; fields.keywords.value = (article.keywords || []).join(', '); fields.audience.value = article.audience || ''; fields.tone.value = article.tone || ''; fields.length.value = article.length || 'ปานกลาง'; fields.content.innerHTML = article.content || '<p>เริ่มเขียนตรงนี้...</p>'; document.querySelector('#draft-label').textContent = 'กำลังแก้ไขบทความ'; fields.content.dispatchEvent(new Event('input')); };
        const renderArticles = (articles) => {
            const tableBody = document.querySelector('#article-table-body');
            if (tableBody) {
                tableBody.innerHTML = '';
                if (!articles.length) {
                    tableBody.innerHTML = '<tr><td colspan="6" style="padding: 24px; text-align: center; color: #94a3b8;">ยังไม่มีบทความที่บันทึกไว้</td></tr>';
                } else {
                    articles.forEach((article, index) => {
                        const tr = document.createElement('tr');
                        tr.style.cssText = 'border-bottom: 1px solid #f1f5f9; transition: background 0.15s;';
                        tr.addEventListener('mouseenter', () => tr.style.background = '#f8fafc');
                        tr.addEventListener('mouseleave', () => tr.style.background = 'transparent');
                        
                        const typeName = article.article_type ? article.article_type.name : 'ทั่วไป';
                        const dateStr = new Date(article.updated_at).toLocaleDateString('th-TH', { day: 'numeric', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' });
                        const statusBadge = article.status === 'published' 
                            ? '<span style="background: #dcfce7; color: #15803d; padding: 4px 10px; border-radius: 12px; font-size: 0.82rem; font-weight: 600;">เผยแพร่แล้ว</span>'
                            : '<span style="background: #f1f5f9; color: #64748b; padding: 4px 10px; border-radius: 12px; font-size: 0.82rem; font-weight: 600;">ฉบับร่าง</span>';

                        tr.innerHTML = `
                            <td style="padding: 14px 16px; color: #64748b; font-weight: 500;">${index + 1}</td>
                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">${article.title || 'บทความไม่มีชื่อ'}</td>
                            <td style="padding: 14px 16px;"><span style="background: #f1f5f9; color: #334155; padding: 4px 10px; border-radius: 6px; font-size: 0.85rem; font-weight: 500;">${typeName}</span></td>
                            <td style="padding: 14px 16px; color: #64748b; font-size: 0.85rem;">${dateStr}</td>
                            <td style="padding: 14px 16px;">${statusBadge}</td>
                            <td style="padding: 14px 16px; text-align: right; white-space: nowrap;">
                                <button type="button" class="btn-edit" style="background: #eff6ff; color: #2563eb; border: none; padding: 6px 10px; border-radius: 6px; font-weight: 600; cursor: pointer; margin-right: 4px;">✏️ แก้ไข</button>
                                <button type="button" class="btn-pdf" style="background: #fef2f2; color: #dc2626; border: none; padding: 6px 10px; border-radius: 6px; font-weight: 600; cursor: pointer; margin-right: 4px;">📄 PDF</button>
                                <button type="button" class="btn-word" style="background: #eff6ff; color: #2563eb; border: none; padding: 6px 10px; border-radius: 6px; font-weight: 600; cursor: pointer; margin-right: 4px;">📝 Word</button>
                                <button type="button" class="btn-public" style="background: #efeaff; color: #6941e8; border: none; padding: 6px 10px; border-radius: 6px; font-weight: 600; cursor: pointer; margin-right: 4px;">🔗 อ่าน</button>
                                <button type="button" class="btn-delete" style="background: #fef2f2; color: #dc2626; border: none; padding: 6px 10px; border-radius: 6px; font-weight: 600; cursor: pointer;">🗑️ ลบ</button>
                            </td>
                        `;

                        tr.querySelector('.btn-edit').addEventListener('click', () => { fillEditor(article); window.scrollTo({ top: 0, behavior: 'smooth' }); });
                        tr.querySelector('.btn-pdf').addEventListener('click', () => window.open('/articles/' + article.id + '/export/pdf?session_id=' + sessionId, '_blank'));
                        tr.querySelector('.btn-word').addEventListener('click', () => window.open('/articles/' + article.id + '/export/word?session_id=' + sessionId, '_blank'));
                        tr.querySelector('.btn-public').addEventListener('click', () => window.open('/article/' + article.slug, '_blank'));
                        tr.querySelector('.btn-delete').addEventListener('click', async () => {
                            if (!confirm('ต้องการลบบทความนี้หรือไม่')) return;
                            await request('/articles/' + article.id, { method: 'DELETE' });
                            if (currentArticleId === article.id) resetEditor();
                            loadArticles();
                        });

                        tableBody.appendChild(tr);
                    });
                }
            }
        };
        const loadArticles = () => request('/articles').then((response) => renderArticles(response.data)).catch(() => showMessage('โหลดบทความไม่ได้ กรุณาตรวจสอบฐานข้อมูล'));
        const loadTypes = () => request('/article-types').then((response) => {
            fields.type.innerHTML = response.data.map((type) => `<option value="${type.id}">${type.name}</option>`).join('');
            const typeParam = new URLSearchParams(window.location.search).get('type');
            if (typeParam) {
                const matched = Array.from(fields.type.options).find(opt => opt.text === typeParam || opt.value === typeParam);
                if (matched) fields.type.value = matched.value;
            }
            updateCategoryUI();
        }).catch(() => showMessage('โหลดประเภทบทความไม่ได้'));

        const categoryConfigs = {
            'การทำงาน': { heading: 'เล่าเรื่องชีวิต<br>การทำงาน', placeholder: 'เช่น เทคนิคการบริหารเวลาสำหรับคนทำงาน, วิธีดีลกับภาวะ Burnout...', keywords: 'การทำงาน, ผลงาน, การเติบโต, บาลานซ์ชีวิต', tone: 'มืออาชีพ' },
            'ความรัก': { heading: 'เล่าเรื่องหัวใจ<br>และความรู้สึก', placeholder: 'เช่น ความสัมพันธ์ที่เริ่มห่างเหิน, การก้าวผ่านความรักที่ไม่สมหวัง...', keywords: 'ความรัก, ความเข้าใจ, ความสัมพันธ์, ความทรงจำ', tone: 'อบอุ่น' },
            'การต่อสู้ชีวิต': { heading: 'ส่งต่อพลัง<br>และแรงบันดาลใจ', placeholder: 'เช่น การล้มแล้วลุกใหม่ในวันที่ท้อ, บทเรียนสำคัญจากอุปสรรคชีวิต...', keywords: 'ความพยายาม, สู้ชีวิต, กำลังใจ, ก้าวข้ามอุปสรรค', tone: 'สร้างแรงบันดาลใจ' },
            'การดำรงชีวิต': { heading: 'จัดระเบียบวันธรรมดา<br>ให้มีความหมาย', placeholder: 'เช่น การจัดระเบียบบ้านและชีวิตประจำวัน, นิสัยเล็กๆ ที่เปลี่ยนชีวิต...', keywords: 'การใช้ชีวิต, ไลฟ์สไตล์, ความสุขเรียบง่าย, นิสัยดีๆ', tone: 'เป็นกันเอง' },
            'นิยาย': { heading: 'สร้างสรรค์โลกใหม่<br>จากจินตนาการ', placeholder: 'เช่น การเดินทางของตัวเอกในเมืองเวทมนตร์, การพบกันที่ไม่คาดฝัน...', keywords: 'จินตนาการ, การเดินทาง, ความลับ, โชคชะตา', tone: 'สร้างแรงบันดาลใจ' },
            'หนังสือพิมพ์': { heading: 'เล่าข่าวสาร<br>และประเด็นร้อน', placeholder: 'เช่น สรุปข่าวเทคโนโลยีประจำสัปดาห์, วิเคราะห์ประเด็นสำคัญในสังคม...', keywords: 'ข่าวสาร, สรุปประเด็น, ข้อเท็จจริง, วิเคราะห์', tone: 'มืออาชีพ' },
            'การศึกษา': { heading: 'แบ่งปันความรู้<br>และบทเรียน', placeholder: 'เช่น วิธีเรียนภาษาใหม่ให้พูดได้ไวขึ้น, สรุปบทเรียนเข้าใจง่าย...', keywords: 'การเรียนรู้, เทคนิคการเรียน, พัฒนาตนเอง, ความรู้', tone: 'เป็นกันเอง' },
            'เทคโนโลยี': { heading: 'สำรวจสิ่งใหม่<br>ที่เปลี่ยนโลก', placeholder: 'เช่น AI กับการทำงานในอนาคต, แอปพลิเคชันที่ช่วยเพิ่มความเร็วในการทำงาน...', keywords: 'เทคโนโลยี, AI, นวัตกรรม, อนาคต', tone: 'มืออาชีพ' },
            'สุขภาพ': { heading: 'ดูแลกายและใจ<br>ให้แข็งแรง', placeholder: 'เช่น วิธีดูแลสุขภาพจิตในวันหนักๆ, ทริคออกกำลังกายสำหรับคนมีเวลาน้อย...', keywords: 'สุขภาพ, การดูแลตัวเอง, สุขภาพจิต, การออกกำลังกาย', tone: 'อบอุ่น' },
            'ธุรกิจ': { heading: 'สร้างโอกาส<br>และเติบโตในธุรกิจ', placeholder: 'เช่น ไอเดียเริ่มต้นธุรกิจปีนี้, กลยุทธ์การหาลูกค้ากลุ่มแรก...', keywords: 'ธุรกิจ, การตลาด, โอกาส, การลงทุน', tone: 'มืออาชีพ' }
        };

        const updateCategoryUI = () => {
            const selectedText = fields.type.options[fields.type.selectedIndex]?.text || '';
            const config = categoryConfigs[selectedText];
            if (config) {
                const headingElem = document.querySelector('.workspace-sidebar h1');
                if (headingElem) headingElem.innerHTML = config.heading;
                fields.idea.placeholder = config.placeholder;
                fields.keywords.value = config.keywords;
                if (config.tone) fields.tone.value = config.tone;
            }
        };

        fields.type.addEventListener('change', updateCategoryUI);
        const saveArticle = async () => { const payload = { article_type_id: Number(fields.type.value) || null, title: fields.title.value, excerpt: fields.idea.value, content: fields.content.innerHTML, keywords: fields.keywords.value.split(',').map((keyword) => keyword.trim()).filter(Boolean), audience: fields.audience.value, tone: fields.tone.value, length: fields.length.value, status: 'published' }; const response = await request(currentArticleId ? '/articles/' + currentArticleId : '/articles', { method: currentArticleId ? 'PUT' : 'POST', body: JSON.stringify(payload) }); fillEditor(response.data); loadArticles(); showMessage('บันทึกบทความเรียบร้อยแล้ว'); };
        document.querySelector('#save-article').addEventListener('click', () => saveArticle().catch((error) => showMessage(error.message)));
        document.querySelector('#new-article').addEventListener('click', resetEditor); document.querySelector('#table-new-article')?.addEventListener('click', () => { resetEditor(); window.scrollTo({ top: 0, behavior: 'smooth' }); });
        document.querySelector('#preview-article').addEventListener('click', () => { if (!currentArticleId) { showMessage('กรุณาบันทึกบทความก่อนดู Preview'); return; } window.open('/articles/' + currentArticleId + '/preview?session_id=' + sessionId, '_blank'); });
        document.querySelector('#public-article').addEventListener('click', async () => { if (!currentArticleId) { await saveArticle(); } if (currentArticleSlug) { window.open('/article/' + currentArticleSlug, '_blank'); } else { showMessage('กรุณาบันทึกบทความก่อนเปิดหน้าอ่านบทความ'); } });
        document.querySelector('#export-pdf-article')?.addEventListener('click', async () => { if (!currentArticleId) { await saveArticle(); } if (currentArticleId) { window.open('/articles/' + currentArticleId + '/export/pdf?session_id=' + sessionId, '_blank'); } });
        document.querySelector('#export-word-article')?.addEventListener('click', async () => { if (!currentArticleId) { await saveArticle(); } if (currentArticleId) { window.open('/articles/' + currentArticleId + '/export/word?session_id=' + sessionId, '_blank'); } });
        const handleAiAction = async (action) => {
            const getTypeName = () => fields.type.options[fields.type.selectedIndex]?.text || '';
            const keywords = fields.keywords.value.split(',').map(k => k.trim()).filter(Boolean);
            showMessage('AI กำลังทำงาน...');
            try {
                let res;
                if (action === 'title') {
                    const topic = fields.idea.value.trim() || 'ความคิดและการเติบโต';
                    res = await request('/ai/title', { method: 'POST', body: JSON.stringify({ article_type: getTypeName(), keywords, tone: fields.tone.value, topic }) });
                    if (res?.data) {
                        const lines = res.data.split('\n').map(l => l.replace(/^[0-9.\-\s*]+/, '').trim()).filter(Boolean);
                        fields.title.value = lines[0] || res.data;
                        fields.content.focus();
                    }
                } else if (action === 'outline') {
                    const title = fields.title.value.trim() || fields.idea.value.trim() || 'บทความน่าสนใจ';
                    if (!fields.title.value) fields.title.value = title;
                    res = await request('/ai/outline', { method: 'POST', body: JSON.stringify({ article_type: getTypeName(), title, tone: fields.tone.value }) });
                    if (res?.data) { fields.content.innerHTML = mdToHtml(res.data); }
                } else if (action === 'write') {
                    const title = fields.title.value.trim() || fields.idea.value.trim() || 'บทความน่าสนใจ';
                    if (!fields.title.value) fields.title.value = title;
                    const outline = fields.content.innerText.trim();
                    res = await request('/ai/generate', { method: 'POST', body: JSON.stringify({ article_type: getTypeName(), title, outline: outline || fields.idea.value, tone: fields.tone.value, length: fields.length.value }) });
                    if (res?.data) { fields.content.innerHTML = mdToHtml(res.data); }
                } else if (action === 'continue') {
                    const text = fields.content.innerText.trim();
                    res = await request('/ai/rewrite', { method: 'POST', body: JSON.stringify({ text: text || fields.title.value || fields.idea.value, instruction: 'ช่วยเขียนบทความนี้ต่อให้สมบูรณ์และลื่นไหล' }) });
                    if (res?.data) { fields.content.innerHTML += '<br><br>' + mdToHtml(res.data); }
                } else if (action === 'summarize') {
                    const text = fields.content.innerText.trim();
                    if (!text) throw new Error('ไม่พบเนื้อหาให้สรุป');
                    res = await request('/ai/rewrite', { method: 'POST', body: JSON.stringify({ text, instruction: 'ช่วยสรุปเนื้อหาบทความนี้ให้สั้นและกระชับ' }) });
                    if (res?.data) { fields.content.innerHTML = mdToHtml(res.data); }
                } else if (action === 'rewrite') {
                    const text = fields.content.innerText.trim();
                    if (!text) throw new Error('ไม่พบเนื้อหาให้ปรับภาษา');
                    const instruction = prompt('ต้องการให้ปรับภาษาอย่างไร? (เช่น เป็นทางการขึ้น, เป็นมิตรขึ้น)', 'ช่วยปรับภาษาให้อ่านง่ายและสละสลวยขึ้น');
                    if (!instruction) return;
                    res = await request('/ai/rewrite', { method: 'POST', body: JSON.stringify({ text, instruction }) });
                    if (res?.data) { fields.content.innerHTML = mdToHtml(res.data); }
                }
                fields.content.dispatchEvent(new Event('input'));
                showMessage('✨ AI สร้างเนื้อหาสำเร็จเรียบร้อยแล้ว');
            } catch (err) {
                showMessage('Error: ' + err.message);
            }
        };
        const quickAiWriteHandler = async () => {
            if (!fields.idea.value.trim() && !fields.title.value.trim()) {
                fields.idea.value = 'เรื่องราวและการเติบโตในแบบของเรา';
            }
            if (!fields.title.value.trim()) {
                await handleAiAction('title');
            }
            await handleAiAction('write');
        };
        document.querySelector('#quick-ai-write')?.addEventListener('click', quickAiWriteHandler);
        document.querySelector('#editor-ai-write')?.addEventListener('click', quickAiWriteHandler);
        document.querySelectorAll('[data-ai-action]').forEach((button) => button.addEventListener('click', () => handleAiAction(button.dataset.aiAction)));
        fields.content.addEventListener('input', () => { document.querySelector('#word-count').textContent = fields.content.innerText.trim().split(/\s+/).filter(Boolean).length + ' คำ'; });
        Promise.all([loadTypes(), loadArticles()]);
    </script>

</body>
</html>