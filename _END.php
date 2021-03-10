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
