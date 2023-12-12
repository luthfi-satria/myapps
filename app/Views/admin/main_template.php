<!DOCTYPE html>
<html lang="id" translate="no">
    <head>
        <title>TITLE</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=yes, width=device-width"/>
        <meta name="mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-title" content="konten"/>
        <meta data-rh="true" name="description" content="Site description"/>
        <meta data-rh="true" property="og:title" content="Konten title"/>
        <meta data-rh="true" property="og:site_name" content="Site name"/>
        <meta data-rh="true" property="og:description" content="Site description"/>
        <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>    
    </head>
    <body>
        <div id="main_body">
            <?php
                echo $this->renderSection('section');
            ?>
        </div>
        <script type="text/javascript" src="<?php echo base_url('assets/js/admin/core.js');?>"></script>
        <?php
            if(!empty($jsfile)){
                foreach($jsfile as $key => $val){
                    echo '<script src="'.base_url($val).'" type="text/javascript"></script>';
                }
            }
        ?>
    </body>
</html>