<!DOCTYPE html>
<html lang="th">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Workspace | เขียนดี</title>@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body class="workspace-page">
    <header class="workspace-header shell"><a class="brand" href="{{ url('/') }}"><span class="brand-mark">ข</span> เขียนดี</a><span class="workspace-status"><i></i> บันทึกในเบราว์เซอร์นี้</span><a class="text-link" href="{{ url('/') }}">กลับหน้าแรก</a></header>
    <main class="workspace-shell shell">
        <aside class="workspace-sidebar"><p class="eyebrow">เริ่มต้นบทความ</p><h1>เล่าเรื่องที่<br>อยากเล่า</h1><label for="article-type">ประเภทบทความ</label><select id="article-type"><option value="การทำงาน">การทำงาน</option><option value="ความรัก">ความรัก</option><option value="การต่อสู้ชีวิต">การต่อสู้ชีวิต</option><option value="การดำรงชีวิต">การดำรงชีวิต</option><option value="นิยาย">นิยาย</option><option value="หนังสือพิมพ์">หนังสือพิมพ์</option><option value="การศึกษา">การศึกษา</option><option value="เทคโนโลยี">เทคโนโลยี</option><option value="สุขภาพ">สุขภาพ</option><option value="ธุรกิจ">ธุรกิจ</option></select><label for="article-idea">หัวข้อหรือแนวคิด</label><textarea id="article-idea" placeholder="เช่น ความสัมพันธ์ที่เริ่มห่างกัน..."></textarea><label for="article-keywords">Keyword</label><input id="article-keywords" type="text" placeholder="เช่น ความเข้าใจ, การเติบโต"><label for="article-audience">กลุ่มผู้อ่าน</label><input id="article-audience" type="text" placeholder="เช่น คนทำงานวัยเริ่มต้น"><label for="article-tone">Tone</label><select id="article-tone"><option>เป็นกันเอง</option><option>มืออาชีพ</option><option>อบอุ่น</option><option>สร้างแรงบันดาลใจ</option></select><label for="article-length">ความยาว</label><select id="article-length"><option>สั้น</option><option selected>ปานกลาง</option><option>ยาว</option></select><button class="button button-primary workspace-button" id="new-article" type="button">บทความใหม่ <span>＋</span></button><p class="workspace-hint">ข้อมูลจะถูกเก็บไว้ในเบราว์เซอร์นี้โดยไม่ต้อง Login</p></aside>
        <section class="editor-area"><div class="editor-toolbar"><span id="draft-label">ร่างใหม่</span><span class="save-state"><i></i> บันทึกอัตโนมัติ</span></div><input id="article-title" class="title-input" type="text" placeholder="ตั้งชื่อบทความของคุณ"><div id="editor-content" class="editor-content" contenteditable="true" aria-label="พื้นที่เขียนบทความ"><p>เริ่มเขียนตรงนี้...</p><p class="editor-placeholder">หรือให้ AI ช่วยสร้างโครงร่างจากแนวคิดของคุณ</p></div><div class="editor-footer"><span id="word-count">0 คำ</span><div><button class="tool-button" id="preview-article" type="button">ดูตัวอย่าง</button><button class="button button-dark" id="save-article" type="button">บันทึกฉบับร่าง</button></div></div></section>
        <aside class="ai-sidebar"><p class="eyebrow">บทความของฉัน</p><div id="article-list" class="article-list"><p class="workspace-hint">กำลังโหลด...</p></div><button class="button button-light workspace-button" id="new-article-side" type="button">บทความใหม่ <span>＋</span></button><hr><p class="eyebrow">ผู้ช่วย AI</p><h2>ให้ไอเดีย<br>เดินหน้าต่อ</h2><p class="workspace-hint">เลือกเครื่องมือเพื่อเริ่มพัฒนาบทความของคุณ</p><div class="ai-tools"><button type="button" data-ai-action="title">สร้างชื่อเรื่อง <span>✦</span></button><button type="button" data-ai-action="outline">สร้าง Outline <span>✦</span></button><button type="button" data-ai-action="write">เขียนบทความ <span>✦</span></button><button type="button" data-ai-action="continue">เขียนต่อ <span>✦</span></button><button type="button" data-ai-action="summarize">สรุปเนื้อหา <span>✦</span></button><button type="button" data-ai-action="rewrite">ปรับภาษา <span>✦</span></button></div><div id="ai-message" class="ai-message" hidden></div></aside>
    </main>
    <script>
        const apiBase = '{{ url('/api') }}';
        const sessionKey = 'bloger-session-id';
        const sessionId = localStorage.getItem(sessionKey) || crypto.randomUUID();
        localStorage.setItem(sessionKey, sessionId);
        let currentArticleId = null;
        const fields = { type: document.querySelector('#article-type'), idea: document.querySelector('#article-idea'), keywords: document.querySelector('#article-keywords'), audience: document.querySelector('#article-audience'), tone: document.querySelector('#article-tone'), length: document.querySelector('#article-length'), title: document.querySelector('#article-title'), content: document.querySelector('#editor-content') };
        const request = (path, options = {}) => fetch(apiBase + path, { ...options, headers: { Accept: 'application/json', 'Content-Type': 'application/json', 'X-Session-Id': sessionId, ...(options.headers || {}) } }).then(async (response) => { if (!response.ok) throw new Error((await response.json()).message || 'เกิดข้อผิดพลาด'); return response.status === 204 ? null : response.json(); });
        const showMessage = (message) => { const box = document.querySelector('#ai-message'); box.hidden = false; box.textContent = message; };
        const resetEditor = () => { currentArticleId = null; fields.title.value = ''; fields.idea.value = ''; fields.keywords.value = ''; fields.audience.value = ''; fields.content.innerHTML = '<p>เริ่มเขียนตรงนี้...</p><p class="editor-placeholder">หรือให้ AI ช่วยสร้างโครงร่างจากแนวคิดของคุณ</p>'; document.querySelector('#draft-label').textContent = 'ร่างใหม่'; document.querySelector('#word-count').textContent = '0 คำ'; };
        const fillEditor = (article) => { currentArticleId = article.id; fields.type.value = article.article_type_id || ''; fields.title.value = article.title || ''; fields.idea.value = article.excerpt || ''; fields.keywords.value = (article.keywords || []).join(', '); fields.audience.value = article.audience || ''; fields.tone.value = article.tone || ''; fields.length.value = article.length || 'ปานกลาง'; fields.content.innerHTML = article.content || '<p>เริ่มเขียนตรงนี้...</p>'; document.querySelector('#draft-label').textContent = 'กำลังแก้ไขบทความ'; fields.content.dispatchEvent(new Event('input')); };
        const renderArticles = (articles) => { const list = document.querySelector('#article-list'); list.innerHTML = ''; if (!articles.length) { list.innerHTML = '<p class="workspace-hint">ยังไม่มีบทความที่บันทึกไว้</p>'; return; } articles.forEach((article) => { const item = document.createElement('div'); item.className = 'article-list-item'; const title = document.createElement('button'); title.type = 'button'; title.textContent = article.title || 'บทความไม่มีชื่อ'; title.addEventListener('click', () => fillEditor(article)); const remove = document.createElement('button'); remove.type = 'button'; remove.className = 'article-delete'; remove.textContent = 'ลบ'; remove.addEventListener('click', async () => { if (!confirm('ต้องการลบบทความนี้หรือไม่')) return; await request('/articles/' + article.id, { method: 'DELETE' }); if (currentArticleId === article.id) resetEditor(); loadArticles(); }); item.append(title, remove); list.appendChild(item); }); };
        const loadArticles = () => request('/articles').then((response) => renderArticles(response.data)).catch(() => showMessage('โหลดบทความไม่ได้ กรุณาตรวจสอบฐานข้อมูล'));
        const loadTypes = () => request('/article-types').then((response) => { fields.type.innerHTML = response.data.map((type) => `<option value="${type.id}">${type.name}</option>`).join(''); }).catch(() => showMessage('โหลดประเภทบทความไม่ได้'));
        const saveArticle = async () => { const payload = { article_type_id: Number(fields.type.value) || null, title: fields.title.value, excerpt: fields.idea.value, content: fields.content.innerHTML, keywords: fields.keywords.value.split(',').map((keyword) => keyword.trim()).filter(Boolean), audience: fields.audience.value, tone: fields.tone.value, length: fields.length.value, status: 'draft' }; const response = await request(currentArticleId ? '/articles/' + currentArticleId : '/articles', { method: currentArticleId ? 'PUT' : 'POST', body: JSON.stringify(payload) }); fillEditor(response.data); loadArticles(); showMessage('บันทึกบทความเรียบร้อยแล้ว'); };
        document.querySelector('#save-article').addEventListener('click', () => saveArticle().catch((error) => showMessage(error.message)));
        document.querySelector('#new-article').addEventListener('click', resetEditor); document.querySelector('#new-article-side').addEventListener('click', resetEditor);
        document.querySelector('#preview-article').addEventListener('click', () => {
            if (!currentArticleId) {
                showMessage('กรุณาบันทึกบทความก่อนดู Preview');
                return;
            }
            window.open('/articles/' + currentArticleId + '/preview', '_blank');
        });
        const handleAiAction = async (action) => {
            const getTypeName = () => fields.type.options[fields.type.selectedIndex]?.text || '';
            const keywords = fields.keywords.value.split(',').map(k => k.trim()).filter(Boolean);
            showMessage('AI กำลังทำงาน...');
            try {
                let res;
                if (action === 'title') {
                    if (!fields.idea.value) throw new Error('กรุณาระบุหัวข้อหรือแนวคิดก่อน');
                    res = await request('/ai/title', { method: 'POST', body: JSON.stringify({ article_type: getTypeName(), keywords, tone: fields.tone.value, topic: fields.idea.value }) });
                    if (res?.data) { fields.title.value = res.data; fields.content.focus(); }
                } else if (action === 'outline') {
                    if (!fields.title.value) throw new Error('กรุณาสร้างหรือระบุชื่อเรื่องก่อน');
                    res = await request('/ai/outline', { method: 'POST', body: JSON.stringify({ article_type: getTypeName(), title: fields.title.value, tone: fields.tone.value }) });
                    if (res?.data) { fields.content.innerHTML = res.data.replace(/\n/g, '<br>'); }
                } else if (action === 'write') {
                    if (!fields.title.value) throw new Error('กรุณาระบุชื่อเรื่องก่อน');
                    const outline = fields.content.innerText.trim();
                    res = await request('/ai/generate', { method: 'POST', body: JSON.stringify({ article_type: getTypeName(), title: fields.title.value, outline: outline || fields.idea.value, tone: fields.tone.value, length: fields.length.value }) });
                    if (res?.data) { fields.content.innerHTML = res.data.replace(/\n/g, '<br>'); }
                } else if (action === 'continue') {
                    const text = fields.content.innerText.trim();
                    if (!text) throw new Error('ไม่พบเนื้อหาสำหรับเขียนต่อ');
                    res = await request('/ai/rewrite', { method: 'POST', body: JSON.stringify({ text, instruction: 'ช่วยเขียนบทความนี้ต่อให้สมบูรณ์และลื่นไหล' }) });
                    if (res?.data) { fields.content.innerHTML += '<br><br>' + res.data.replace(/\n/g, '<br>'); }
                } else if (action === 'summarize') {
                    const text = fields.content.innerText.trim();
                    if (!text) throw new Error('ไม่พบเนื้อหาให้สรุป');
                    res = await request('/ai/rewrite', { method: 'POST', body: JSON.stringify({ text, instruction: 'ช่วยสรุปเนื้อหาบทความนี้ให้สั้นและกระชับ' }) });
                    if (res?.data) { fields.content.innerHTML = res.data.replace(/\n/g, '<br>'); }
                } else if (action === 'rewrite') {
                    const text = fields.content.innerText.trim();
                    if (!text) throw new Error('ไม่พบเนื้อหาให้ปรับภาษา');
                    const instruction = prompt('ต้องการให้ปรับภาษาอย่างไร? (เช่น เป็นทางการขึ้น, เป็นมิตรขึ้น)', 'ช่วยปรับภาษาให้อ่านง่ายและสละสลวยขึ้น');
                    if (!instruction) return;
                    res = await request('/ai/rewrite', { method: 'POST', body: JSON.stringify({ text, instruction }) });
                    if (res?.data) { fields.content.innerHTML = res.data.replace(/\n/g, '<br>'); }
                }
                showMessage('AI ทำงานเสร็จสิ้น');
            } catch (err) {
                showMessage('Error: ' + err.message);
            }
        };
        document.querySelectorAll('[data-ai-action]').forEach((button) => button.addEventListener('click', () => handleAiAction(button.dataset.aiAction)));
        fields.content.addEventListener('input', () => { document.querySelector('#word-count').textContent = fields.content.innerText.trim().split(/\s+/).filter(Boolean).length + ' คำ'; });
        Promise.all([loadTypes(), loadArticles()]);
    </script>
</body>
</html>