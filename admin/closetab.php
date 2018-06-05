<script src="shortcut.js"></script>
<script>
shortcut.add("Esc",function() {
	CloseWindow();
});
function CloseWindow() {
	
     if (confirm("Close Window?")) {
       close();
    }
}
		</script>

        <a href="closetab.php" onclick = "window.open(window.location, '_blank', 'width=500px, height=500px');">Open</a>
        <a href="#" onclick="CloseWindow();return false;">close</a>

