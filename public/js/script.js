'use strict';

{
  // ユーザーメニュー
  const header_user = document.getElementById('header_user');
  const click_area = document.getElementById('click_area');
  header_user.addEventListener('click', () => {
    click_area.classList.toggle('hidden');
  });

  // ハンバーガーメニュー
  const menu = document.getElementById('menu');
  const menu_btn = document.querySelector('.menu_btn');
  console.log(menu_btn);
  menu_btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });

}
