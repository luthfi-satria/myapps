<!DOCTYPE html>
<html lang="id" translate="no">
    <head>
        <title><?= $webconfig['SITENAME'];?></title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=yes, width=device-width"/>
        <meta name="mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-title" content="konten"/>
        <meta data-rh="true" name="description" content="<?= $webconfig['METADESC'];?>"/>
        <meta data-rh="true" property="og:title" content="<?= $webconfig['METATITLE'];?>"/>
        <meta data-rh="true" property="og:site_name" content="<?= $webconfig['SITENAME'];?>"/>
        <meta data-rh="true" property="og:description" content="<?= $webconfig['METADESC'];?>"/>
        <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?= $this->renderSection('stylesheet');?>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>    
        <script type="text/javascript">
            const baseUrl = '<?php echo base_url();?>';
        </script>
    </head>
    <body>
        <div id="main_body">
            <?php
                echo $this->renderSection('section');
            ?>
        </div>
        <div id="loader" class="hidden">
            <div class="flex fixed top-0 z-50 w-full h-full bg-white bg-opacity-60 items-center justify-center tracking-widest">
                <div class="h-20 py-8 px-8 font-bold text-2xl">
                    LOADING...
                </div>    
            </div>
        </div>
        
        <?php
            echo $this->renderSection('javascript');
        ?>
    </body>
</html>