
const textArea = document.querySelector('#post-content');    // 投稿内容を入力するテキストボックス
const radioBtns = document.querySelectorAll('input[type="radio"]');   // フォントを選択するラジオボタン


radioBtns.forEach((radioBtn) => {
    radioBtn.addEventListener('change', (event) => {
        // メモ：↓正規表現がうまくいかない
        // textArea.classList.remove(/^font[0-9]*$/);
        textArea.classList.remove("font1", "font2", "font3", "font4", "font5", "font6", "font7", "font8", "font9", "font10");
        textArea.classList.add(event.target.value);
    })
})