// パスワード表示切り替えscript ここから
document.addEventListener("DOMContentLoaded", function() {
    const togglePassword = document.querySelector("#toggle_password");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function() {
    // パスワードのタイプを切り替える
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    // アイコンのスタイルを切り替える
    this.classList.toggle("is-visible");
    });
});
