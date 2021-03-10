<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/8.2.10/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="/__/firebase/8.2.10/firebase-analytics.js"></script>

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>

<script>
let ele = document.getElementsByTagName("sidebar");
let blank = document.createElement("div");
blank.className = "fade";

function toggleMenuLg() {
    ele[0].classList.toggle("sidebar-show-lg");
}

function toggleMenuMd() {
    ele[0].classList.toggle("sidebar-show-md");
    document.body.appendChild(blank);
}

blank.onclick = function() {
    toggleMenuMd();
    blank.remove();
};
</script>

</body>

</html>