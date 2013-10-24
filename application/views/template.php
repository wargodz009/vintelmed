<html>
<body>
	<div id="footer">SITE NAME</div>
	<div id="header">
    <?php
        if($this->session->flashdata('error') != ''){
            echo '<div id="error">'.$this->session->flashdata('error').'</div>';
        }
        if($this->session->flashdata('notice') != ''){
            echo '<div id="notice">'.$this->session->flashdata('notice').'</div>';
        }
    ?>
	</div>
    <div id="contents"><?= $contents ?></div>
    <div id="footer">Copyright 2008</div>
</body>
</html>