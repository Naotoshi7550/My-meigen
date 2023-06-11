const btn = document.querySelector('#disp-preview');   // 「プレビューを表示」ボタン
const backBtn = document.querySelector('#back-btn');
const mask = document.querySelector('#mask');
const modal = document.querySelector('#modal');
const preview = document.querySelector('#preview');


const textArea = document.querySelector('#post-content');    // 投稿内容を入力するテキストボックス
const radioBtns = document.querySelectorAll('input[type="radio"]');   // フォントを選択するラジオボタン

// アニメーションの設定
const showKeyframes = {
    opacity: [0, 1],
    visibility: 'visible',
}
const hideKeyframes = {
    opacity: [1, 0],
    visibility: 'hidden',
}
const options = {
    duration: 400,
    easing: 'ease',
    fill: 'forwards',
}

// 新規投稿ボタンがクリックされたときのアニメーション
btn.addEventListener('click', ()=> {
    // モーダルウィンドウとマスクを表示
    modal.animate(showKeyframes, options);
    mask.animate(showKeyframes, options);

    // テキストエリアに入力された文章を取得して表示
    preview.innerHTML = textArea.value;

    // 選択されたフォントに変更
    preview.classList.add(radio.value);
})


// 戻るボタンがクリックされたら、モーダルウィンドウを閉じる
backBtn.addEventListener('click', () => {
    modal.animate(hideKeyframes, options);
    mask.animate(hideKeyframes, options);
})

// マスク部分がクリックされたら、モーダルウィンドウを閉じる
mask.addEventListener('click', () => {
    backBtn.click();
})

radioBtns.forEach((radioBtn) => {
    radioBtn.addEventListener('change', (event) => {
        textArea.classList.add(event.target.value);
    })
})